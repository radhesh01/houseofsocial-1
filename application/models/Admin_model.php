<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    private $table = 'admin_users';

    public function get_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->table)->row_array();
    }

    public function get_by_username($username)
    {
        return $this->db
            ->where('username', $this->db->escape_str(trim($username)))
            ->where('status', 1)
            ->get($this->table)
            ->row_array();
    }

    public function verify_login($username, $password)
    {
        $user = $this->get_by_username($username);
        if (!$user) return FALSE;

        if (password_verify($password, $user['password'])) {
            $this->update_last_login($user['id']);
            return $user;
        }

        if ($user['password'] === md5($password) || $user['password'] === $password) {
            $this->update_last_login($user['id']);
            return $user;
        }

        return FALSE;
    }

    private function update_last_login($id)
    {
        $this->db->where('id', (int)$id)->update($this->table, [
            'last_login' => date('Y-m-d H:i:s'),
        ]);
    }

    public function seed_default_admin()
    {
        if ($this->db->count_all($this->table) > 0) return FALSE;
        $this->db->insert($this->table, [
            'username'   => 'admin',
            'email'      => 'admin@crestbytes.com',
            'password'   => password_hash('admin@123', PASSWORD_DEFAULT),
            'full_name'  => 'Administrator',
            'role'       => 'admin',
            'status'     => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return TRUE;
    }

    public function update_profile($id, $data)
    {
        $update = [
            'full_name'  => $this->db->escape_str(trim($data['full_name'] ?? '')),
            'email'      => $this->db->escape_str(trim($data['email'] ?? '')),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!empty($data['password'])) {
            $update['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->db->where('id', (int)$id)->update($this->table, $update);
    }
}
