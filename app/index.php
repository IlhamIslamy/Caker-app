<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php
if (!$_SESSION['username']) {
  header('location: ../index.php?session=expired');
}
include('header.php'); ?>
<?php include('../conf/config.php'); ?>
<!-- /head -->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include('preloader.php'); ?>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('logo.php'); ?>

      <!-- Sidebar -->
      <?php include('sidebar.php'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include('content_head.php'); ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'dashboard-admin') {
          include('../app/menu/dashboard-admin.php');
        } else if ($_GET['page'] == 'dashboard-user') {
          include('../app/menu/dashboard-user.php');
        } else if ($_GET['page'] == 'postadmin') {
          include('../app/menu/post_admin.php');
        } else if ($_GET['page'] == 'kategori') {
          include('../app/menu/kategori_admin.php');
        } else if ($_GET['page'] == 'user') {
          include('../app/menu/usr_admin.php');
        } else if ($_GET['page'] == 'post_user') {
          include('post_user.php');
        } else if ($_GET['page'] == 'userkategori') {
          include('kategori_user.php');
        } else {
          include('eror.php');
        }
      } else {
        // Pemeriksaan peran pengguna
        if ($_SESSION['level'] == 'admin') {
          include('../app/menu/dashboard-admin.php'); // Ubah ini sesuai dengan file dashboard admin
        } else {
          include('../app/menu/dashboard-user.php'); // Ubah ini sesuai dengan file dashboard user
        }
      }

      ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- js jadi satu sama footer -->
  <?php include('footer.php'); ?>
</body>

</html>
<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Formulir untuk mengedit profil -->
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="profileEditForm" method="post" action="update_profile.php">
          <!-- Kolom input untuk mengedit email -->
          <div class="form-group">
            <label for="newEmail">Email Baru:</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail"
              value="<?php echo $_SESSION['email']; ?>" required>
          </div>
          <!-- Kolom input untuk mengedit username -->
          <div class="form-group">
            <label for="newUsername">Username Baru:</label>
            <input type="text" class="form-control" id="newUsername" name="newUsername"
              value="<?php echo $_SESSION['username']; ?>" required>
          </div>
          <!-- Kolom input untuk mengedit nomor telepon -->
          <div class="form-group">
            <label for="newPhoneNumber">Nomor Telepon Baru:</label>
            <input type="text" class="form-control" id="newPhoneNumber" name="newPhoneNumber"
              value="<?php echo $_SESSION['no_hp']; ?>" required>
          </div>
          <!-- Tombol untuk menyimpan perubahan -->
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>