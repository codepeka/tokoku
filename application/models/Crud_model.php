<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function createData() {
        $data = array (
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->insert('user', $data);
    }

    function getAllData() {
        $query = $this->db->query('SELECT * FROM user');
        return $query->result();
    }

    function getData($id) {
        $query = $this->db->query('SELECT * FROM user WHERE `id` =' .$id);
        return $query->row();
    }

    function updateData($id) {
        $data = array (
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    function loh() {
        return 1;
    }
}