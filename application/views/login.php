<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> | LAPESEN</title>
    <link rel="icon" href="<?php base_url(); ?>assets/img/avatar/icone.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php base_url(); ?>assets/bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/components.css">

  <!-- General JS Scripts -->
  <script src="<?php base_url(); ?>assets/bootstrap-4/js/jquery-3.3.1.min.js"></script>
  <!-- <script src="assets/bootstrap-4/js/popper.min.js"></script> -->
  <script src="<?php base_url(); ?>assets/bootstrap-4/js/bootstrap.min.js"></script>
  <script src="<?php base_url(); ?>assets/bootstrap-4/js/jquery.nicescroll.min.js"></script>
  <script src="<?php base_url(); ?>assets/bootstrap-4/js/moment.min.js"></script>
  <script src="<?php base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?php base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php base_url(); ?>assets/js/custom.js"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch mt-0">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <p class="text-center mb-1 mt-4"><img src="<?php base_url(); ?>assets/img/avatar/icone.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2"></p>
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">"LaPesen"</span></h4>
            <p class="text-muted">Halaman Login LaPesen</p>

            <form method="POST" action="Login/signIn" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="username">Username : </label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukkan Username anda!
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Masukkan Password anda!
                </div>
              </div>

              <div class="form-group text-right">
                <a href="index.php" class="float-left mt-3">
                  <!-- <i class="fa fa-arrow-left"></i> Kembali -->
                </a>
                <button type="submit" name="loginDataPeserta" class="btn btn-primary btn-lg btn-icon" tabindex="4">
                  <i class="icon-left fa fa-sign-in-alt"></i> Login
                </button>
              </div>

               <!-- <div class="mt-5 text-center">
                Belum punya akun? <a href="daftarSiswa.php">Daftar</a>
              </div> -->
            </form>

            <div class="text-center mt-5 text-small">
              Developer : <a href="//linkedin.com/in/bejosuseno" target="blank">Code Peka</a> 
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php base_url(); ?>assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>
