<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{
	public function login()
	{
	    $this->data['page_title'] = 'Login';
		$this->load->view('login', $this->data);
	}
	
	public function logout() 
	{
	    $this->session->sess_destroy();
	    redirect('auth/login');
	}
}
