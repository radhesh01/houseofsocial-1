<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_model extends CI_Model {

    private $table = 'enquiries';

    public function create($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_all() {
        return $this->db->order_by('created_at','DESC')->get($this->table)->result_array();
    }

    public function get_by_id($id) {
        return $this->db->where('id',$id)->get($this->table)->row_array();
    }

    public function mark_read($id) {
        return $this->db->where('id',$id)->update($this->table,['is_read'=>1]);
    }

    public function count_unread() {
        return $this->db->where('is_read',0)->get($this->table)->num_rows();
    }

    public function delete($id) {
        // Delete attachment if exists
        $row = $this->get_by_id($id);
        if ($row && !empty($row['attachment'])) {
            $file = FCPATH . 'assets/images/uploads/enquiries/' . $row['attachment'];
            if (file_exists($file)) @unlink($file);
        }
        return $this->db->where('id',$id)->delete($this->table);
    }
}
