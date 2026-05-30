<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    private $table = 'settings';
    private $_cache = NULL;

    public function get_all()
    {
        $rows = $this->db->get($this->table)->result_array();
        $out  = [];
        foreach ($rows as $row) {
            $out[$row['setting_key']] = $row;
        }
        return $out;
    }

    public function get_flat()
    {
        if ($this->_cache !== NULL) return $this->_cache;
        $rows = $this->db->get($this->table)->result_array();
        $out  = [];
        foreach ($rows as $row) {
            $out[$row['setting_key']] = $row['setting_value'];
        }
        $this->_cache = $out;
        return $out;
    }

    public function get_value($key, $default = '')
    {
        $row = $this->db
            ->where('setting_key', $this->db->escape_str($key))
            ->get($this->table)
            ->row_array();
        return $row ? $row['setting_value'] : $default;
    }

    public function set($key, $value)
    {
        $exists = $this->db
            ->where('setting_key', $this->db->escape_str($key))
            ->get($this->table)
            ->num_rows() > 0;

        $payload = [
            'setting_value' => $value,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        if ($exists) {
            $this->db->where('setting_key', $this->db->escape_str($key))->update($this->table, $payload);
        } else {
            $payload['setting_key'] = $this->db->escape_str($key);
            $this->db->insert($this->table, $payload);
        }
        $this->_cache = NULL;
        return TRUE;
    }

    public function update_all($data)
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
        return TRUE;
    }

    public function seed_defaults()
    {
        $defaults = [
            'site_name'         => 'CrestBytes',
            'site_tagline'      => 'Premium Digital Products',
            'site_email'        => 'hello@crestbytes.com',
            'site_phone'        => '',
            'site_address'      => 'India',
            'site_logo'         => '',
            'hero_headline'     => 'We Build Digital Products That Perform',
            'hero_subtext'      => 'Strategy. Design. Development. All under one roof.',
            'about_text'        => '',
            'booking_enabled'   => '1',
            'booking_timezone'  => 'Asia/Kolkata',
            'stat_projects'     => '50',
            'stat_clients'      => '30',
            'stat_countries'    => '8',
            'stat_experience'   => '5',
        ];
        foreach ($defaults as $key => $value) {
            $exists = $this->db
                ->where('setting_key', $key)
                ->get($this->table)
                ->num_rows() > 0;
            if (!$exists) {
                $this->db->insert($this->table, [
                    'setting_key'   => $key,
                    'setting_value' => $value,
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
