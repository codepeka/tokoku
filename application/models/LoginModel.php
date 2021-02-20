<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LoginModel extends CI_Model {
 
	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	}

    public function signIn($username, $password)
    {
        $query = $this->db->get_where("user", array('username' => $username, 'password' => md5($password)));
 
        return $query;
    }	
}