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
        if (isset($this->session->logged_in)) {
            if ($this->session->logged_in === FALSE) {
                redirect('/login');
            }
        }
    }

    public function view($page)
    {
        if (!file_exists(APPPATH . 'views/accounts/' . $page . '.php')) {
            show_404();
        }
        if($page === "account"){
            if (isset($this->session->logged_in)) {
                if ($this->session->logged_in === FALSE) {
                    redirect('index.php/login');
                }else{
                    $result = $this->AccountsModel->find_user($_SESSION['username']);
                    foreach ($result->result_array() as $data)
                    {
                        $data['username'];
                        $data['email'];
                        $data['nickname'];
                        $data['first_name'];
                        $data['last_name'];
                        $data['phone'];
                        $data['profil_picture_url'];
                    }
                    $this->load->view('templates/header-2');
                    $this->load->view('accounts/account', $data);
                }
            }
            else{
                redirect('index.php/login');
            }
        } else {
            if (isset($this->session->logged_in)) {
                if ($this->session->logged_in === TRUE) {
                    redirect('index.php/account');
                }else{
                    $this->load->view('templates/header');
                    $this->load->view('accounts/' . $page);
                }
            }
            else{
                $this->load->view('templates/header');
                $this->load->view('accounts/' . $page);
            }
        }
        $this->load->view('templates/footer');
    }

    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Are you kidding me?');

        if ($this->form_validation->run() == FALSE) {
            $this->view('login');
        } else {
            $username = $this->input->post('username');
            $result = $this->AccountsModel->find_user($username);
            // cek username, terdaftar ndak
            if ($result->num_rows() === 1) {
                $password = $this->input->post('password');
                // cek password,
                if (password_verify($password, $result->row()->password)) {
                    $sess['username'] = $result->row()->username;
                    $sess['nickname'] = $result->row()->nickname;
                    $sess['logged_in'] = true;
                    $profil_picture_url = $result->row()->profil_picture_url;
                    if (is_null($profil_picture_url)) {
                        $sess['profil_picture_url'] = "assets/images/no_profile.jpg";
                    } else {
                        $sess['profil_picture_url'] = $profil_picture_url;
                    }
                    $this->session->set_userdata($sess);
                    redirect('');
                } else {
                    $sess['message'] = "Wrong username / password";
                    $sess['msg_type'] = "danger";
                    $this->session->set_userdata($sess);
                    redirect("index.php/login");
                }
            } else {
                // user tidak terdaftar
                $sess['message'] = "Unregistered user";
                $sess['msg_type'] = "danger";
                $this->session->set_userdata($sess);
                redirect("index.php/login");
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php/login');
    }

    public function signup()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|alpha_dash');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|alpha_dash');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[password]|alpha_dash');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_message('is_unique', 'Oops! {field} already exist!');
        $this->form_validation->set_message('matches', 'Oops! does not match with {param} field!');
        $this->form_validation->set_message('alpha_dash', 'No spaces allowed!');


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
                $sess['message'] = "Registration success!!, Start login here";
                $sess['msg_type'] = "success";
                $this->session->set_userdata($sess);
                redirect("index.php/login");
            } else {
                $status = 'Fail to Sign Up, ' . $result;
                $this->view('signup', $status);
            }
        }
    }

    public function editProfile()
    {
        $this->form_validation->set_rules('nickname', 'Nickname', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'alpha_numeric_spaces');
        $this->form_validation->set_rules('lastname', 'Lastname', 'alpha_numeric_spaces');
        $this->form_validation->set_rules('phone', 'Phone', 'numeric');
        $this->form_validation->set_message('is_unique', 'Oops! {field} already exist!');
        $this->form_validation->set_message('matches', 'Oops! does not match with {param} field!');
        $this->form_validation->set_message('alpha_dash', 'No spaces allowed!');


        if ($this->form_validation->run() == FALSE) {
            $this->view('account');
        } else {
            $data = [
                'nickname' => $this->input->post('nickname'),
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'phone' => $this->input->post('phone'),
            ];
            $username = $_SESSION['username'];
            $result = $this->AccountsModel->edit($data, $username);
            if ($result) {
                $sess['message'] = "Edit profile success!!";
                $sess['msg_type'] = "success";
                $this->session->set_userdata($sess);
                redirect("index.php/account");
            } else {
                $status = 'Fail to edit profile, ' . $result;
                $this->view('account', $status);
            }
        }
    }  

    public function editPassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|alpha_dash');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[password]|alpha_dash');
        $this->form_validation->set_message('matches', 'Oops! does not match with {param} field!');
        $this->form_validation->set_message('alpha_dash', 'No spaces allowed!');


        if ($this->form_validation->run() == FALSE) {
            $this->view('account');
        } else {
            $data = [
                'password' => password_hash(($this->input->post('password')), PASSWORD_BCRYPT),
            ];
            $username = $_SESSION['username'];
            $result = $this->AccountsModel->edit($data, $username);
            if ($result) {
                $sess['message'] = "Edit password success!!";
                $sess['msg_type'] = "success";
                $this->session->set_userdata($sess);
                redirect("index.php/account");
            } else {
                $status = 'Fail to edit password , ' . $result;
                $this->view('account', $status);
            }
        }
    }  

    public function editProfilePicture()
    {
        
    }
}
