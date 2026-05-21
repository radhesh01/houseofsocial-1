<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    private $table = 'admin_users';

    public function get_by_username($username)
    {
        return $this->db
            ->where('username', $username)
            ->get($this->table)
            ->row_array();
    }

    public function verify_login($username, $password)
    {
        $user = $this->get_by_username($username);
        if (!$user) return FALSE;

        // Support both bcrypt (production) and plain MD5/plain (legacy dev)
        if (password_verify($password, $user['password'])) {
            return $user;
        }
        // Fallback for plain-text or md5 passwords in dev DB
        if ($user['password'] === $password || $user['password'] === md5($password)) {
            return $user;
        }
        return FALSE;
    }

    public function create_default_admin()
    {
        // Creates admin/admin123 if table is empty — run once
        $count = $this->db->count_all($this->table);
        if ($count === 0) {
            $this->db->insert($this->table, [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'email'      => 'admin@houseofsocial.com',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return TRUE;
        }
        return FALSE;
    }
}
