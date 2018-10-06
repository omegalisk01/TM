<?php
class Accounts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
	}

	public function view($page)
	{
		if (!file_exists(APPPATH.'views/accounts/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucwords(str_replace('_', ' ', $page));
		
		$this->load->view('templates/header', $data);
		$this->load->view('accounts/'.$page, $data);
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

	}

	public function delete()
	{

	}
}