<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Setting_model');
        $this->load->library('upload');
    }

    public function index() {
        $data['settings'] = $this->Setting_model->get_all();
        $data['flash']    = $this->session->flashdata('msg');
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/settings/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function update() {
        $text_keys = [
            'site_title', 'site_email', 'site_phone', 'site_address',
            'hero_heading', 'hero_subtext', 'about_text',
            'stat_campaigns', 'stat_reach', 'stat_movies', 'stat_screenings',
        ];

        $updates = [];
        foreach ($text_keys as $key) {
            $val = $this->input->post($key);
            if ($val !== FALSE) {
                $updates[$key] = $val;
            }
        }

        // Logo upload
        if (isset($_FILES['site_logo']) && $_FILES['site_logo']['error'] == UPLOAD_ERR_OK) {
            $config = [
                'upload_path'   => FCPATH . 'assets/images/uploads/',
                'allowed_types' => 'jpg|jpeg|png|gif|webp|svg',
                'max_size'      => 2048,
                'encrypt_name'  => TRUE,
            ];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('site_logo')) {
                $updates['site_logo'] = $this->upload->data('file_name');
            }
        }

        if (!empty($updates)) {
            $this->Setting_model->update_all($updates);
        }

        $this->session->set_flashdata('msg', 'Settings saved successfully!');
        redirect('admin/settings');
    }

    private function _require_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }
}
