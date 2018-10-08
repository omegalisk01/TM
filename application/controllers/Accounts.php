<?php

class Accounts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('AccountsModel');
    }

    public function view($page)
    {
        if (!file_exists(APPPATH . 'views/accounts/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucwords(str_replace('_', ' ', $page));

        $this->load->view('templates/header', $data);
        $this->load->view('accounts/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function login()
    {

    }

    public function logout()
    {

    }

    public function signup()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpass', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_message('is_unique', 'Oops! {field} already exist!');
        $this->form_validation->set_message('matches', 'Oops! does not match with {param} field!');

        if ($this->form_validation->run() == FALSE) {
            $this->view('signup');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash(($this->input->post('password')), PASSWORD_BCRYPT),
                'email' => $this->input->post('email'),
                'nickname' => $this->input->post('nickname'),
            ];

            $result = $this->AccountsModel->signup($data);
            if ($result) {
                $_SESSION['message'] = "Registration success!!, Start login here";
                redirect("/login");
            } else {
                $status = 'Pendaftaran gagal, ' . $result;
                $this->view('signup', $status);
            }

        }


    }

    public function delete()
    {

    }
}
