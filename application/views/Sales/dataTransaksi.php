<link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/css/dataTables.bootstrap4.min.css">
<script src="<?= base_url(); ?>assets/dataTables/js/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/action/dataTransaksi.js'); ?>"></script>

<section class="section">
  <!-- Tabel Data Keseluruhan -->
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h4>Basic DataTables</h4> -->
            <div class="col"><h4>Data Keseluruhan</h4></div>
            <div class="col">
	          <button class="btn btn-icon icon-left btn-info ml-2 text-right keKanan mr-3" onclick="reload_table_satu()">
	            <i class="fas fa-sync"></i> Refresh
	          </button>
            </div> 
          </div>
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive">
              <table class="table table-striped" id="myTableSatu">
                <thead>
                  <tr>
                    <th class="text-center no"> # </th>
                    <th>Nota</th>
                    <th>SubTotal Harga</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                    <th>Tanggal Buat</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            <!-- penutup tabelnya -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Tabel Data Keseluruhan -->
</section>

<!-- Modalnya -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Detail Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showDataModal">
      	
      </div> <!-- end Modal -->
      <!-- <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
      </div> -->
    </div>
  </div>
</div>
<!-- penutup ModalNya -->

<style type="text/css">
  .jumbotron {
  	padding: 2rem 2rem;
  }
  .invHead {
  	color: #6777ef;
  	font-weight: bold;
  }
  .keKanan {
  	float: right;
  }
  .table .no {
  	width: 20px;
  }
  .table {
  	border-radius: 5px; 
  	background-color: white; 
  	margin-bottom: 0;
  }
</style>