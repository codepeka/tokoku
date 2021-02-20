<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LaporanMasuk extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanMasukModel','lmm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Laporan Barang Masuk";
        $this->load->view('template/header', $data);
        $this->load->view('laporanMasuk');
        $this->load->view('template/footer');
    }

    public function ajax_detail($id)
    {
        $data = $this->lmm->ajax_detail_id($id);
        echo json_encode($data);
    }
    
    public function cetak($id) {
        $data['title'] = "Laporan Barang Masuk";
        $data['date'] = $id;
        $data['dataID'] = $this->lmm->ajax_detail_id($id);
        $this->load->view('cetak/CetakLaporanMasuk', $data);
    }
}