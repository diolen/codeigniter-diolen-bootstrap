<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    public $controller;
    public $action;
    public $data = array();
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->data['errors'] = array();
        $this->controller = $this->uri->segment(1);
        $this->action = $this->uri->segment(2);
        
        $this->is_logged();
    }
    
    public function is_logged()
    {
        $before_login = [
            'login',
            'add'
        ];

        $after_login = [
            'login'
        ];

        if(!in_array($this->action, $before_login) && $this->session->userdata('is_logged') != 'logged_in') {
            redirect('/auth/login');
        }
        
        if(in_array($this->action, $after_login) && $this->session->userdata('is_logged') == 'logged_in') {
            redirect(base_url());
        }
    }
}