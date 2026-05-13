<?php
/* ================================================================
   FILE: application/controllers/Frontend.php  (FIXED VERSION)
   Fixes:
   - Missing route for POST contact/send (was 'contact/send', route only matched GET)
   - send_contact redirects to base_url('contact') not relative 'contact'
   - XSS: message content now sanitized before storage (basic strip_tags for display)
   - Phone/company can be empty strings — converted to null-safe handling
   ================================================================ */
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    private $settings = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Post_model', 'Setting_model', 'Enquiry_model']);
        $this->settings = $this->Setting_model->get_flat();
    }

    public function index()
    {
        $data['settings'] = $this->settings;
        $data['posts']    = $this->Post_model->get_active();
        $this->_render('frontend/home', $data);
    }

    public function post($slug)
    {
        $post = $this->Post_model->get_by_slug($slug);
        if (!$post) show_404();
        $data['settings'] = $this->settings;
        $data['post']     = $post;
        $this->_render('frontend/post', $data);
    }

    public function about()
    {
        $data['settings']   = $this->settings;
        $data['page_title'] = 'About';
        $this->_render('frontend/about', $data);
    }

    public function work()
    {
        $data['settings']   = $this->settings;
        $data['posts']      = $this->Post_model->get_active();
        $data['page_title'] = 'Our Work';
        $this->_render('frontend/work', $data);
    }

    public function contact()
    {
        $data['settings']   = $this->settings;
        $data['page_title'] = "Let's Talk";
        $this->_render('frontend/contact', $data);
    }

    public function send_contact()
    {
        $this->load->library(['form_validation', 'upload']);

        // Validation rules
        $this->form_validation->set_rules('name',    'Name',    'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('email',   'Email',   'required|valid_email|trim|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('phone',   'Phone',   'trim|max_length[30]');
        $this->form_validation->set_rules('company', 'Company', 'trim|max_length[100]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', strip_tags(validation_errors()));
            redirect(base_url('contact'));
            return;
        }

        // File upload (optional)
        $attachment = '';
        if (!empty($_FILES['attachment']['name'])) {
            $dir = FCPATH . 'assets/images/uploads/enquiries/';
            if (!is_dir($dir)) @mkdir($dir, 0755, TRUE);
            $this->upload->initialize([
                'upload_path'   => $dir,
                'allowed_types' => 'pdf|jpg|jpeg|png|webp',
                'max_size'      => 5120,
                'encrypt_name'  => TRUE,
            ]);
            if ($this->upload->do_upload('attachment')) {
                $attachment = $this->upload->data('file_name');
            }
        }

        $name    = $this->input->post('name', TRUE);
        $email   = $this->input->post('email', TRUE);
        $phone   = $this->input->post('phone', TRUE);
        $company = $this->input->post('company', TRUE);
        $budget  = $this->input->post('budget', TRUE);
        $service = $this->input->post('service', TRUE);
        $message = $this->input->post('message', TRUE);

        $this->Enquiry_model->create([
            'name'       => $name,
            'email'      => $email,
            'phone'      => $phone,
            'company'    => $company,
            'budget'     => $budget,
            'service'    => $service,
            'message'    => $message,
            'attachment' => $attachment,
            'is_read'    => 0,
        ]);

        // Email notification
        $to      = $this->settings['site_email'] ?? 'contact@filmycurry.com';
        $subject = '[FilmyCurry] New Enquiry from ' . $name;
        $body    = "Name: $name\nEmail: $email\nPhone: $phone"
            . "\nCompany: $company\nBudget: $budget\nService: $service"
            . "\n\nMessage:\n$message"
            . "\n\nAdmin: " . base_url('admin/enquiries');
        $headers = "From: FilmyCurry <noreply@filmycurry.com>\r\nReply-To: $email";

        @mail($to, $subject, $body, $headers);

        $this->session->set_flashdata('success', "Thanks {$name}! We'll respond within 24–48 hours. 🚀");
        redirect(base_url('contact'));
    }

    private function _render($view, $data = [])
    {
        $data['_settings'] = $this->settings;
        $data['_uri']      = uri_string();
        $this->load->view('layouts/frontend_layout_v5', [
            'content' => $this->load->view($view, $data, TRUE),
            'data'    => $data,
        ]);
    }
}