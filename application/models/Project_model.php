<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{

    private $table      = 'projects';
    private $cat_table  = 'project_categories';
    private $ss_table   = 'project_screenshots';

    // ── READ ─────────────────────────────────────────────────────────

    public function get_all($filters = [])
    {
        $this->_apply_filters($filters);
        return $this->db
            ->select('p.*, pc.name as category_name, pc.slug as category_slug')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->order_by('p.display_order', 'ASC')
            ->order_by('p.created_at', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_active($category_slug = NULL)
    {
        $this->db->where('p.status', 1);
        if ($category_slug && $category_slug !== 'all') {
            $this->db->where('pc.slug', $this->db->escape_str($category_slug));
        }
        return $this->db
            ->select('p.*, pc.name as category_name, pc.slug as category_slug')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->order_by('p.is_featured', 'DESC')
            ->order_by('p.display_order', 'ASC')
            ->order_by('p.created_at', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_featured($limit = 6)
    {
        return $this->db
            ->select('p.*, pc.name as category_name, pc.slug as category_slug')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->where('p.status', 1)
            ->where('p.is_featured', 1)
            ->order_by('p.display_order', 'ASC')
            ->limit((int)$limit)
            ->get()
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select('p.*, pc.name as category_name, pc.slug as category_slug')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->where('p.id', (int)$id)
            ->get()
            ->row_array();
    }

    public function get_by_slug($slug)
    {
        return $this->db
            ->select('p.*, pc.name as category_name, pc.slug as category_slug')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->where('p.slug', $this->db->escape_str($slug))
            ->where('p.status', 1)
            ->get()
            ->row_array();
    }

    public function get_related($project_id, $category_id, $limit = 3)
    {
        if (!$category_id) return [];
        return $this->db
            ->select('p.*, pc.name as category_name')
            ->from($this->table . ' p')
            ->join($this->cat_table . ' pc', 'pc.id = p.category_id', 'left')
            ->where('p.status', 1)
            ->where('p.id !=', (int)$project_id)
            ->where('p.category_id', (int)$category_id)
            ->order_by('p.is_featured', 'DESC')
            ->limit((int)$limit)
            ->get()
            ->result_array();
    }

    // ── SLUG ─────────────────────────────────────────────────────────

    public function slug_exists($slug, $exclude_id = NULL)
    {
        $this->db->where('slug', $this->db->escape_str($slug));
        if ($exclude_id) $this->db->where('id !=', (int)$exclude_id);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    public function make_slug($title, $exclude_id = NULL)
    {
        $slug = url_title(strtolower(trim($title)), '-', TRUE);
        $base = $slug;
        $i    = 1;
        while ($this->slug_exists($slug, $exclude_id)) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    // ── WRITE ─────────────────────────────────────────────────────────

    public function create($data)
    {
        $insert = $this->_sanitize($data);
        $insert['slug']       = $this->make_slug($data['title']);
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $update = $this->_sanitize($data);
        $update['slug']       = $this->make_slug($data['title'], $id);
        $update['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->where('id', (int)$id)->update($this->table, $update);
    }

    public function delete($id)
    {
        $project = $this->get_by_id($id);
        if ($project) {
            $this->_delete_file($project['featured_image'], 'projects');
            $this->_delete_file($project['logo_image'], 'projects');
        }
        // Screenshots cascade via FK ON DELETE CASCADE
        return $this->db->where('id', (int)$id)->delete($this->table);
    }

    public function toggle_status($id)
    {
        $row = $this->get_by_id($id);
        if (!$row) return FALSE;
        $new = $row['status'] == 1 ? 0 : 1;
        return $this->db->where('id', (int)$id)->update($this->table, [
            'status'     => $new,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function toggle_featured($id)
    {
        $row = $this->get_by_id($id);
        if (!$row) return FALSE;
        $new = $row['is_featured'] == 1 ? 0 : 1;
        return $this->db->where('id', (int)$id)->update($this->table, [
            'is_featured' => $new,
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);
    }

    public function update_image($id, $field, $filename)
    {
        $allowed = ['featured_image', 'logo_image'];
        if (!in_array($field, $allowed)) return FALSE;
        return $this->db->where('id', (int)$id)->update($this->table, [
            $field       => $filename,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    // ── COUNTS ────────────────────────────────────────────────────────

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
    public function count_active()
    {
        return $this->db->where('status', 1)->get($this->table)->num_rows();
    }
    public function count_featured()
    {
        return $this->db->where('status', 1)->where('is_featured', 1)->get($this->table)->num_rows();
    }

    // ── PRIVATE ───────────────────────────────────────────────────────

    private function _apply_filters($filters)
    {
        if (!empty($filters['category_id'])) {
            $this->db->where('p.category_id', (int)$filters['category_id']);
        }
        if (isset($filters['status']) && $filters['status'] !== '') {
            $this->db->where('p.status', (int)$filters['status']);
        }
        if (isset($filters['is_featured']) && $filters['is_featured'] !== '') {
            $this->db->where('p.is_featured', (int)$filters['is_featured']);
        }
    }

    private function _sanitize($data)
    {
        return [
            'category_id'       => !empty($data['category_id']) ? (int)$data['category_id'] : NULL,
            'title'             => $this->db->escape_str(trim($data['title'])),
            'client_name'       => $this->db->escape_str(trim($data['client_name'] ?? '')),
            'short_description' => $this->db->escape_str(trim($data['short_description'] ?? '')),
            'full_content'      => $data['full_content'] ?? '',
            'project_type'      => $this->db->escape_str(trim($data['project_type'] ?? '')),
            'project_url'       => $this->db->escape_str(trim($data['project_url'] ?? '')),
            'technologies'      => $this->db->escape_str(trim($data['technologies'] ?? '')),
            'results_text'      => $this->db->escape_str(trim($data['results_text'] ?? '')),
            'is_featured'       => isset($data['is_featured']) ? (int)$data['is_featured'] : 0,
            'status'            => isset($data['status']) ? (int)$data['status'] : 1,
            'display_order'     => (int)($data['display_order'] ?? 0),
            'meta_title'        => $this->db->escape_str(trim($data['meta_title'] ?? '')),
            'meta_description'  => $this->db->escape_str(trim($data['meta_description'] ?? '')),
        ];
    }

    private function _delete_file($filename, $subfolder)
    {
        if (!$filename) return;
        $path = FCPATH . 'assets/images/uploads/' . $subfolder . '/' . $filename;
        if (file_exists($path)) @unlink($path);
    }
}
