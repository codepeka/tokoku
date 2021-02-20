<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class SettingModel extends CI_Model {
 
	public function __construct() {
	    parent::__construct();
	}

    public function getOne()
    {
        $this->db->select('id_setting, nama_toko, tgl_ubah');
		$this->db->from('setting');
		$this->db->limit(1);
        // $this->db->where('id_setting', 0);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert('setting', $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update('setting', $data, $where);
        return $this->db->affected_rows();
    }
}