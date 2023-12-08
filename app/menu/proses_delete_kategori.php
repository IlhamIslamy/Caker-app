<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Mendapatkan ID kategori yang akan dihapus
    $id_kategori = $_GET['id_kategori'];

    // Lindungi dari SQL Injection
    $id_kategori = mysqli_real_escape_string($koneksi, $id_kategori);

    // Hapus kategori dari database
    $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil dihapus, arahkan kembali ke halaman kategori
        header("Location: ../index.php?page=kategori");
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

?>
