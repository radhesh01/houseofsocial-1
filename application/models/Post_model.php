<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    private $table = 'posts';

    public function get_all($status = NULL) {
        if ($status !== NULL) {
            $this->db->where('status', $status);
        }
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result_array();
    }

    public function get_active() {
        return $this->db->where('status', 1)->order_by('created_at', 'DESC')->get($this->table)->result_array();
    }

    public function get_by_id($id) {
        return $this->db->where('id', $id)->get($this->table)->row_array();
    }

    public function get_by_slug($slug) {
        return $this->db->where('slug', $slug)->where('status', 1)->get($this->table)->row_array();
    }

    public function slug_exists($slug, $exclude_id = NULL) {
        $this->db->where('slug', $slug);
        if ($exclude_id) $this->db->where('id !=', $exclude_id);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    public function create($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        // Also delete image file if exists
        $post = $this->get_by_id($id);
        if ($post && $post['image']) {
            $img = FCPATH . 'assets/images/uploads/' . $post['image'];
            if (file_exists($img)) @unlink($img);
        }
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function toggle_status($id) {
        $post = $this->get_by_id($id);
        if (!$post) return FALSE;
        $new_status = $post['status'] == 1 ? 0 : 1;
        return $this->db->where('id', $id)->update($this->table, ['status' => $new_status, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    public function count_all()    { return $this->db->count_all($this->table); }
    public function count_active() { return $this->db->where('status',1)->get($this->table)->num_rows(); }
}
