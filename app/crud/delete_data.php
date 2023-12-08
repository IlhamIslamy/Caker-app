<?php

include('config.php');


if (isset($_POST['id_post']) && is_numeric($_POST['id_post'])) {
    $id = $_POST['id_post'];

    $delete_query = mysqli_query($koneksi, "DELETE FROM detail_post WHERE id_post = $id");

    if ($delete_query) {
        echo "Post berhasil dihapus!";
    } else {
        echo "Hapus gagal: " . mysqli_error($koneksi);
    }
} else {
    echo "ID post tidak valid.";
}
if (isset($_POST['id_akun']) && is_numeric($_POST['id_akun'])) {
    $id = $_POST['id_akun'];

    $delete_query = mysqli_query($koneksi, "DELETE FROM akun WHERE id_akun = $id");

    if ($delete_query) {
        echo "Post berhasil dihapus!";
    } else {
        echo "Hapus gagal: " . mysqli_error($koneksi);
    }
} else {
    echo "ID post tidak valid.";
}
?>
