<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Setting extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SettingModel','sm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        }  elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $data['title'] = "Setting";
        $this->load->view('template/header', $data);
        $this->load->view('setting');
        $this->load->view('template/footer');
    }

    public function showData() {
    	$data = $this->sm->getOne();
    	echo json_encode($data);
    }

    public function save() {
    	if (!isset($_POST['namaToko'])) { 
            redirect('setting'); 
            echo "string";
        } else {
        	$data_id = json_decode(json_encode($this->sm->getOne()), true);

        	if (strlen($data_id['id_setting']) > 0) {
        		$dataId = $data_id['id_setting'];
        		$data = array('nama_toko' => $this->input->post('namaToko'), );
    	        $query = $this->sm->update(array('id_setting' => $dataId), $data);
                helper_log("update", "Ubah Nama Toko");
    	        echo json_encode($query);
        	} else {
        		$data = array('nama_toko' => $this->input->post('namaToko'),);
    	        $query = $this->sm->save($data);
                helper_log("update", "Ubah Nama Toko");
    	        echo json_encode($query);
        	}
        }
    }
}