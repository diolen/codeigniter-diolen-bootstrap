<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Listado de usuarios';
    }

	public function index()
	{
	    $this->data['users'] = $this->Users_model->get_users();
		$this->load->view('users', $this->data);
	}
	
	public function add()
	{
	    $this->data['page_title'] = 'Agregar usuario nuevo';
	    $this->data['action'] = 'add';
	    $this->data['readonly'] = '';
	    $this->data['hidden'] = ['action' => $this->data['action']];
	    
        $this->form_validation->set_rules('user_name', 'Nombre', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('user_lastname', 'Apellido', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('user_pass', 'Contraseña', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('user_confirmpass', 'Confirmar', 'trim|required|matches[user_pass]');            

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user_form', $this->data);
        } else {
            $this->Users_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ha guardado los datos correctamente.</div>');
            redirect('users');
        }
	}
	
	public function edit()
	{
	    $id = $this->uri->segment('3');
	    $this->data['user'] = $this->Users_model->get_users($id);
	    
	    $this->data['page_title'] = 'Modificar datos de usuario';
	    $this->data['action'] = 'edit';
	    $this->data['readonly'] = 'readonly';
	    $this->data['hidden'] = ['action' => $this->data['action'], 'id' => $id];
	    
        $this->form_validation->set_rules('user_name', 'Nombre', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('user_lastname', 'Apellido', 'trim|required|min_length[3]|max_length[30]');

        if($this->input->post('user_pass') != "") {
            $this->form_validation->set_rules('user_pass', 'Contraseña', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('user_confirmpass', 'Confirmar', 'trim|required|matches[user_pass]');            
        }
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user_form', $this->data);
        } else {
            $this->Users_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ha guardado los datos correctamente.</div>');
            redirect('users');
        }
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    $this->Users_model->delete($id);
	    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">El usuario ha sido eliminado correctamente.</div>');
	    redirect('users');
	}
}
