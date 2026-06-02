<?php
/* ================================================================
   FILE: application/controllers/admin/Enquiries.php
   ================================================================ */
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Enquiry_model');
    }

    public function index() {
        $data['enquiries'] = $this->Enquiry_model->get_all();
        $data['unread']    = $this->Enquiry_model->count_unread();
        $data['flash']     = $this->session->flashdata('msg');
        $data['site_title']= 'FilmyCurry';
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/enquiries/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function view($id) {
        $enquiry = $this->Enquiry_model->get_by_id($id);
        if (!$enquiry) show_404();
        $this->Enquiry_model->mark_read($id);
        $data['enquiry']   = $enquiry;
        $data['site_title']= 'FilmyCurry';
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/enquiries/view', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function delete($id) {
        $this->Enquiry_model->delete($id);
        $this->session->set_flashdata('msg', 'Enquiry deleted.');
        redirect('admin/enquiries');
    }

    private function _require_login() {
        if (!$this->session->userdata('admin_logged_in')) redirect('admin/login');
    }
}
