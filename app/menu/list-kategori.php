<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Data</title>
    <!-- Add necessary CSS links for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menampilkan data postingan berdasarkan kategori <?php echo $_GET['kategori'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="#" onclick="history.back()" class="btn btn-secondary">Kembali</a>
                            <br><br>
                            <?php
                        //    $koneksi = mysqli_connect('localhost', 'root', '', 'caker');
                        // $koneksi = mysqli_connect('localhost','root','tifnganjuk321','tifz1761_caker');   
                        include('config.php');
                        $no = 0;
                           $query = mysqli_query($koneksi, "SELECT detail_post.*, kategori.kategori, akun.username
                               FROM detail_post
                               INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori
                               INNER JOIN akun ON detail_post.id_akun = akun.id_akun
                               WHERE kategori= '" . $_GET['kategori'] . "'");
                           $rowCount = mysqli_num_rows($query);
                           
                           if ($rowCount > 0) {
                               ?>
                               <table id="random" class="table table-striped">
                                   <thead>
                                       <tr>
                                           <th>No</th>
                                           <th>Kategori</th>
                                           <th>Nama Pekerjaan</th>
                                           <th>Judul Post</th>
                                           <th>Akun Pembuat</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                       while ($posting = mysqli_fetch_array($query)) {
                                           $no++;
                                       ?>
                                           <tr>
                                               <td><?php echo $no; ?></td>
                                               <td><?php echo $posting['kategori']; ?></td>
                                               <td><?php echo $posting['nama']; ?></td>
                                               <td><?php echo $posting['judul_post']; ?></td>
                                               <td><?php echo $posting['username']; ?></td>
                                           </tr>
                                       <?php
                                       }
                                       ?>
                                   </tbody>
                               </table>
                           <?php
                           } else {
                               echo "<p>Belum ada data.</p>";
                           }
                           ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Add necessary JavaScript and Bootstrap JS links -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
