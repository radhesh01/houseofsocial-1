<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    private $upload_path      = 'assets/images/uploads/';
    private $upload_path_full;

    public function __construct()
    {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Post_model');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['string', 'url', 'form']);
        $this->upload_path_full = FCPATH . $this->upload_path;
        if (!is_dir($this->upload_path_full)) {
            @mkdir($this->upload_path_full, 0755, TRUE);
        }
    }

    public function index()
    {
        $data['posts'] = $this->Post_model->get_all();
        $data['flash'] = $this->session->flashdata('msg');
        $this->_render('admin/posts/index', $data);
    }

    public function create()
    {
        $data['post']   = NULL;
        $data['action'] = 'create';
        $data['flash']  = '';
        $this->_render('admin/posts/form', $data);
    }

    public function store()
    {
        $this->_set_validation_rules();
        if (!$this->form_validation->run()) {
            $data['post']   = NULL;
            $data['action'] = 'create';
            $data['flash']  = validation_errors();
            $this->_render('admin/posts/form', $data);
            return;
        }
        $image_name = $this->_handle_upload();
        $slug       = $this->_make_slug($this->input->post('title'));
        $this->Post_model->create([
            'title'         => $this->input->post('title', TRUE),
            'slug'          => $slug,
            'description'   => $this->input->post('description', TRUE),
            'content'       => $this->input->post('content'),
            'author'        => $this->input->post('author', TRUE),
            'external_link' => $this->input->post('external_link', TRUE),
            'image'         => $image_name,
            'status'        => (int) $this->input->post('status'),
        ]);
        $this->session->set_flashdata('msg', 'Post created successfully!');
        redirect('admin/posts');
    }

    public function edit($id)
    {
        $post = $this->Post_model->get_by_id($id);
        if (!$post) show_404();
        $data['post']   = $post;
        $data['action'] = 'edit';
        $data['flash']  = '';
        $this->_render('admin/posts/form', $data);
    }

    public function update($id)
    {
        $post = $this->Post_model->get_by_id($id);
        if (!$post) show_404();
        $this->_set_validation_rules();
        if (!$this->form_validation->run()) {
            $data['post']   = $post;
            $data['action'] = 'edit';
            $data['flash']  = validation_errors();
            $this->_render('admin/posts/form', $data);
            return;
        }
        $update = [
            'title'         => $this->input->post('title', TRUE),
            'description'   => $this->input->post('description', TRUE),
            'content'       => $this->input->post('content'),
            'author'        => $this->input->post('author', TRUE),
            'external_link' => $this->input->post('external_link', TRUE),
            'status'        => (int) $this->input->post('status'),
        ];
        $new_image = $this->_handle_upload();
        if ($new_image) {
            if (!empty($post['image'])) {
                $old = $this->upload_path_full . $post['image'];
                if (file_exists($old)) @unlink($old);
            }
            $update['image'] = $new_image;
        }
        $this->Post_model->update($id, $update);
        $this->session->set_flashdata('msg', 'Post updated successfully!');
        redirect('admin/posts');
    }

    public function delete($id)
    {
        $post = $this->Post_model->get_by_id($id);
        if ($post && !empty($post['image'])) {
            $img = $this->upload_path_full . $post['image'];
            if (file_exists($img)) @unlink($img);
        }
        $this->Post_model->delete($id);
        $this->session->set_flashdata('msg', 'Post deleted.');
        redirect('admin/posts');
    }

    public function toggle($id)
    {
        $this->Post_model->toggle_status($id);
        redirect('admin/posts');
    }

    /**
     * CKEditor 5 image upload endpoint
     * Route: POST admin/posts/upload_image
     * MUST be in csrf_exclude_uris in config.php
     */
    public function upload_image()
    {
        // Prevent any CI output buffering / HTML prepend
        if (ob_get_level()) ob_end_clean();

        header('Content-Type: application/json');

        if (!$this->session->userdata('admin_logged_in')) {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
            exit;
        }

        if (!is_dir($this->upload_path_full)) {
            @mkdir($this->upload_path_full, 777, TRUE);
        }

        // CKEditor sends field name "upload"; fallback "file"
        $field = (isset($_FILES['upload']) && $_FILES['upload']['error'] !== UPLOAD_ERR_NO_FILE)
            ? 'upload' : 'file';

        if (!isset($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
            http_response_code(400);
            echo json_encode(['error' => 'No file received']);
            exit;
        }

        $this->upload->initialize([
            'upload_path'   => $this->upload_path_full,
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size'      => 5120,
            'encrypt_name'  => TRUE,
        ]);

        if ($this->upload->do_upload($field)) {
            $file = $this->upload->data();
            $url  = base_url($this->upload_path . $file['file_name']);
            echo json_encode(['url' => $url, 'location' => $url]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => strip_tags($this->upload->display_errors('', ''))]);
        }
        exit;
    }

    // ── PRIVATE ──────────────────────────────────────────────

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

    private function _set_validation_rules()
    {
        $this->form_validation->set_rules('title',       'Title',       'required|trim|max_length[255]');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('author',      'Author',      'required|trim|max_length[100]');
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

    private function _make_slug($title)
    {
        $slug     = url_title(strtolower($title), '-', TRUE);
        $original = $slug;
        $i        = 1;
        while ($this->Post_model->slug_exists($slug)) {
            $slug = $original . '-' . $i++;
        }
        return $slug;
    }
}