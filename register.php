<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-xxl p-5 mt-5">
        <div class="row login-admin w-75 mx-auto ">
            <div class="col-6 d-flex justify-content-center align-items-center flex-column pt-4 pb-4">
                <img src="./img/logo.png" alt="" class="w-75">
                <img src="./img/admin.png" alt="">
            </div>
            <div class="col-6 card-col d-flex justify-content-center align-items-center">
                <div class="card card-first-admin">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <h4 class="card-title mb-4">Selamat datang</h4>
                        <form action="insertregistrasi.php" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">password</label>
                                <input type="text" class="form-control" id="password" placeholder="Masukkan password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">email</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukkan email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">nomor hp</label>
                                <input type="text" class="form-control" id="nomor hp" placeholder="Masukkan nomor hp"name="no_telp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">alamat</label>
                                <input type="password" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="remember-me">Remember me</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <a href="#">Forgot password?</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-light mx-auto">Login</button>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <p style="font-size: 15px;">Dont have an account?&nbsp;</p>
                                <a href="#" style="font-size: 15px;">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>