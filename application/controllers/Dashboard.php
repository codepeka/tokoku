<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('DashboardModel','dm');
         if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('template/header', $data);
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
}