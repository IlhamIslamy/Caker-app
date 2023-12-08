<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.html" class="h1"><b>User</b>Caker</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login untuk memulai sesi Anda</p>
                <form action="conf/autentikasi.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name='username' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name='password' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Menambahkan input tersembunyi untuk menentukan level -->
                    <input type="hidden" name="login_as" value="user">
                    <div class="col-4 mx-auto text-center">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">

        <!-- login fb -->
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a> -->

        <!-- login google -->
        <!-- <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
          <a href="lupa-password.php">Lupa kata sandi?</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Daftar sebagai anggota baru</a>
        </p>
    </div>
                </form>
            </div>
        </div>
    </div>
</body>

  <!-- jQuery -->
  <script src="app/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="app/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- notif gagal login -->
<?php
if (isset($_GET['error'])) {
  $x = ($_GET['error']);
  if ($x == 1) {
    echo "<script> var Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'error',
    title: 'Login Gagal '
  })</script>";
  } else if ($x == 2) {
    echo "<script> var Toast = Swal.mixin({
    toast: true,
    position: 'center-top',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'warning',
    title: 'Silahkan masukkan Username dan Password '
  })</script>";
  } else {
    echo '';
  }
}
?>

</html>