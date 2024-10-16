<?php
require 'functions.php';
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}


if (isset($_POST['login'])) {

    $koneksi = koneksi();

    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE nip = '$nip'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            header("Location:index.php");
            exit();
        }
    }

    $error = true;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

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
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1> <b>Login </b>Admin </h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Log in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </div>
                        </div>
                    </div>

                    <!-- error pass or username -->
                    <?php
                    if (isset($error)) : ?>
                        <p style="color: red; font-style: italic;">NIP / Password Salah</p>
                    <?php endif; ?>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1 mt-2">
                    <a href="forget_password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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