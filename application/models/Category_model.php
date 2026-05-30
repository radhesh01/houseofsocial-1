<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    private $table = 'project_categories';

    public function get_all()
    {
        return $this->db
            ->order_by('display_order', 'ASC')
            ->order_by('name', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_active()
    {
        return $this->db
            ->where('status', 1)
            ->order_by('display_order', 'ASC')
            ->order_by('name', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->table)->row_array();
    }

    public function get_by_slug($slug)
    {
        return $this->db->where('slug', $this->db->escape_str($slug))->get($this->table)->row_array();
    }

    public function slug_exists($slug, $exclude_id = NULL)
    {
        $this->db->where('slug', $this->db->escape_str($slug));
        if ($exclude_id) $this->db->where('id !=', (int)$exclude_id);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    public function make_slug($name, $exclude_id = NULL)
    {
        $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
        $base = $slug;
        $i    = 1;
        while ($this->slug_exists($slug, $exclude_id)) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    public function create($data)
    {
        $insert = [
            'name'          => $this->db->escape_str(trim($data['name'])),
            'slug'          => $this->make_slug($data['name']),
            'description'   => $this->db->escape_str(trim($data['description'] ?? '')),
            'display_order' => (int)($data['display_order'] ?? 0),
            'status'        => isset($data['status']) ? (int)$data['status'] : 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $update = [
            'name'          => $this->db->escape_str(trim($data['name'])),
            'slug'          => $this->make_slug($data['name'], $id),
            'description'   => $this->db->escape_str(trim($data['description'] ?? '')),
            'display_order' => (int)($data['display_order'] ?? 0),
            'status'        => isset($data['status']) ? (int)$data['status'] : 1,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];
        return $this->db->where('id', (int)$id)->update($this->table, $update);
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

    public function delete($id)
    {
        // Nullify category_id in projects before deleting
        $this->db->where('category_id', (int)$id)->update('projects', ['category_id' => NULL]);
        return $this->db->where('id', (int)$id)->delete($this->table);
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_with_project_count()
    {
        return $this->db
            ->select('pc.*, COUNT(p.id) as project_count')
            ->from($this->table . ' pc')
            ->join('projects p', 'p.category_id = pc.id AND p.status = 1', 'left')
            ->group_by('pc.id')
            ->order_by('pc.display_order', 'ASC')
            ->get()
            ->result_array();
    }
}
