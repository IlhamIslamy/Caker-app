<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data formulir
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $no_hp = $_POST["no_hp"];

  // Validasi nomor handphone
  if (!is_numeric($no_hp) || strlen($no_hp) < 10 || strlen($no_hp) > 15) {
    // Nomor handphone tidak memenuhi syarat, tampilkan notifikasi popup
    echo "<script>alert('Nomor handphone harus berupa angka dan memiliki panjang antara 10 hingga 15 karakter.'); window.location.href='../register.php';</script>";
    exit();
  }

  // Validasi password
  if (strlen($password) < 8 || strlen($password) > 20 || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/\W/", $password)) {
    // Password tidak memenuhi syarat, tampilkan notifikasi popup
    echo "<script>alert('Password harus terdiri dari 8-20 karakter, memiliki huruf kecil, huruf besar, angka, dan karakter unik.'); window.location.href='../register.php';</script>";
    exit();
  }

  // Hash password (gunakan algoritma hashing yang aman)
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  // Atur level menjadi "user"
  $level = "user";

  try {
    // Masukkan data pengguna ke tabel 'akun'
    $stmt = $koneksi->prepare("INSERT INTO akun (username, password, email, no_hp, level) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $username, $hashed_password, $email, $no_hp, $level);
    $stmt->execute();

    // Alihkan ke halaman login setelah registrasi berhasil
    header("Location: ../UserLogin.php");
    exit();
  } catch (Exception $e) {
    // Tangani kesalahan jika registrasi gagal
    echo "<script>alert('Registrasi gagal: " . $e->getMessage() . "'); window.location.href='../register.php';</script>";
  }

  // Tutup statement
  $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
