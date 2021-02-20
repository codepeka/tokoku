<!-- <script src="<?= base_url('assets/action/user.js'); ?>"></script> -->

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <div class="section-body">
	<!-- Invoice Terbaru -->
	<div class="row">
	  <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>Invoices Terbaru</h4>
            <div class="card-header-action">
              <a href="LaporanKeluar" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <tr>
                  <th>Invoice ID</th>
                  <th>Customer</th>
                  <th>Status</th>
                  <th>Due Date</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td><a href="#">INV-87239</a></td>
                  <td class="font-weight-600">Kusnadi</td>
                  <td><div class="badge badge-warning">Unpaid</div></td>
                  <td>July 19, 2018</td>
                  <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">INV-48574</a></td>
                  <td class="font-weight-600">Hasan Basri</td>
                  <td><div class="badge badge-success">Paid</div></td>
                  <td>July 21, 2018</td>
                  <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">INV-76824</a></td>
                  <td class="font-weight-600">Muhamad Nuruzzaki</td>
                  <td><div class="badge badge-warning">Unpaid</div></td>
                  <td>July 22, 2018</td>
                  <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">INV-84990</a></td>
                  <td class="font-weight-600">Agung Ardiansyah</td>
                  <td><div class="badge badge-warning">Unpaid</div></td>
                  <td>July 22, 2018</td>
                  <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">INV-87320</a></td>
                  <td class="font-weight-600">Ardian Rahardiansyah</td>
                  <td><div class="badge badge-success">Paid</div></td>
                  <td>July 28, 2018</td>
                  <td>
                    <a href="#" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
	</div>
	<!-- penutup Invoice Terbaru -->
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


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
