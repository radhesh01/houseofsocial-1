<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Screenshot_model extends CI_Model
{

    private $table = 'project_screenshots';

    public function get_by_project($project_id)
    {
        return $this->db
            ->where('project_id', (int)$project_id)
            ->order_by('display_order', 'ASC')
            ->order_by('id', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->table)->row_array();
    }

    public function create($data)
    {
        $max = $this->_get_max_order($data['project_id']);
        $insert = [
            'project_id'    => (int)$data['project_id'],
            'image'         => $this->db->escape_str(trim($data['image'])),
            'device_type'   => in_array($data['device_type'] ?? '', ['mobile', 'tablet', 'desktop']) ? $data['device_type'] : 'mobile',
            'alt_text'      => $this->db->escape_str(trim($data['alt_text'] ?? '')),
            'display_order' => $max + 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }

    public function update_alt($id, $alt_text, $device_type = NULL)
    {
        $update = [
            'alt_text' => $this->db->escape_str(trim($alt_text)),
        ];
        if ($device_type && in_array($device_type, ['mobile', 'tablet', 'desktop'])) {
            $update['device_type'] = $device_type;
        }
        return $this->db->where('id', (int)$id)->update($this->table, $update);
    }

    public function delete($id)
    {
        $row = $this->get_by_id($id);
        if ($row) {
            $path = FCPATH . 'assets/images/uploads/screenshots/' . $row['image'];
            if (file_exists($path)) @unlink($path);
        }
        return $this->db->where('id', (int)$id)->delete($this->table);
    }

    public function delete_by_project($project_id)
    {
        $rows = $this->get_by_project($project_id);
        foreach ($rows as $row) {
            $path = FCPATH . 'assets/images/uploads/screenshots/' . $row['image'];
            if (file_exists($path)) @unlink($path);
        }
        return $this->db->where('project_id', (int)$project_id)->delete($this->table);
    }

    public function reorder($orders)
    {
        // $orders = ['id' => order_value, ...]
        if (empty($orders) || !is_array($orders)) return FALSE;
        foreach ($orders as $id => $order) {
            $this->db->where('id', (int)$id)->update($this->table, [
                'display_order' => (int)$order,
            ]);
        }
        return TRUE;
    }

    public function count_by_project($project_id)
    {
        return $this->db
            ->where('project_id', (int)$project_id)
            ->get($this->table)
            ->num_rows();
    }

    private function _get_max_order($project_id)
    {
        $row = $this->db
            ->select_max('display_order')
            ->where('project_id', (int)$project_id)
            ->get($this->table)
            ->row_array();
        return $row ? (int)$row['display_order'] : 0;
    }
}
