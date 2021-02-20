<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel','user');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        }  elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Data Pengguna";
        $this->load->view('template/header', $data);
        $this->load->view('user');
        $this->load->view('template/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $user->nama;
            $row[] = $user->username;
            $row[] = $user->hak;
            $row[] = $user->tgl_buat;
            $row[] = $user->tgl_ubah;
 
            //add html for action
            $row[] = '
                <div align="center">
                    <a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$user->id_user."'".')"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$user->id_user."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user->count_all(),
                        "recordsFiltered" => $this->user->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->user->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'hak' => $this->input->post('hak'),
                'tgl_buat' => date('Y-m-d H:i:s')
            );
        $insert = $this->user->save($data);
        helper_log("add", "Tambah Data User / Pengguna");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'hak' => $this->input->post('hak'),
            );
        $this->user->update(array('id_user' => $this->input->post('idne')), $data);
        helper_log("update", "Ubah Data User / Pengguna");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->user->delete_by_id($id);
        helper_log("delete", "Hapus Data User / Pengguna");
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        // $data['error_string'] = array();
        // $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if(strlen($this->input->post('nama')) < 8 
            || strlen($this->input->post('username')) < 6 
            || strlen($this->input->post('password')) < 6
            || $this->input->post('hak') == '')
        {
            // $data['inputerror'][] = 'nama_user';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}