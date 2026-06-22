<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    private $table = 'blogs';

    public function get_all()
    {
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result_array();
    }

    public function get_active()
    {
        return $this->db->where('status', 1)->order_by('created_at', 'DESC')->get($this->table)->result_array();
    }

    public function get_active_limit($limit = 3)
    {
        return $this->db->where('status', 1)->order_by('created_at', 'DESC')->limit($limit)->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->table)->row_array();
    }

    public function get_by_slug($slug)
    {
        return $this->db->where('slug', $slug)->where('status', 1)->get($this->table)->row_array();
    }

    public function slug_exists($slug, $exclude_id = NULL)
    {
        $this->db->where('slug', $slug);
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
        $row = $this->get_by_id($id);
        if ($row && !empty($row['image'])) {
            $path = FCPATH . 'assets/images/uploads/' . $row['image'];
            if (file_exists($path)) @unlink($path);
        }
        return $this->db->where('id', (int)$id)->delete($this->table);
    }

    public function toggle_status($id)
    {
        $row = $this->get_by_id($id);
        if (!$row) return FALSE;
        return $this->db->where('id', (int)$id)->update($this->table, [
            'status'     => $row['status'] == 1 ? 0 : 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    private function _sanitize($data)
    {
        return [
            'title'    => trim($data['title'] ?? ''),
            'subtitle' => trim($data['subtitle'] ?? ''),
            'author'   => trim($data['author'] ?? 'HouseOfSocial Team'),
            'content'  => $data['content'] ?? '',
            'image'    => trim($data['image'] ?? ''),
            'status'   => isset($data['status']) ? (int)$data['status'] : 1,
        ];
    }
}