<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model', 'Post_model', 'Setting_model']);
        $this->load->library(['upload', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    // Check if admin is logged in
    private function require_login() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    }

    // ─── LOGIN ────────────────────────────────────────────────

    public function login() {
        if ($this->session->userdata('admin_id')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');
    }

    public function login_submit() {
        $this->form_validation->set_rules('email',    'Email',    'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Please fill all fields correctly.');
            redirect('admin/login');
        }

        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password');

        $admin = $this->Admin_model->verify_login($email, $password);
        if ($admin) {
            $this->session->set_userdata([
                'admin_id'       => $admin['id'],
                'admin_username' => $admin['username'],
                'admin_email'    => $admin['email'],
            ]);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('admin/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['admin_id', 'admin_username', 'admin_email']);
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    // ─── DASHBOARD ────────────────────────────────────────────

    public function dashboard() {
        $this->require_login();
        $data['total_posts']  = count($this->Post_model->get_all());
        $data['active_posts'] = $this->Post_model->count_active();
        $data['recent_posts'] = $this->Post_model->get_active(5);
        $data['page_title']   = 'Dashboard';
        $this->load->view('layouts/admin_layout', [
            'content' => $this->load->view('admin/dashboard', $data, TRUE),
            'data'    => $data,
        ]);
    }

    // ─── POSTS ────────────────────────────────────────────────

    public function posts() {
        $this->require_login();
        $data['posts']      = $this->Post_model->get_all();
        $data['page_title'] = 'Manage Posts';
        $this->load->view('layouts/admin_layout', [
            'content' => $this->load->view('admin/posts', $data, TRUE),
            'data'    => $data,
        ]);
    }

    public function add_post() {
        $this->require_login();
        $data['page_title'] = 'Add Post';
        $this->load->view('layouts/admin_layout', [
            'content' => $this->load->view('admin/post_form', $data, TRUE),
            'data'    => $data,
        ]);
    }

    public function store_post() {
        $this->require_login();

        $this->form_validation->set_rules('title',       'Title',       'required|max_length[255]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('content',     'Content',     'required');
        $this->form_validation->set_rules('author',      'Author',      'required|max_length[100]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/posts/add');
        }

        // Handle image upload
        $image_name = '';
        if (!empty($_FILES['image']['name'])) {
            $upload_result = $this->_upload_image();
            if ($upload_result['status'] === FALSE) {
                $this->session->set_flashdata('error', $upload_result['message']);
                redirect('admin/posts/add');
            }
            $image_name = $upload_result['file_name'];
        }

        $title = $this->input->post('title', TRUE);
        $data  = [
            'title'         => $title,
            'slug'          => $this->Post_model->make_slug($title),
            'description'   => $this->input->post('description', TRUE),
            'content'       => $this->input->post('content'),
            'image'         => $image_name,
            'author'        => $this->input->post('author', TRUE),
            'external_link' => $this->input->post('external_link', TRUE),
            'status'        => $this->input->post('status') ? 1 : 0,
        ];

        $this->Post_model->insert($data);
        $this->session->set_flashdata('success', 'Post created successfully!');
        redirect('admin/posts');
    }

    public function edit_post($id) {
        $this->require_login();
        $data['post']       = $this->Post_model->get_by_id($id);
        $data['page_title'] = 'Edit Post';
        if (!$data['post']) {
            $this->session->set_flashdata('error', 'Post not found.');
            redirect('admin/posts');
        }
        $this->load->view('layouts/admin_layout', [
            'content' => $this->load->view('admin/post_form', $data, TRUE),
            'data'    => $data,
        ]);
    }

    public function update_post($id) {
        $this->require_login();

        $this->form_validation->set_rules('title',       'Title',       'required|max_length[255]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('content',     'Content',     'required');
        $this->form_validation->set_rules('author',      'Author',      'required|max_length[100]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/posts/edit/' . $id);
        }

        $post       = $this->Post_model->get_by_id($id);
        $image_name = $post['image'];

        if (!empty($_FILES['image']['name'])) {
            $upload_result = $this->_upload_image();
            if ($upload_result['status'] === FALSE) {
                $this->session->set_flashdata('error', $upload_result['message']);
                redirect('admin/posts/edit/' . $id);
            }
            // Delete old image
            if ($image_name && file_exists(FCPATH . 'assets/uploads/posts/' . $image_name)) {
                unlink(FCPATH . 'assets/uploads/posts/' . $image_name);
            }
            $image_name = $upload_result['file_name'];
        }

        $title = $this->input->post('title', TRUE);
        $data  = [
            'title'         => $title,
            'slug'          => $this->Post_model->make_slug($title, $id),
            'description'   => $this->input->post('description', TRUE),
            'content'       => $this->input->post('content'),
            'image'         => $image_name,
            'author'        => $this->input->post('author', TRUE),
            'external_link' => $this->input->post('external_link', TRUE),
            'status'        => $this->input->post('status') ? 1 : 0,
        ];

        $this->Post_model->update($id, $data);
        $this->session->set_flashdata('success', 'Post updated successfully!');
        redirect('admin/posts');
    }

    public function delete_post($id) {
        $this->require_login();
        $post = $this->Post_model->get_by_id($id);
        if ($post && $post['image'] && file_exists(FCPATH . 'assets/uploads/posts/' . $post['image'])) {
            unlink(FCPATH . 'assets/uploads/posts/' . $post['image']);
        }
        $this->Post_model->delete($id);
        $this->session->set_flashdata('success', 'Post deleted.');
        redirect('admin/posts');
    }

    public function toggle_post($id) {
        $this->require_login();
        $new_status = $this->Post_model->toggle($id);
        $msg = ($new_status == 1) ? 'Post is now visible.' : 'Post is now hidden.';
        $this->session->set_flashdata('success', $msg);
        redirect('admin/posts');
    }

    // ─── SETTINGS ─────────────────────────────────────────────

    public function settings() {
        $this->require_login();
        $data['settings']   = $this->Setting_model->get_all_rows();
        $data['page_title'] = 'Settings';
        $this->load->view('layouts/admin_layout', [
            'content' => $this->load->view('admin/settings', $data, TRUE),
            'data'    => $data,
        ]);
    }

    public function update_settings() {
        $this->require_login();

        $settings_rows = $this->Setting_model->get_all_rows();

        foreach ($settings_rows as $row) {
            $key = $row['key'];

            if ($row['type'] === 'file') {
                // Handle logo upload
                if (!empty($_FILES[$key]['name'])) {
                    $this->load->library('upload', [
                        'upload_path'   => FCPATH . 'assets/uploads/',
                        'allowed_types' => 'jpg|jpeg|png|gif|svg|webp',
                        'max_size'      => 2048,
                        'encrypt_name'  => TRUE,
                    ]);
                    if ($this->upload->do_upload($key)) {
                        $file = $this->upload->data();
                        // Delete old
                        $old = $this->Setting_model->get($key);
                        if ($old && file_exists(FCPATH . 'assets/uploads/' . $old)) {
                            unlink(FCPATH . 'assets/uploads/' . $old);
                        }
                        $this->Setting_model->set($key, $file['file_name']);
                    }
                }
            } else {
                $value = $this->input->post($key, TRUE);
                if ($value !== NULL) {
                    $this->Setting_model->set($key, $value);
                }
            }
        }

        $this->session->set_flashdata('success', 'Settings saved successfully!');
        redirect('admin/settings');
    }

    // ─── PRIVATE: Image Upload Helper ─────────────────────────

    private function _upload_image() {
        $config = [
            'upload_path'   => FCPATH . 'assets/uploads/posts/',
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size'      => 5120,
            'encrypt_name'  => TRUE,
        ];
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $file = $this->upload->data();
            return ['status' => TRUE, 'file_name' => $file['file_name']];
        }
        return ['status' => FALSE, 'message' => $this->upload->display_errors()];
    }
}
