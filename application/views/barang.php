<script src="<?= base_url('assets/js/jquery.maskMoney.min.js'); ?>"></script>
<script src="<?= base_url('assets/action/barang.js'); ?>"></script>


<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h4>Basic DataTables</h4> -->
            <button type="button" class="btn btn-primary daterange-btn icon-left btn-icon tambah" onclick="tambah()">
              <i class="fas fa-plus"></i> Tambah Data Barang 
            </button>
            <button class="btn btn-icon icon-left btn-info ml-2" onclick="reload_table()">
              <i class="fas fa-sync"></i> Refresh
            </button>
          </div>
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th class="text-center"> # </th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stock</th>
                    <th>Harga Jual</th>
                    <th>Tanggal Buat</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="showData">
                  
                </tbody>
              </table>
            <!-- penutup tabelnya -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modalnya -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" novalidate="" id="myForm" >
        <div class="modal-body">
          <div class="form-group">
            <label for="nmBrg">Nama Barang</label>
            <input type="hidden" name="idne" id="idne" value="1">
            <input type="text" class="form-control" name="nmBrg" id="nmBrg" required="">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Nama Barang Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="hrgJual">Harga Jual (Kg / Satuan)</label>
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Rp.</span>
              </div>
              <input type="text" class="form-control uang" name="hrgJual" id="hrgJual" required="">
            </div>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Harga Jual Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- penutup ModalNya -->

