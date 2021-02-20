<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Stock extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StockModel','stock');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        }  elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Data Barang Masuk";
        $this->load->view('template/header', $data);
        $this->load->view('stock');
        $this->load->view('template/footer');
    }
 	
    public function dataBarang() {
		$data = $this->stock->dataBarang();
        echo json_encode($data);
    }

    public function ajax_list()
    {
        $list = $this->stock->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $stock) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $stock->nama_barang;
            $row[] = $stock->jumlah;
            $row[] = 'Rp. ' . number_format($stock->harga_beli, 0,',' ,'.');
            $row[] = $stock->tgl_ubah;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$stock->id_stock."'".')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$stock->id_stock."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->stock->count_all(),
                        "recordsFiltered" => $this->stock->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->stock->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'id_barang' => $this->input->post('nmBrg'),
                'jumlah' => $this->input->post('jmlBrg'),
                'harga_beli' => implode(explode(".", $this->input->post('hrgBrg'))),
                'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $insert = $this->stock->save($data);
        helper_log("add", "Tambah Data Stock Barang / Barang Masuk");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'id_barang' => $this->input->post('nmBrg'),
                'jumlah' => $this->input->post('jmlBrg'),
                'harga_beli' => implode(explode(".", $this->input->post('hrgBrg'))),
                // 'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $this->stock->update(array('id_stock' => $this->input->post('idne')), $data);
        helper_log("update", "Ubah Data Stock Barang / Barang Masuk");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->stock->delete_by_id($id);
        helper_log("delete", "Hapus Data Stock Barang / Barang Masuk");
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        // $data['error_string'] = array();
        // $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nmBrg') == '' || $this->input->post('jmlBrg') == '' || $this->input->post('hrgBrg') == '')
        {
            // $data['inputerror'][] = 'nama_stock';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}