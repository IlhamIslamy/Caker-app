<?php
session_start();
include('config.php');
$username =$_POST['username'];
$password =$_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query)==1){
    header('Location:../app');
    $user = mysqli_fetch_array($query);
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level'];
    $_SESSION['id_akun'] = $user['id_akun'];
}
else if($username == '' || $password == ''){
    header('Location:../UserLogin.php?error=2');
}
else{
    header('Location:../UserLogin.php?error=1');
}
?>


<!-- if (password_verify($password, $db_password)) {
        // Password cocok, pengguna terotentikasi
        $_SESSION["user_id"] = $user_id;
        header("Location: welcome.php");
    } else {
        // Username atau password tidak valid
        echo "Username atau password tidak valid.";
    }

    $stmt->close();
    $conn->close();
}
?> -->