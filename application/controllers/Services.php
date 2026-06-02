<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    private $settings = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Service_model', 'Setting_model']);
        $this->load->helper(['url', 'form']);
        $this->settings = $this->Setting_model->get_flat();
    }

    public function index()
    {
        $data['settings']   = $this->settings;
        $data['services']   = $this->Service_model->get_active();
        $data['page_title'] = 'Our Services';
        $data['meta_title'] = 'Digital Marketing Services | HouseOfSocial';
        $data['meta_desc']  = 'Explore all digital marketing services offered by HouseOfSocial — influencer marketing, meme marketing, brand strategy, and more.';
        $this->_render('frontend/services_list', $data);
    }

    public function detail($slug)
    {
        $service = $this->Service_model->get_by_slug($slug);
        if (!$service) show_404();

        $data['settings']   = $this->settings;
        $data['service']    = $service;
        $data['services']   = $this->Service_model->get_active();
        $data['page_title'] = $service['title'];
        $data['meta_title'] = !empty($service['meta_title']) ? $service['meta_title'] : $service['title'] . ' | HouseOfSocial';
        $data['meta_desc']  = !empty($service['meta_description']) ? $service['meta_description'] : $service['short_description'];
        $this->_render('frontend/service_detail', $data);
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
