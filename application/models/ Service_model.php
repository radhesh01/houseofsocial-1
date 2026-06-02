<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{
    private $table = 'services';
    private $_cache = NULL;

    public function get_all()
    {
        return $this->db->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result_array();
    }

    public function get_active()
    {
        if ($this->_cache !== NULL) return $this->_cache;
        $this->_cache = $this->db->where('status', 1)->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result_array();
        return $this->_cache;
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->table)->row_array();
    }

    public function get_by_slug($slug)
    {
        return $this->db->where('slug', $this->db->escape_str($slug))->where('status', 1)->get($this->table)->row_array();
    }

    public function slug_exists($slug, $exclude_id = NULL)
    {
        $this->db->where('slug', $this->db->escape_str($slug));
        if ($exclude_id) $this->db->where('id !=', (int)$exclude_id);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    public function make_slug($name, $exclude_id = NULL)
    {
        $slug = url_title(strtolower(trim($name)), '-', TRUE);
        $base = $slug;
        $i    = 1;
        while ($this->slug_exists($slug, $exclude_id)) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    public function create($data)
    {
        $insert = $this->_sanitize($data);
        $insert['slug']       = $this->make_slug($data['title']);
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $insert);
        $this->_cache = NULL;
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $update = $this->_sanitize($data);
        $update['slug']       = $this->make_slug($data['title'], $id);
        $update['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', (int)$id)->update($this->table, $update);
        $this->_cache = NULL;
        return TRUE;
    }

    public function delete($id)
    {
        $row = $this->get_by_id($id);
        if ($row && !empty($row['icon_image'])) {
            $path = FCPATH . 'assets/images/uploads/services/' . $row['icon_image'];
            if (file_exists($path)) @unlink($path);
        }
        $this->db->where('id', (int)$id)->delete($this->table);
        $this->_cache = NULL;
        return TRUE;
    }

    public function toggle_status($id)
    {
        $row = $this->get_by_id($id);
        if (!$row) return FALSE;
        $this->db->where('id', (int)$id)->update($this->table, [
            'status'     => $row['status'] == 1 ? 0 : 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $this->_cache = NULL;
        return TRUE;
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    private function _sanitize($data)
    {
        return [
            'title'             => $this->db->escape_str(trim($data['title'] ?? '')),
            'short_description' => $this->db->escape_str(trim($data['short_description'] ?? '')),
            'full_content'      => $data['full_content'] ?? '',
            'icon_image'        => $this->db->escape_str(trim($data['icon_image'] ?? '')),
            'icon_emoji'        => $this->db->escape_str(trim($data['icon_emoji'] ?? '')),
            'meta_title'        => $this->db->escape_str(trim($data['meta_title'] ?? '')),
            'meta_description'  => $this->db->escape_str(trim($data['meta_description'] ?? '')),
            'seo_content'       => $data['seo_content'] ?? '',
            'status'            => isset($data['status']) ? (int)$data['status'] : 1,
            'sort_order'        => (int)($data['sort_order'] ?? 0),
        ];
    }
}
