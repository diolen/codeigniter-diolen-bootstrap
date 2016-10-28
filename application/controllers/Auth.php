<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{
	public function login()
	{
	    $this->data['page_title'] = 'Login';
	    
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_pass', 'Contraseña', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login', $this->data);
        } else {
            if($this->Users_model->login() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email o Contraseña incorrecto.</div>');	
				redirect('/auth/login');
            }
            redirect(base_url());
        }
	}
	
	public function logout() 
	{
	    $this->session->sess_destroy();
	    redirect('auth/login');
	}
}
