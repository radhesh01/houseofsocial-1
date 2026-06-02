<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper(['url', 'form']);
    }

    public function login() {
        // Already logged in → go to dashboard
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        $data['error'] = $this->session->flashdata('login_error') ?? '';

        // Handle POST
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $user = $this->Admin_model->verify_login(
                    $this->input->post('username', TRUE),
                    $this->input->post('password')
                );

                if ($user) {
                    $this->session->set_userdata([
                        'admin_logged_in' => TRUE,
                        'admin_id'        => $user['id'],
                        'admin_username'  => $user['username'],
                    ]);
                    redirect('admin/dashboard');
                    return;
                } else {
                    $data['error'] = 'Invalid username or password.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('admin/auth/login', $data);
    }

    public function logout() {
        $this->session->unset_userdata(['admin_logged_in', 'admin_id', 'admin_username']);
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
