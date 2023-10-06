<?php
header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // koneksi ke database
        $conn = new mysqli("localhost", "root", "", "caker");

        // jika koneksi gagal
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $length = 10; // Panjang string yang diinginkan
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        


        // post request
        $username = $_POST['username'];
        
        // ng ng jero [] inputen se
        $id_pelamar = $_POST['id_pelamar'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $epassword = password_hash($password, PASSWORD_BCRYPT);

        // amebk queri ne gantien sisan
        $sql = "INSERT INTO akun_pelamar VALUES ('$randomString', '$username', '$password', '$nama_lengkap', '$no_telp', '$alamat')";
        $result = $conn->query($sql);

        if($result === true){
            $response = array("status"=>"success", "message"=>"Register Success");
        }else{
            $response = array("status"=>"error", "message"=>"Register Gagal");
        }

        // close koneksi
        $conn->close();

        echo json_encode($response);
    }else{
        echo 'error';
    }
?>