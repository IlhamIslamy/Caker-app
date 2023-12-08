<!-- lupa-password.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Lupa Password</title>

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
        <p class="login-box-msg">Lupa kata sandi? Masukkan alamat email Anda di bawah ini, dan kami akan mengirimkan instruksi untuk meresetnya.</p>
        <form action="conf/reset-password.php" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="col-4 mx-auto text-center">
            <button type="submit" class="btn btn-primary btn-block">kirim</button>
          </div>
        </form>
        <p class="mb-0">
          <a href="UserLogin.php" class="text-center">Kembali ke Login</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="app/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="app/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- notifikasi -->
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
        title: 'email tidak terdaftar'
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
        title: 'Silakan masukkan alamat email yang valid'
      })</script>";
    } else {
      echo '';
    }
  }
  ?>
</body>

</html>
