<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_require_login();
        $this->load->model(['Post_model', 'Setting_model']);
    }

    public function index() {
        $data['total_posts']  = $this->Post_model->count_all();
        $data['active_posts'] = $this->Post_model->count_active();
        $data['recent_posts'] = $this->Post_model->get_all();
        $data['site_title']   = $this->Setting_model->get_value('site_title', 'FilmyCurry');
        $data['flash']        = $this->session->flashdata('msg');

        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layouts/footer');
    }

    private function _require_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }
}
