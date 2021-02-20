<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class History extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HistoryModel','hm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "History";
        $this->load->view('template/header', $data);
        $this->load->view('history');
        $this->load->view('template/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->hm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $r->tanggal;
            $row[] = $r->nama;
            $row[] = $r->username;
            $row[] = $r->tipe;
            $row[] = $r->description;
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->hm->count_all(),
                        "recordsFiltered" => $this->hm->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}