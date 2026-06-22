<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    private $upload_path      = 'assets/images/uploads/';
    private $upload_path_full;

    public function __construct()
    {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Blog_model');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['url', 'form', 'string']);
        $this->upload_path_full = FCPATH . $this->upload_path;
        if (!is_dir($this->upload_path_full)) {
            @mkdir($this->upload_path_full, 0755, TRUE);
        }
    }

    public function index()
    {
        $data['blogs'] = $this->Blog_model->get_all();
        $data['flash'] = $this->session->flashdata('msg');
        $this->_render('admin/blogs/index', $data);
    }

    public function create()
    {
        $data['blog']   = NULL;
        $data['action'] = 'create';
        $data['flash']  = '';
        $this->_render('admin/blogs/form', $data);
    }

    public function store()
    {
        $this->_set_rules();
        if (!$this->form_validation->run()) {
            $data['blog']   = NULL;
            $data['action'] = 'create';
            $data['flash']  = validation_errors();
            $this->_render('admin/blogs/form', $data);
            return;
        }

        $image_name = $this->_handle_upload();

        $this->Blog_model->create([
            'title'    => $this->input->post('title', TRUE),
            'subtitle' => $this->input->post('subtitle', TRUE),
            'author'   => $this->input->post('author', TRUE),
            'content'  => $this->input->post('content'),
            'image'    => $image_name,
            'status'   => (int)$this->input->post('status'),
        ]);
        $this->session->set_flashdata('msg', 'Blog post created successfully!');
        redirect('admin/blogs');
    }

    public function edit($id)
    {
        $blog = $this->Blog_model->get_by_id($id);
        if (!$blog) show_404();
        $data['blog']   = $blog;
        $data['action'] = 'edit';
        $data['flash']  = '';
        $this->_render('admin/blogs/form', $data);
    }

    public function update($id)
    {
        $blog = $this->Blog_model->get_by_id($id);
        if (!$blog) show_404();

        $this->_set_rules();
        if (!$this->form_validation->run()) {
            $data['blog']   = $blog;
            $data['action'] = 'edit';
            $data['flash']  = validation_errors();
            $this->_render('admin/blogs/form', $data);
            return;
        }

        $image_name = $blog['image'];
        $new_image  = $this->_handle_upload();

        if ($new_image) {
            if (!empty($image_name)) {
                $old = $this->upload_path_full . $image_name;
                if (file_exists($old)) @unlink($old);
            }
            $image_name = $new_image;
        }

        $this->Blog_model->update($id, [
            'title'    => $this->input->post('title', TRUE),
            'subtitle' => $this->input->post('subtitle', TRUE),
            'author'   => $this->input->post('author', TRUE),
            'content'  => $this->input->post('content'),
            'image'    => $image_name,
            'status'   => (int)$this->input->post('status'),
        ]);
        $this->session->set_flashdata('msg', 'Blog post updated successfully!');
        redirect('admin/blogs');
    }

    public function delete($id)
    {
        $this->Blog_model->delete($id);
        $this->session->set_flashdata('msg', 'Blog post deleted.');
        redirect('admin/blogs');
    }

    public function toggle($id)
    {
        $this->Blog_model->toggle_status($id);
        redirect('admin/blogs');
    }

    private function _set_rules()
    {
        $this->form_validation->set_rules('title',  'Title',  'required|trim|max_length[255]');
        $this->form_validation->set_rules('author', 'Author', 'required|trim|max_length[100]');
    }

    private function _handle_upload()
    {
        if (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
            return '';
        }
        $this->upload->initialize([
            'upload_path'   => $this->upload_path_full,
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size'      => 5120,
            'encrypt_name'  => TRUE,
        ]);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }
        $this->session->set_flashdata('upload_error', strip_tags($this->upload->display_errors('', '')));
        return '';
    }

    private function _require_login()
    {
        if (!$this->session->userdata('admin_logged_in')) redirect('admin/login');
    }

    private function _render($view, $data = [])
    {
        $this->load->view('admin/layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/layouts/footer');
    }
}