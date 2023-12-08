<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <!-- ... (Your existing code) ... -->
<!-- Informasi Akun -->
<li class="nav-item dropdown">
  <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="fas fa-user"></i>
    <?php echo $_SESSION['username']; ?>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <div class="user-info">
      <span class="username">
        <?php echo $_SESSION['username']; ?>
      </span>
      <span class="description"> | </span>
      <span class="user-level">
        <?php echo $_SESSION['level']; ?>
      </span>
    </div>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item">
      <i class="fas fa-envelope mr-2"></i>Email:
      <?php echo $_SESSION['email']; ?>
    </a>
    <a class="dropdown-item">
      <i class="fas fa-phone mr-2"></i>No. HP:
      <?php echo $_SESSION['no_hp']; ?>
    </a>
    <!-- Tambahkan link "Edit Profil" -->
    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editProfileModal">
      <i class="fas fa-edit mr-2"></i>Edit Profil
    </a>
    <!-- ... (Tambahkan informasi atau link lainnya sesuai kebutuhan) ... -->
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer" onclick="logout()">Keluar</a>
  </div>
</li>



  </ul>
</nav>