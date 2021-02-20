<script src="<?= base_url('assets/action/history.js'); ?>"></script>

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
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
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Tipe History</th>
                    <th width="230px">Deskripsi</th>
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
