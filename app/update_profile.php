<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'caker');
// $koneksi = mysqli_connect('localhost','root','tifnganjuk321','tifz1761_caker');

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap data yang dikirim dari formulir
$newEmail = mysqli_real_escape_string($koneksi, $_POST['newEmail']);
$newUsername = mysqli_real_escape_string($koneksi, $_POST['newUsername']);
$newPhoneNumber = mysqli_real_escape_string($koneksi, $_POST['newPhoneNumber']);

// Validasi data tidak boleh kosong
if (empty($newEmail) || empty($newUsername) || empty($newPhoneNumber)) {
    // Notifikasi gagal dan kembali ke halaman sebelumnya
    $_SESSION['notification'] = 'Semua kolom harus diisi';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

// Update informasi profil di tabel tb_akun
$username = $_SESSION['username'];
$sql = "UPDATE akun SET email='$newEmail', username='$newUsername', no_hp='$newPhoneNumber' WHERE username='$username'";

if (mysqli_query($koneksi, $sql)) {
    // Jika pembaruan berhasil, perbarui juga informasi sesi
    $_SESSION['email'] = $newEmail;
    $_SESSION['username'] = $newUsername;
    $_SESSION['no_hp'] = $newPhoneNumber;
    
    // Notifikasi berhasil dan kembali ke halaman sebelumnya
    $_SESSION['notification'] = 'Profil berhasil diperbarui';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // Notifikasi gagal dan kembali ke halaman sebelumnya
    $_SESSION['notification'] = 'Gagal memperbarui profil';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

?>
