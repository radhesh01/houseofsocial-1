<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    private $settings = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'Post_model',
            'Setting_model',
            'Enquiry_model'
        ]);

        $this->load->helper([
            'url',
            'form'
        ]);

        $this->load->library([
            'session',
            'form_validation',
            'upload'
        ]);

        $this->settings = $this->Setting_model->get_flat();
    }

    // HOME
    public function index()
    {
        $data['settings'] = $this->settings;
        $data['posts']    = $this->Post_model->get_active();

        $this->_render('frontend/home', $data);
    }

    // SINGLE POST
    public function post($slug)
    {
        $post = $this->Post_model->get_by_slug($slug);

        if (!$post) {
            show_404();
        }

        $data['settings'] = $this->settings;
        $data['post']     = $post;

        $this->_render('frontend/post', $data);
    }

    // ABOUT
    public function about()
    {
        $data['settings']   = $this->settings;
        $data['page_title'] = 'About';

        $this->_render('frontend/about', $data);
    }

    // WORK
    public function work()
    {
        $data['settings']   = $this->settings;
        $data['posts']      = $this->Post_model->get_active();
        $data['page_title'] = 'Our Work';

        $this->_render('frontend/work', $data);
    }

    // CONTACT PAGE
    public function contact()
    {
        $data['settings']   = $this->settings;
        $data['page_title'] = "Let's Talk";

        $this->_render('frontend/contact', $data);
    }

    // SEND CONTACT FORM
    public function send_contact()
    {

        // VALIDATION RULES
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim|max_length[100]'
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|max_length[150]'
        );

        $this->form_validation->set_rules(
            'message',
            'Message',
            'required|trim|max_length[5000]'
        );

        $this->form_validation->set_rules(
            'phone',
            'Phone',
            'trim|max_length[30]'
        );

        $this->form_validation->set_rules(
            'company',
            'Company',
            'trim|max_length[100]'
        );

        // VALIDATION FAILED
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata(
                'error',
                strip_tags(validation_errors())
            );

            redirect(base_url('contact'));
            return;
        }

        // =========================
        // FILE UPLOAD
        // =========================

        $attachment = '';

        if (!empty($_FILES['attachment']['name'])) {

            $upload_path = FCPATH . 'assets/images/uploads/enquiries/';

            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }

            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attachment')) {

                $uploadData = $this->upload->data();
                $attachment = $uploadData['file_name'];
            } else {

                $this->session->set_flashdata(
                    'error',
                    strip_tags($this->upload->display_errors())
                );

                redirect(base_url('contact'));
                return;
            }
        }

        // =========================
        // CLEAN INPUTS
        // =========================

        $name = htmlspecialchars(
            $this->input->post('name', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $email = htmlspecialchars(
            $this->input->post('email', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $phone = htmlspecialchars(
            $this->input->post('phone', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $company = htmlspecialchars(
            $this->input->post('company', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $budget = htmlspecialchars(
            $this->input->post('budget', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $service = htmlspecialchars(
            $this->input->post('service', TRUE),
            ENT_QUOTES,
            'UTF-8'
        );

        $message = htmlspecialchars(
            $this->input->post('message', FALSE),
            ENT_QUOTES,
            'UTF-8'
        );

        // =========================
        // SAVE TO DATABASE
        // =========================

        $save = $this->Enquiry_model->create([
            'name'       => $name,
            'email'      => $email,
            'phone'      => $phone,
            'company'    => $company,
            'budget'     => $budget,
            'service'    => $service,
            'message'    => $message,
            'attachment' => $attachment,
            'is_read'    => 0
        ]);

        // DATABASE FAILED
        if (!$save) {

            $this->session->set_flashdata(
                'error',
                'Unable to save enquiry. Please try again.'
            );

            redirect(base_url('contact'));
            return;
        }

        // =========================
        // EMAIL NOTIFICATION
        // =========================

        $to = !empty($this->settings['site_email'])
            ? $this->settings['site_email']
            : 'admin@example.com';

        $subject = 'New Enquiry From ' . $name;

        $body = "
        New enquiry received.

        Name: {$name}
        Email: {$email}
        Phone: {$phone}
        Company: {$company}
        Budget: {$budget}
        Service: {$service}

        Message:
        {$message}

        Admin Panel:
        " . base_url('admin/enquiries');

        $headers  = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        @mail($to, $subject, $body, $headers);

        // SUCCESS
        $this->session->set_flashdata(
            'success',
            'Thank you! Your enquiry has been sent successfully.'
        );

        redirect(base_url('contact'));
    }

    // RENDER LAYOUT
    private function _render($view, $data = [])
    {
        $data['_settings'] = $this->settings;
        $data['_uri']      = uri_string();

        $this->load->view('layouts/frontend_layout_v5', [
            'content' => $this->load->view($view, $data, TRUE),
            'data'    => $data
        ]);
    }
}