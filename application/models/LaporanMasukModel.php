<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LaporanMasukModel extends CI_Model {
 
	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	}

    public function ajax_detail_id($id)
    {
        $this->db->select('stock_barang.*, barang.id_barang, barang.nama_barang');
		$this->db->join('barang', 'barang.id_barang = stock_barang.id_barang', 'left');
		$this->db->from('stock_barang');
        $this->db->like('stock_barang.tgl_ubah', $id);
        $query = $this->db->get();
 
        return $query->result();
    }	
}