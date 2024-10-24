<?php
require 'functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nip = $_POST['nip'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  if ($new_password === $confirm_password) {
    updatePassword($nip, $new_password);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Forget Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="App/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="App/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="App/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="App/index.php" class="h1"><b>X</b>Market</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Ganti Password</p>
        <form action="forget_password.php" method="post">
          <div class="input-group mb-3">
            <input type="nip" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <ion-icon name="finger-print"></ion-icon>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <ion-icon name="lock-closed"></ion-icon>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <ion-icon name="lock-closed"></ion-icon>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="zubmit" class="btn btn-primary btn-block"> Confirm </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="login.php"> Login </a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="App/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="App/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="App/dist/js/adminlte.min.js"></script>
  <!-- icon -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>