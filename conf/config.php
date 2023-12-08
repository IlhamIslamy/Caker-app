<?php
$koneksi = mysqli_connect('localhost','root','','caker');
// // cek koneksi
// if (!$koneksi) {
//     die("koneksi gagal :". mysqli_connect_error());
// }
// $host = '103.247.11.134';
// $user = 'tifz1761_root';
// $password = 'tifnganjuk321';
// $database = 'tifz1761_caker';

// $koneksi = mysqli_connect($host, $user, $password, $database);
// cek koneksi
if (!$koneksi) {
    die("koneksi gagal :". mysqli_connect_error());
}   
?>