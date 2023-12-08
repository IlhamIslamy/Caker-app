<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data kategori</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-kategori">
              Tambah Kategori
            </button>
            <br></br>
            <table id="example1" class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th style="width: 30%;">no</th>

                  <th style="width: 45%;">Kategori</th>

                  <th style="width: 2%;">aksi</th>
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
                    <td>
                      <a href="menu/list-kategori.php?kategori=<?php echo $posting['kategori'] ?>"
                        class="btn btn-info">Lihat</a>
                    </td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo $posting['id_kategori']; ?>"
                        class="btn btn-danger">Hapus</a>
                    </td>

                    <!-- Modal Delete Kategori -->
                    <div class="modal fade" id="modal-delete-<?php echo $posting['id_kategori']; ?>" tabindex="-1"
                      role="dialog" aria-labelledby="modal-delete-label-<?php echo $posting['id_kategori']; ?>"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modal-delete-label-<?php echo $posting['id_kategori']; ?>">
                              Konfirmasi Hapus Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Anda yakin ingin menghapus kategori ini?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="menu/proses_delete_kategori.php?id_kategori=<?php echo $posting['id_kategori']; ?>"
                              class="btn btn-danger">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Tambah Kategori -->
                    <div class="modal fade" id="modal-tambah-kategori" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- Form untuk menambahkan kategori -->
                            <form action="menu/proses_tambah_kategori.php" method="post">
                              <div class="form-group">
                                <label for="nama_kategori">Nama Kategori:</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>no</th>

                  <th>Kategori</th>

                  <th>aksi</th>
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

<!-- /.modal -->