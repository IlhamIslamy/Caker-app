<?php
session_start();
include('config.php');
// $koneksi = mysqli_connect('localhost','root','tifnganjuk321','tifz1761_caker');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data nama kategori dari form
    $nama_kategori = $_POST['nama_kategori'];

    // Query untuk menambahkan kategori ke database
    $query = "INSERT INTO kategori (kategori) VALUES ('$nama_kategori')";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil ditambahkan, arahkan kembali ke halaman kategori
        header("Location: ../index.php?page=kategori");
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
