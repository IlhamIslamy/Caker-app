<?php
session_start();
include('config.php');

$pesan = "masukkan foto"; // Tambahkan variabel pesan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $judul_post = $_POST['judul_post'];
    $kategori = $_POST['kategori'];
    $deskripsi_post = $_POST['deskripsi_post'];
    $link_lamar = $_POST['link_lamar'];
    $id_akun = $_SESSION['id_akun'];

    // Proses unggah gambar
    $targetDir = "uploads/";

    if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
        $foto = $targetDir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

        // Cek apakah file gambar atau bukan
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check === false) {
            $pesan = "File bukan gambar.";
            $uploadOk = 0;
        }

        // Batasi jenis file yang diizinkan
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $pesan = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }
    } else {
        $pesan = "Maaf, data harus di isi semua";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk memiliki nilai 0 oleh suatu kesalahan
    if ($uploadOk == 0) {
        echo "<script>alert('$pesan');</script>";
        // Tetap arahkan ke halaman post_user dengan menggunakan JavaScript
        echo "<script>window.location.href='../index.php?page=post_user';</script>";
    } else {
        // Jika semuanya berjalan lancar, coba unggah file
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $foto)) {
            // File berhasil diunggah, lakukan penyisipan data ke database
            $query = "INSERT INTO detail_post (id_akun, nama, judul_post, id_kategori, deskripsi_post, link_lamar, foto) 
                      VALUES ('$id_akun','$nama', '$judul_post', '$kategori', '$deskripsi_post', '$link_lamar', '$foto')";

            if (mysqli_query($koneksi, $query)) {
                header("Location: ../index.php?page=post_user");
            } else {
                $pesan = "Error: " . $query . "<br>" . mysqli_error($koneksi);
                echo "<script>alert('$pesan');</script>";
                // Tetap arahkan ke halaman post_user dengan menggunakan JavaScript
                echo "<script>window.location.href='../index.php?page=post_user';</script>";
            }
        } else {
            $pesan = "Maaf, ada kesalahan saat mengunggah file Anda.";
            echo "<script>alert('$pesan');</script>";
            // Tetap arahkan ke halaman post_user dengan menggunakan JavaScript
            echo "<script>window.location.href='../index.php?page=post_user';</script>";
        }
    }
}
?>
