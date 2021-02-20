<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LaporanKeluar extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanKeluarModel','lkm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        }  elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Laporan Barang Keluar / Penjualan";
        $this->load->view('template/header', $data);
        $this->load->view('laporanKeluar');
        $this->load->view('template/footer');
    }

    public function ajax_list()
    {
        $list = $this->lkm->get_datatables();
        $data = array();
        $no = $_POST['start'] + 1;
        foreach ($list as $r) {
            $row = array();
            $row[] = '<p class="text-center">' .$no++. '</p>';;
            $row[] = $r->nama;
            $row[] = 'Rp. ' . number_format($r->total_harga, 0,',' ,'.');
            $row[] = 'Rp. ' . number_format($r->diskon, 0,',' ,'.');
            $row[] = 'Rp. ' . number_format($r->hrgDiskon, 0,',' ,'.');
            $row[] = $r->tgl_ubah;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-primary" href="javascript:void(0)" title="Detail" onclick="detail('."'".$r->id_pemesanan."'".')"><i class="fas fa-eye"></i> Detail</a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->lkm->count_all(),
                        "recordsFiltered" => $this->lkm->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_detail($id)
    {
        $dataPI = $this->lkm->pemesanan_id($id);
        $dataDPI = $this->lkm->detail_pemesanan_id($id)->result();
        foreach ($dataPI as $row) {
        	echo '<section class="section">
	      		    <div class="section-body">
	        	      <h2 class="section-title">
                        No. Invoice : INV-'. $row->id_pemesanan .'
                        <span class="mt-1 keKanan text-right" style="font-size: 14px;color: #ff00c8;font-weight: bold;">
                          Status : '. (($row->status == 1) ? "Lunas" : "Proses") .'
                        </span>
                      </h2>
	        	      <p class="section-lead invHead">Kasir : '. $row->nama .' <span class="keKanan text-right">Tanggal : '. $row->tgl_ubah .'</span></p>
	        	    </div>
	        	  </section>
	        	  <div class="table-responsive" id="showTable">
				    <table class="table table-bordered" id="myTable">
				      <thead>
				        <tr>
				          <th class="text-center no"> # </th>
				          <th>Nama Barang</th>
				          <th>Jumlah</th>
				          <th>Harga</th>
				        </tr>
				      </thead>
				      <tbody>';
			$no = 1;
	        foreach ($dataDPI as $r) {
	        	echo '<tr>
						<td class="text-center">'. $no++ .'</td>
				        <td>'. $r->nama_barang .'</td>
				        <td>'. $r->jumlah_barang .'</td>
				        <td>Rp. '. number_format($r->harga_asli, 0,',' ,'.') .'</td>
				      </tr>';
	        }
	        echo '	  	<tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
				    	  <td class="text-right" colspan="3">SubTotal Harga : </td>
				    	  <td>Rp. '. number_format($row->total_harga, 0,',' ,'.') .'</td>
				    	</tr>
				    	<tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
				    	  <td class="text-right" colspan="3">Diskon : </td>
				    	  <td>Rp. '. number_format($row->diskon, 0,',' ,'.') .'</td>
				    	</tr>
				    	<tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
				    	  <td class="text-right" colspan="3">Total Harga : </td>
				    	  <td>Rp. '. number_format($row->hrgDiskon, 0,',' ,'.') .'</td>
				    	</tr>
				      </tbody>
				    </table>
				  </div> ';
        }
    }
 	
 	public function searchByDate($tgl_mulai, $tgl_akhir) {
 		// left join antara pemesanan dan user
 		$dataPuall = $this->lkm->puall($tgl_mulai, $tgl_akhir);
 		$no = 1; // untuk penomoran
        $totalHarga = 0;

 		foreach ($dataPuall as $row) {
 			// left join antara pemesanan detail dan pemesanan
        	$dataDPI = $this->lkm->detail_pemesanan_id($row->id_pemesanan);
 			$rowspan = $dataDPI->num_rows() + 1;
 			echo '<tr>
                    <td rowspan="'. $rowspan .'">'. $no++ .'</td>
                    <td rowspan="'. $rowspan .'">INV-'. $row->id_pemesanan .'</td>
                    <td rowspan="'. $rowspan .'">'. $row->nama.'</td>
                    <td rowspan="'. $rowspan .'">'. $row->tgl_ubah .'</td>
                  </tr>';
            foreach ($dataDPI->result() as $r) {
            	echo '<tr>
                  	    <td>'. $r->nama_barang .'</td>
                  	    <td>'. $r->jumlah_barang .'</td>
                  	    <td>Rp. '. number_format($r->harga_asli, 0,',' ,'.') .'</td>
                  	  </tr>';
                $totalHarga += $r->harga_asli;
            }
 		}
        echo '<tr style="border: 1px border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
		      	<td class="text-right" colspan="6">Total Harga : </td>
		      	<td>Rp. '. number_format($totalHarga, 0,',' ,'.') .'</td>
		      </tr>';
 	}

 	public function cetak($date_start, $date_finish) {
        $data['title'] = "Laporan Penjualan / Data Barang Keluar";
        $data['date_start'] = $date_start;
        $data['date_finish'] = $date_finish;
        $data['dataPuall'] = $this->lkm->puall($date_start, $date_finish);
        $this->load->view('cetak/CetakLaporanKeluar', $data);
    }
}