<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <table id="tb-kategori-user" class="table table-striped ">
              <thead>
                <tr>
                  <th style="width: 20%;">no</th>

                  <th style="width: 25%;">Kategori</th>
                  
                  <th style="width: 5%;">aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                $no = 0;
                // Menggunakan $_SESSION['id_akun'] untuk mengambil ID akun yang sedang login
                $id_akun = $_SESSION['id_akun'];

                // Kueri SQL hanya mengambil data berdasarkan ID akun yang sedang login
                $query = mysqli_query($koneksi, "SELECT * FROM kategori ");

                while ($posting = mysqli_fetch_array($query)) {
                  $no++;
                  ?>
                  <tr>
                    <td>
                      <?php echo $no; ?>
                    </td>
                    <td>
                      <?php echo $posting['kategori']; ?>
                    </td>
                    
                    <td><a href="crud/read.php?id=<?php echo $posting['id_kategori']; ?>" button type="button" class="btn btn-info">lihat</button></a></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                  <th style="width: 20%;">no</th>

                  <th style="width: 25%;">Kategori</th>
                  
                  <th style="width: 5%;">aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>