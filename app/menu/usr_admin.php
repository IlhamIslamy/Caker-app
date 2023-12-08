<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Akun User</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10%;">no</th>
                  <th style="width: 45%;">nama</th>
                  <th style="width: 45%;">Level</th>
                  <th style="width: 1%;">aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                // Menggunakan $_SESSION['id_akun'] untuk mengambil ID akun yang sedang login
                $id_akun = $_SESSION['id_akun'];

                $query = mysqli_query($koneksi, "SELECT * FROM akun");
                while ($posting = mysqli_fetch_array($query)) {
                  // Cek apakah level pengguna adalah "user"
                  if ($posting['level'] == 'user') {
                    $no++;
                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $posting['username']; ?>
                      </td>
                      <td>
                        <?php echo $posting['level']; ?>
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#modal-lihat-<?php echo $posting['id_akun']; ?>"
                          class="btn btn-info">Lihat</a>
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo $posting['id_akun']; ?>"
                          class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>


                    <!-- Modal Lihat -->
                    <div class="modal fade" id="modal-lihat-<?php echo $posting['id_akun']; ?>">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <!-- Isi modal sesuai kebutuhan Anda -->
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Akun</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h2>Detail Akun</h2>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Nama:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $posting['username']; ?>"
                                  readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Email:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $posting['email']; ?>" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Nomor HP:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $posting['no_hp']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="modal-delete-<?php echo $posting['id_akun']; ?>">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Post</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Anda yakin ingin menghapus akun ini?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger"
                              onclick="hapusDataAUser(<?php echo $posting['id_akun']; ?>)">Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    </tr>
                  <?php }
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>no</th>
                  <th>nama</th>
                  <th>Level</th>
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