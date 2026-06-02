<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    private $settings = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Blog_model', 'Setting_model']);
        $this->load->helper(['url', 'form']);
        $this->settings = $this->Setting_model->get_flat();
    }

    public function index()
    {
        $data['settings']   = $this->settings;
        $data['blogs']      = $this->Blog_model->get_active();
        $data['page_title'] = 'Blog';
        $data['meta_title'] = 'Blog | HouseOfSocial';
        $data['meta_desc']  = 'Insights, trends, and expert perspectives on influencer marketing, meme culture, and digital brand strategy from the HouseOfSocial team.';
        $this->_render('frontend/blog_list', $data);
    }

    public function detail($slug)
    {
        $blog = $this->Blog_model->get_by_slug($slug);
        if (!$blog) show_404();

        $data['settings']   = $this->settings;
        $data['blog']       = $blog;
        $data['page_title'] = $blog['title'];
        $data['meta_title'] = $blog['title'] . ' | HouseOfSocial Blog';
        $data['meta_desc']  = $blog['subtitle'];
        $this->_render('frontend/blog_detail', $data);
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
