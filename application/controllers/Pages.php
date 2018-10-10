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
        if (isset($this->session->logged_in)) {
                $this->load->view('templates/header-2');

        } else {
            $this->load->view('templates/header');
        }
        $this->load->view('pages/' . $page);
        $this->load->view('templates/footer');
    }
}