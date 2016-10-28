<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model 
{
    private $table_name = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_users($id = null)
    {
        if(!is_null($id)) {
            $this->db->where('id', $id);
            $query = $this->db->get($this->table_name);
            return $query->row();            
        } else {
            $query = $this->db->get($this->table_name);
            return $query->result();            
        }
    }

    public function save()
    {
        $CI = & get_instance();
        $data = [
            'user_name' => $CI->input->post('user_name'),
            'user_lastname' => $CI->input->post('user_lastname')
        ];
        
        if($CI->input->post('action') == 'add') {
            
            $data['user_email'] = $CI->input->post('user_email');
            $data['user_pass'] = md5($CI->input->post('user_pass'));
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert($this->table_name, $data);
            
        } elseif($CI->input->post('action') == 'edit') {
            
            if($CI->input->post('user_pass') != "") {
                $data['user_pass'] = md5($CI->input->post('user_pass'));
            }
            
            $data['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id', $CI->input->post('id'));
            $this->db->update($this->table_name, $data);
            
        }
    }
    
	public function delete($id)
	{
	    $this->db->where('id', $id);
	    $this->db->delete($this->table_name);
	}
	
	public function login()
	{
	    $CI = & get_instance();
	    
	    $email = $CI->input->post('user_email');
	    $pass = md5($CI->input->post('user_pass'));
	    
	    $this->db->where('user_email', $email);
	    $this->db->where('user_pass', $pass);
	    $query = $this->db->get($this->table_name);

	    if($query->num_rows() > 0) {
	        $user = $query->row();
	        
	        $this->session->set_userdata('user_email', $user->user_email);
	        $this->session->set_userdata('user_name', $user->user_name);
	        $this->session->set_userdata('user_lastname', $user->user_lastname);
	        $this->session->set_userdata('is_logged', 'logged_in');

	        return TRUE;
	    }
	    
	    return FALSE;
	}
	
}