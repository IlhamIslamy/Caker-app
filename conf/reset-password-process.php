<?php
// Fungsi untuk koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
function connectToDatabase()
{
    include('config.php'); // asumsikan config.php telah mendefinisikan $koneksi
}

// Fungsi validasi email
function validateEmail($email)
{
    connectToDatabase(); // Panggil fungsi connectToDatabase tanpa menetapkan nilai ke $koneksi

    // Implementasikan logika validasi email
    // Misalnya, periksa apakah email ada di tabel user
    global $koneksi; // Tambahkan global $koneksi untuk mengakses variabel $koneksi di luar fungsi
    $sql = "SELECT id_akun FROM akun WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id_akun'];
    } else {
        return false;
    }

    // Kode di bawah ini dihapus karena sudah ada exit di atasnya
    // $stmt->close();
    // $koneksi->close();
}

// Fungsi pembaruan kata sandi
function updatePassword($userId, $newPassword)
{
    connectToDatabase(); // Panggil fungsi connectToDatabase tanpa menetapkan nilai ke $koneksi

    // Implementasikan logika pembaruan kata sandi pengguna
    // Misalnya, perbarui kata sandi di tabel user
    global $koneksi; // Tambahkan global $koneksi untuk mengakses variabel $koneksi di luar fungsi
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE akun SET password = ? WHERE id_akun = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("si", $hashedPassword, $userId);
    $success = $stmt->execute();

    // Kode di bawah ini dihapus karena sudah ada exit di atasnya
    // $stmt->close();
    // $koneksi->close();

    return $success;
}

// Proses formulir reset kata sandi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $newPassword = htmlspecialchars($_POST['new_password']);
    $confirmPassword = htmlspecialchars($_POST['confirm_password']);

    if ($newPassword !== $confirmPassword) {
        echo "Kata Sandi dan Konfirmasi Kata Sandi tidak cocok.";
        exit;
    }

    $validEmail = validateEmail($email);

    if (!$validEmail) {
        echo "Email tidak valid atau tidak terdaftar.";
        exit;
    }

    $success = updatePassword($validEmail, $newPassword);

    if ($success) {
        echo "Kata sandi berhasil diperbarui!";
        // Anda dapat mengarahkan pengguna ke halaman login atau halaman lain yang sesuai
    } else {
        echo "Gagal memperbarui kata sandi. Silakan coba lagi.";
    }
}
?>
