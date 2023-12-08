<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require '../vendor/autoload.php';
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil alamat email dari formulir
    $email = $_POST["email"];

    // Validasi apakah email ada dalam database
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email ditemukan dalam database, lanjutkan dengan pengiriman email reset password

        // TODO: Validasi alamat email dan kirim email reset password
        // Contoh validasi sederhana
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Email valid, kirim email reset password

            // Timestamp digunakan untuk menggantikan token
            $timestamp = strtotime("+1 hour"); // Misalnya, tautan berlaku selama 1 jam

            // Kirim email
            sendResetPasswordEmail($email, $timestamp);

            // Setelah pengiriman berhasil, redirect pengguna dengan pesan sukses
            header("Location: ../tunggu-reset-password.php");
            exit();
        } else {
            // Email tidak valid, redirect dengan pesan kesalahan
            header("Location: ../lupa-password.php?error=2");
            exit();
        }
    } else {
        // Email tidak ditemukan dalam database, redirect dengan pesan kesalahan
        header("Location: ../lupa-password.php?error=1");
        exit();
    }
} else {
    // Jika akses langsung ke skrip ini tanpa menggunakan metode POST, redirect ke halaman lupa password
    header("Location: ../lupa-password.php");
    exit();
}

function sendResetPasswordEmail($email, $timestamp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mohammad250503@gmail.com';
        $mail->Password   = 'tcpf fslv carw jzib'; // Ganti dengan kata sandi aplikasi Gmail Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('mohammad250503@gmail.com', 'CakerApp');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $resetLink = 'http://localhost/Caker-app/reset-password-form.php?email=' . urlencode($email) . '&timestamp=' . $timestamp;
        $mail->Body = 'Klik tautan berikut untuk mereset kata sandi: <a href="' . $resetLink . '">Reset Password</a>';
        $mail->SMTPDebug = 2; // Setel ke 0 pada produksi
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
