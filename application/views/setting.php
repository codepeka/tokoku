<script src="<?= base_url('assets/action/setting.js'); ?>"></script>

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <!-- Data Setting -->
  <div class="section-body">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <form class="needs-validation" novalidate="" id="myForm">
	        <div class="card-header">
			  <h4>Setting Toko Anda</h4>
			</div>
			<div class="card-body">
			  <div class="form-group mb-0 pb-0">
			    <label for="namaToko">Nama Toko : </label>
			    <input type="text" id="namaToko" name="namaToko" class="form-control" maxlength="35" required>
			    <small id="tglUbah" class="form-text text-muted">
			      Terakhir diubah pada tanggal : <code>2020-11-04 19:32:56</code>.
			    </small>
			  </div>
			</div>
			<div class="card-footer text-center">
			  <button id="btnSave" class="btn btn-primary mr-2" onclick="save()">Simpan</button>
			</div>
		  </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Data Setting -->
</section>