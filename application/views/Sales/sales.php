<!-- css -->
<script src="<?= base_url(); ?>assets/action/sales.js"></script>

<!-- Contentnya -->
<div class="row">
  <!-- Menu Nya Cuy -->
  <div class="col-lg-8 col-md-12 col-12 col-sm-12" style="min-height: 84vh;">
    <div class="card" style="height: calc(100% - (10px + 10px));">
      <div class="card-header">
        <h4>Daftar Menu</h4>
        <div class="card-header-action" style="display: flex;">
          <input type="text" name="" class="form-control" placeholder="Cari menu" onkeyup="search(this.value)">
          <button type="button" class="btn btn-primary btn-icon icon-left ml-2" style="display: flex; align-items: center;">
            <i class="fas fa-shopping-cart"></i><span class="badge badge-transparent" id="totalPD">0</span>
          </button>
        </div>
      </div>
      <div class="card-body">
        <!-- Daftar Menu -->
        <div class="row gutters-sm" id="dataProducts">
          <!-- Isi Produk -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Menu Nya Cuy -->

  <!-- Order Menu -->
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Order Menu</h4>
        <div class="card-header-action" style="display: flex;">
          <span class="badge badge-transparent" style="background: #6777ef; color: #fff">NOTA-<?= $this->session->userdata('id_pemesanan') ?></span>
        </div>
      </div>
      <div class="card-body shopping-cart" style="padding-bottom: 0">
        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder" id="dataOrderMenu">
          <!-- Isi Order Menu -->
        </ul>
      </div>
      <div class="card-footer bg-whitesmoke">
        <h6>Sub Harga : <span class="float-right">Rp. <span id="totalHarganya">0</span></span></h6>
        <div class="d-flex align-items-center">
          <h6 class="mt-auto">Diskon (Rp.) : </h6> 
          <div class="float-right diskon mt-2">
            <input type="text" name="diskon" id="diskon" class="form-control p-1 w-100 h-25 d-inline-block uang" style="text-align:end;" min="0" value="0">
          </div>
        </div>
        <div class="alert alert-light mt-3 p-2">
          <h6 class="mb-0">Total Harga : <span class="float-right" style="color: red">Rp. <span id="tothar">0</span></span></h6>
        </div>
        <button type="button" class="btn btn-primary w-100 mt-2" onclick="bayar()">
          <i class="fa fa-money-bill-wave"></i> Bayar 
        </button>
      </div>
    </div>
  </div>
  <!-- End Order Menu -->
</div>

<style type="text/css">
  .shopping-cart { overflow-x: auto; max-height: 45vh;}
  .action-group {height: 40px;color: #6777ef;}
  .media-body {overflow: hidden; white-space: nowrap;}
  .media-title {text-overflow: ellipsis;}
  .diskon { margin-right: 0; margin-left: auto; }
</style>