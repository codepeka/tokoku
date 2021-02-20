<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Barang extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel','barang');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Data Barang";
        $this->load->view('template/header', $data);
        $this->load->view('barang');
        $this->load->view('template/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';;
            $row[] = $barang->foto;
            $row[] = $barang->nama_barang;
            $row[] = $barang->jumlah_stock;
            $row[] = 'Rp. ' . number_format($barang->harga_jual, 0,',' ,'.');
            $row[] = $barang->tgl_ubah;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$barang->id_barang."'".')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$barang->id_barang."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->barang->count_all(),
                        "recordsFiltered" => $this->barang->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->barang->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'nama_barang' => $this->input->post('nmBrg'),
                'harga_jual' => implode(explode(".", $this->input->post('hrgJual'))),
                'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $insert = $this->barang->save($data);
        helper_log("add", "Tambah Data Barang");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nama_barang' => $this->input->post('nmBrg'),
                'harga_jual' => implode(explode(".", $this->input->post('hrgJual'))),
                // 'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $this->barang->update(array('id_barang' => $this->input->post('idne')), $data);
        helper_log("update", "Ubah Data Barang");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->barang->delete_by_id($id);
        helper_log("delete", "Hapus Data Barang");
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nmBrg') == '' ||  $this->input->post('hrgJual') == '')
        {
            $data['inputerror'][] = 'nama_barang';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}