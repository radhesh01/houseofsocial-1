<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    private $upload_path = 'assets/images/uploads/';
    private $upload_path_full;

    public function __construct()
    {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Service_model');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['url', 'form', 'string']);
        $this->upload_path      = 'assets/images/uploads/';
        $this->upload_path_full = FCPATH . $this->upload_path;

        // FIXED: Added leading zero -> 777
        if (!is_dir($this->upload_path_full)) {
            mkdir($this->upload_path_full, 777, TRUE);
        }

        // FIXED: Added leading zero -> 777
        if (!is_writable($this->upload_path_full)) {
            @chmod($this->upload_path_full, 777);
        }
    }

    public function index()
    {
        $data['services'] = $this->Service_model->get_all();
        $data['flash']    = $this->session->flashdata('msg');
        $this->_render('admin/services/index', $data);
    }

    public function create()
    {
        $data['service'] = NULL;
        $data['action']  = 'create';
        $data['flash']   = '';
        $this->_render('admin/services/form', $data);
    }

    public function store()
    {
        $this->_set_rules();
        if (!$this->form_validation->run()) {
            $data['service'] = NULL;
            $data['action']  = 'create';
            $data['flash']   = validation_errors();
            $this->_render('admin/services/form', $data);
            return;
        }

        $icon = $this->_handle_upload();
        if ($this->session->flashdata('upload_error')) {
            $data['service'] = NULL;
            $data['action']  = 'create';
            $data['flash']   = $this->session->flashdata('upload_error');
            $this->_render('admin/services/form', $data);
            return;
        }

        $this->Service_model->create([
            'title'             => $this->input->post('title', TRUE),
            'short_description' => $this->input->post('short_description', TRUE),
            'full_content'      => $this->input->post('full_content'),
            'icon_image'        => $icon,
            'icon_emoji'        => $this->input->post('icon_emoji', TRUE),
            'meta_title'        => $this->input->post('meta_title', TRUE),
            'meta_description'  => $this->input->post('meta_description', TRUE),
            'status'            => (int)$this->input->post('status'),
            'sort_order'        => (int)$this->input->post('sort_order'),
        ]);
        $this->session->set_flashdata('msg', 'Service created successfully!');
        redirect('admin/services');
    }

    public function edit($id)
    {
        $service = $this->Service_model->get_by_id($id);
        if (!$service) show_404();
        $data['service'] = $service;
        $data['action']  = 'edit';
        $data['flash']   = '';
        $this->_render('admin/services/form', $data);
    }

    public function update($id)
    {
        $service = $this->Service_model->get_by_id($id);
        if (!$service) show_404();

        $this->_set_rules();
        if (!$this->form_validation->run()) {
            $data['service'] = $service;
            $data['action']  = 'edit';
            $data['flash']   = validation_errors();
            $this->_render('admin/services/form', $data);
            return;
        }

        $update = [
            'title'             => $this->input->post('title', TRUE),
            'short_description' => $this->input->post('short_description', TRUE),
            'full_content'      => $this->input->post('full_content'),
            'icon_emoji'        => $this->input->post('icon_emoji', TRUE),
            'meta_title'        => $this->input->post('meta_title', TRUE),
            'meta_description'  => $this->input->post('meta_description', TRUE),
            'status'            => (int)$this->input->post('status'),
            'sort_order'        => (int)$this->input->post('sort_order'),
            'icon_image'        => $service['icon_image'],
        ];

        $new_icon = $this->_handle_upload();

        if ($this->session->flashdata('upload_error')) {
            $data['service'] = $service;
            $data['action']  = 'edit';
            $data['flash']   = $this->session->flashdata('upload_error');
            $this->_render('admin/services/form', $data);
            return;
        }

        if ($new_icon !== '') {
            if (!empty($service['icon_image'])) {
                $old_path = $this->upload_path_full . $service['icon_image'];
                if (file_exists($old_path)) {
                    @unlink($old_path);
                }
            }
            $update['icon_image'] = $new_icon;
        }

        $this->Service_model->update($id, $update);
        $this->session->set_flashdata('msg', 'Service updated successfully!');
        redirect('admin/services');
    }

    public function delete($id)
    {
        $this->Service_model->delete($id);
        $this->session->set_flashdata('msg', 'Service deleted.');
        redirect('admin/services');
    }

    public function toggle($id)
    {
        $this->Service_model->toggle_status($id);
        redirect('admin/services');
    }

    // ── PRIVATE ──────────────────────────────────────────────

    private function _set_rules()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('short_description', 'Short Description', 'trim');
    }

    private function _handle_upload()
    {
        if (!isset($_FILES['icon_image']) || $_FILES['icon_image']['error'] === UPLOAD_ERR_NO_FILE) {
            return '';
        }

        if ($_FILES['icon_image']['error'] !== UPLOAD_ERR_OK) {
            $this->session->set_flashdata('upload_error', 'File upload failed (PHP error code: ' . $_FILES['icon_image']['error'] . ')');
            return '';
        }

        // 1. Ensure directory exists with correct 777 octal permission
        if (!is_dir($this->upload_path_full)) {
            mkdir($this->upload_path_full, 777, TRUE);
        }

        // 2. Force permissions just in case using correct 777 octal
        @chmod($this->upload_path_full, 777);

        // 3. Resolve the exact absolute path on the server
        $resolved_path = realpath($this->upload_path_full);

        // 4. Strict check before handing off to CodeIgniter
        if (!$resolved_path || !is_writable($resolved_path)) {
            $this->session->set_flashdata('upload_error', 'CRITICAL: Server OS blocked write access to: ' . $this->upload_path_full . '. You MUST delete this folder manually via FTP/cPanel.');
            return '';
        }

        // 5. Initialize upload using the perfectly resolved path + trailing slash
        $this->upload->initialize([
            'upload_path'   => $resolved_path . DIRECTORY_SEPARATOR,
            'allowed_types' => 'jpg|jpeg|png|gif|webp|svg',
            'max_size'      => 5120,
            'encrypt_name'  => TRUE,
        ]);

        if ($this->upload->do_upload('icon_image')) {
            return $this->upload->data('file_name');
        }

        $this->session->set_flashdata('upload_error', strip_tags($this->upload->display_errors('', '')));
        return '';
    }

    private function _require_login()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    private function _render($view, $data = [])
    {
        $this->load->view('admin/layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/layouts/footer');
    }
}