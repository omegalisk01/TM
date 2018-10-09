<?php

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
        if (isset($this->session->logged_in)) {
            if ($this->session->logged_in === FALSE) {
                redirect('/login');
            }
        }
    }

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucwords(str_replace('_', ' ', $page));
        if (isset($this->session->logged_in)) {
                $this->load->view('templates/header-2', $data);

        } else {
            $this->load->view('templates/header', $data);
        }
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}