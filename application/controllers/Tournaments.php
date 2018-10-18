<?php

class Tournaments extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('AccountsModel');
        $this->load->model('TournamentsModel');

        if (isset($this->session->logged_in)) {
            if ($this->session->logged_in === FALSE) {
                redirect('/login');
            }
        }
    }

    public function view($page)
    {
        if (!file_exists(APPPATH . 'views/tournaments/' . $page . '.php')) {
            show_404();
        }
        if (isset($this->session->logged_in)) {
            if ($this->session->logged_in === FALSE) {
                redirect('index.php/login');
            }else{
                if ($page == 'mytournaments') {
                    $data['table'] = $this->TournamentsModel->show_tournament($_SESSION['username']);
                    $this->load->view('templates/header-2');
                    $this->load->view('tournaments/' . $page, $data);
                } else {
                    $this->load->view('templates/header-2');
                    $this->load->view('tournaments/' . $page);
                }
            }
        }
        else{
            redirect('index.php/login');
        }
    }

    public function show_all_tournaments()
    {

    }
    

}
