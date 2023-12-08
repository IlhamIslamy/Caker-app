<?php session_start();
// login_process.php

// Sertakan file functions.php
include('function.php');

// Mulai sesi
track_sessions();

// Sertakan file config.php
include('config.php');

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];
$loginAs = $_POST['login_as'];

// Query untuk mendapatkan informasi pengguna berdasarkan username
$stmt = $koneksi->prepare("SELECT id_akun, username, password, level FROM akun WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result) {
    $user = $result->fetch_assoc();

    // Verifikasi kata sandi
    if (password_verify($password, $user['password'])) {
        // Simpan informasi pengguna dalam session
        set_session_value('username', $user['username']);
        set_session_value('level', $user['level']);
        set_session_value('id_akun', $user['id_akun']);

        // Ambil data tambahan dari database dengan prepared statement
        $additionalInfoQuery = $koneksi->prepare("SELECT email, no_hp FROM akun WHERE id_akun = ?");
        $additionalInfoQuery->bind_param("i", $_SESSION['id_akun']);
        $additionalInfoQuery->execute();
        $additionalInfoResult = $additionalInfoQuery->get_result();
        $additionalInfoQuery->close();

        if ($additionalInfoResult) {
            $additionalInfo = $additionalInfoResult->fetch_assoc();

            // Simpan informasi tambahan dalam session
            set_session_value('email', $additionalInfo['email']);
            set_session_value('no_hp', $additionalInfo['no_hp']);

            // Redirect sesuai level
            if (($loginAs == "admin" && $_SESSION['level'] == 'admin') || ($loginAs == "user" && $_SESSION['level'] == 'user')) {
                header('Location:../app');
                exit();
            } else {
                // Tampilkan JavaScript alert bahwa level tidak sesuai
                echo "<script>
                        alert('Akses Ditolak. Level Anda tidak sesuai!');
                        window.location.href = '../index.html';
                      </script>";
                exit();
            }
        } else {
            // Kesalahan eksekusi query untuk informasi tambahan
            die('Error fetching additional user info: ' . $koneksi->error);
        }
    } else {
        // Password tidak cocok, arahkan kembali ke halaman login
        header('Location:../UserLogin.php?error=1');
        exit();
    }
} else {
    // Kesalahan eksekusi query untuk data pengguna
    die('Error fetching user data: ' . $koneksi->error);
}
?>
