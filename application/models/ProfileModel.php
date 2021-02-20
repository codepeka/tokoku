<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ProfileModel extends CI_Model {
	var $table = 'user';

	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	}

	public function profile() {
		$this->db->select("nama, username");
		$query = $this->db->get_where($this->table,  array('id_user' => $this->session->userdata("idUser")));
		return $query->row();
	}

	public function update($where, $data) {
		$this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
	}

	public function verifyPass($pass) {
		$this->db->select("password");
		$query = $this->db->get_where($this->table,  array('id_user' => $this->session->userdata("idUser"), 'password' => $pass));
		return $query->num_rows();

	}
}