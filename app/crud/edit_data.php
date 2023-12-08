<?php
session_start();
// $koneksi = mysqli_connect('localhost', 'root', '', 'caker');
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_post = $_POST['id_post'];
    $nama = $_POST['edit-nama'];
    $judul_post = $_POST['edit-judul_post'];
    $kategori = $_POST['edit-kategori'];
    $deskripsi_post = $_POST['edit-deskripsi_post'];
    $link_lamar = $_POST['edit-link_lamar'];

    // Inisialisasi variabel $uploadOk
    $uploadOk = 1;

    // Periksa apakah ada perubahan pada file foto
    if ($_FILES["edit-foto"]["size"] > 0) {
        // Hapus foto lama sebelum menyisipkan data baru ke dalam database
        $queryFotoLama = "SELECT foto FROM detail_post WHERE id_post='$id_post'";
        $resultFotoLama = mysqli_query($koneksi, $queryFotoLama);

        if ($resultFotoLama) {
            $rowFotoLama = mysqli_fetch_assoc($resultFotoLama);
            $fotoLama = $rowFotoLama['foto'];

            // Hapus foto lama dari direktori
            if (file_exists($fotoLama)) {
                unlink($fotoLama);
            }
        } else {
            echo "Error: " . $queryFotoLama . "<br>" . mysqli_error($koneksi);
        }

        // Upload foto baru
        $targetDir = "uploads/";
        $foto = $targetDir . basename($_FILES["edit-foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

        // Cek apakah file gambar atau bukan
        $check = getimagesize($_FILES["edit-foto"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
            echo "<script>alert('File bukan gambar.');</script>";
        }

        // Batasi jenis file yang diizinkan
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.');</script>";
        }

        // Cek apakah $uploadOk memiliki nilai 0 oleh suatu kesalahan
        if ($uploadOk == 0) {
            echo "<script>alert('Maaf, file Anda tidak diunggah.'); window.history.back();</script>";
        } else {
            // Jika semuanya berjalan lancar, coba unggah file
            if (move_uploaded_file($_FILES["edit-foto"]["tmp_name"], $foto)) {
                // File berhasil diunggah, lakukan penyisipan data ke database dengan gambar baru
                $query = "UPDATE detail_post SET nama='$nama', judul_post='$judul_post', id_kategori='$kategori', 
                          deskripsi_post='$deskripsi_post', link_lamar='$link_lamar', foto='$foto' 
                          WHERE id_post='$id_post'";
            } else {
                echo "<script>alert('Maaf, ada kesalahan saat mengunggah file Anda.'); window.history.back();</script>";
            }
        }
    } else {
        // Jika tidak ada perubahan pada foto, gunakan nama file lama
        $query = "UPDATE detail_post SET nama='$nama', judul_post='$judul_post', id_kategori='$kategori', 
                  deskripsi_post='$deskripsi_post', link_lamar='$link_lamar' WHERE id_post='$id_post'";
    }

    // Periksa apakah data yang diubah tidak boleh kosong
    if (empty($nama) || empty($judul_post) || empty($kategori) || empty($deskripsi_post) || empty($link_lamar)) {
        echo "<script>alert('Maaf, data yang diubah tidak boleh kosong.'); window.history.back();</script>";
    } else {
        // Eksekusi query update
        if (mysqli_query($koneksi, $query)) {
            header("Location: ../index.php?page=post_user");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}
?>
