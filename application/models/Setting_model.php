<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    private $table = 'settings';

    public function get_all() {
        $rows = $this->db->get($this->table)->result_array();
        $settings = [];
        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row;
        }
        return $settings;
    }

    public function get_flat() {
        $rows = $this->db->get($this->table)->result_array();
        $settings = [];
        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        return $settings;
    }

    public function get_value($key, $default = '') {
        $row = $this->db->where('setting_key', $key)->get($this->table)->row_array();
        return $row ? $row['setting_value'] : $default;
    }

    public function update_all($data) {
        foreach ($data as $key => $value) {
            $this->db->where('setting_key', $key)->update($this->table, [
                'setting_value' => $value,
                'updated_at'    => date('Y-m-d H:i:s')
            ]);
        }
        return TRUE;
    }

    public function update_single($key, $value) {
        return $this->db->where('setting_key', $key)->update($this->table, [
            'setting_value' => $value,
            'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }
}
