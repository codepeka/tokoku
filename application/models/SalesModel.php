<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class SalesModel extends CI_Model {
 
	public function __construct() {
	    parent::__construct();
	}

	public function cekNota() {
		$this->db->select('id_pemesanan');
		$this->db->order_by('id_pemesanan', 'ASC');
		$this->db->limit(1);

		$query = $this->db->get_where('pemesanan', array('status' => 0, 'id_user' => $this->session->userdata('idUser')));
		return $query;
	}

	public function cekOrderMenu($ip) {
        $sql = 'SELECT id_pemesanan FROM `pemesanan_detail` WHERE `id_pemesanan` = ' . $ip;
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

    public function savePemesananModel($data, $where) {
    	$this->db->update('pemesanan', $data, $where);
        return $this->db->affected_rows();
    }

	public function insertPemesanan() {
		$data = array('id_user' => $this->session->userdata('idUser'), 
					  'status' => 0, 
					  'tgl_buat' => date('Y-m-d H:i:s') );

		$this->db->insert('pemesanan', $data);
        return $this->db->insert_id();
	}

    public function getAll()
    {
        $this->db->select('id_barang, nama_barang, harga_jual');
		$this->db->from('barang');
		// $this->db->limit(1);
        // $this->db->where('id_setting', 0);
        $query = $this->db->get();
 
        return $query->result();
    }

    public function getWhere($name) {
    	$this->db->select('id_barang, nama_barang, harga_jual');
    	$this->db->from('barang');
    	$this->db->like('nama_barang', $name);
    	$query = $this->db->get();

    	return $query->result();
    }

    // Penambahan data ketika pertama mengeklik gambar 
    public function insert_pemesanan_detail($data) {
    	$this->db->insert('pemesanan_detail', $data);
        return $this->db->insert_id();
    }

    // Penghapusan data ketika mengeklik kedua kalinya pada gambar
    public function delete_pemesanan_detail($ib, $ip) {
    	$this->db->where(array('id_barang' => $ib, 'id_pemesanan' => $ip));
        $this->db->delete('pemesanan_detail');
    }

    public function update_jumlah_pemesanan_detail($data, $where) {
    	$this->db->update('pemesanan_detail', $data, $where);
        return $this->db->affected_rows();
    }

    public function getOrderMenu($idUser) {
    	$sql = 'SELECT `a`.`id_pemesanan_detail`, `a`.`id_pemesanan`, `b`.`id_barang`, `b`.`nama_barang`, `b`.`foto`, `b`.`harga_jual`, `b`.`jumlah_stock`, `a`.`harga_asli`, `a`.`jumlah_barang` FROM `pemesanan_detail` `a` LEFT JOIN `barang` `b` ON `a`.`id_barang` = `b`.`id_barang` LEFT JOIN `pemesanan` `c` ON `c`.`id_pemesanan` = `a`.`id_pemesanan` WHERE `c`.`id_user` = '. $idUser .' AND `c`.`id_pemesanan` = (SELECT id_pemesanan FROM `pemesanan` WHERE status = 0 ORDER BY id_pemesanan ASC LIMIT 1)';

        $query = $this->db->query($sql);
 
        return $query;
    }

    public function getHargaOrderMenu($idUser) {
    	$sql = 'SELECT `b`.`harga_jual`, `a`.`jumlah_barang` FROM `pemesanan_detail` `a` LEFT JOIN `barang` `b` ON `a`.`id_barang` = `b`.`id_barang` LEFT JOIN `pemesanan` `c` ON `c`.`id_pemesanan` = `a`.`id_pemesanan` WHERE `c`.`id_user` = '. $idUser .' AND `c`.`id_pemesanan` = (SELECT id_pemesanan FROM `pemesanan` WHERE status = 0 ORDER BY id_pemesanan ASC LIMIT 1)';

        $query = $this->db->query($sql);
 
        return $query->result();
    }

    public function dataBrg($ib) {
    	$sql = 'SELECT harga_jual FROM barang WHERE id_barang = ' . $ib;
        $query = $this->db->query($sql);

        return $query->row();
    }

    public function cekBarang($ib, $ip){
    	$this->db->select('id_pemesanan_detail');
		$this->db->from('pemesanan_detail');
        $this->db->where(array('id_pemesanan' => $ip, 'id_barang' => $ib));
        $query = $this->db->get();
 
        return $query->num_rows();
    }

    // public function save($data)
    // {
    //     $this->db->insert('setting', $data);
    //     return $this->db->insert_id();
    // }
 
    // public function update($where, $data)
    // {
    //     $this->db->update('setting', $data, $where);
    //     return $this->db->affected_rows();
    // }
}