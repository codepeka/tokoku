<script src="<?= base_url('assets/action/user.js'); ?>"></script>

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
              <i class="fas fa-plus"></i> Tambah Data Pengguna 
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Hak</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Ubah</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="showData">
                  <!-- <?php 
                    $no = 1;
                    foreach ($results as $res) { 
                  ?>
                  <tr>
                  	<td><?= $no++; ?></td>
                  	<td><?= $res->nama; ?></td>
                  	<td><?= $res->username; ?></td>
                  	<td><?= $res->hak; ?></td>
                  	<td><?= $res->tgl_buat; ?></td>
                  	<td><?= $res->tgl_ubah; ?></td>              	
                    <td class="text-center" width="200px">
                      <a href="#" class="btn btn-success my-2"><i class="fas fa-eye"></i></a>
                      <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                      <a href="#" class="btn btn-danger my-2"><i class="fas fa-trash"></i></a>
                  	</td>
                  </tr>
              	  <?php } ?> -->
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
        <h5 class="modal-title" id="titleModal">Tambah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" novalidate="" id="myForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Your Name</label>
            <input type="hidden" name="idne" id="idne">
            <input type="text" class="form-control" name="nama" id="nama" required="" minlength="8">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Username minimal 8 kata</div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" required="" minlength="6">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Username minimal 6 kata</div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required="" minlength="6">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Password minimal 6 kata </div>
            <!-- End Validation -->
          </div>
          <div class="form-group mb-0">
            <label for="hak">Hak</label>
            <select class="form-control" name="hak" id="hak" required="">
              <option value=""> ~~~ PILIH HAK AKSESNYA DONG ~~~ </option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="karyawan">Karyawan</option>
            </select>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Wajib Diisi! </div>
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
