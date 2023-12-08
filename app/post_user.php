<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable Posting</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
              Tambah Post
            </button>
            <br></br>
            <table id="tbpost-user" class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th style="width: 20%;">no</th>
                  <th style="width: 20%;">Nama Tempat</th>
                  <th style="width: 20%;">Pekerjaan</th>
                  <th style="width: 30%;">Kategori</th>
                  <th >aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $id_akun = $_SESSION['id_akun'];
                $query = mysqli_query($koneksi, "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori WHERE id_akun = $id_akun");
                while ($posting = mysqli_fetch_array($query)) {
                  $no++;
                  ?>
                  <tr>
                    <td>
                      <?php echo $no; ?>
                    </td>
                    <td>
                      <?php echo $posting['nama']; ?>
                    </td>
                    <td>
                      <?php echo $posting['judul_post']; ?>
                    </td>
                    <td>
                      <?php echo $posting['kategori']; ?>
                    </td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modal-lihat-<?php echo $posting['id_post']; ?>"
                        class="btn btn-info">Lihat</a>
                    </td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modal-edit-<?php echo $posting['id_post']; ?>"
                        class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo $posting['id_post']; ?>"
                        class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>

                  <!-- Modal Lihat -->
                  <div class="modal fade" id="modal-lihat-<?php echo $posting['id_post']; ?>">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <!-- Isi modal sesuai kebutuhan Anda -->
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Post</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h2>Detail Pekerjaan</h2>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Tempat:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $posting['nama']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pekerjaan:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $posting['judul_post']; ?>"
                                readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $posting['kategori']; ?>"
                                readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi:</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" rows="5"
                                readonly><?php echo $posting['deskripsi_post']; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Link Lamar:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $posting['link_lamar']; ?>"
                                readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto:</label>
                            <div class="col-sm-10">
                              <!-- Menampilkan foto -->
                              <img src="crud/<?php echo $posting['foto']; ?>" alt="Foto"
                                style="width: 150px; height: auto;">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- Modal Edit -->
                  <div class="modal fade" id="modal-edit-<?php echo $posting['id_post']; ?>">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <!-- Isi modal tambah sesuai kebutuhan Anda -->
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Post</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Form Edit -->
                          <form method="POST" action="crud/edit_data.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_post" value="<?php echo $posting['id_post']; ?>">
                            <div class="col-md-12">
                              <label class="form-label">Nama tempat</label>
                              <input type="text" class="form-control" id="edit-nama" placeholder="masukkan nama tempat"
                                name="edit-nama" value="<?php echo $posting['nama']; ?>">
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">Pekerjaan</label>
                              <input type="text" class="form-control" id="edit-judul_post"
                                placeholder="masukkan nama pekerjaan" name="edit-judul_post"
                                value="<?php echo $posting['judul_post']; ?>">
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">Kategori</label>
                              <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                name="edit-kategori">
                                <?php
                                $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kategori_query)) {
                                  $selected = ($kategori['id_kategori'] == $posting['id_kategori']) ? 'selected' : '';
                                  echo "<option value='" . $kategori['id_kategori'] . "' " . $selected . ">" . $kategori['kategori'] . "</option>";
                                }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">Deskripsi</label>
                              <textarea class="form-control" id="edit-deskripsi_post"
                                placeholder="masukkan deskripsi pekerjaan" name="edit-deskripsi_post"
                                rows="5"><?php echo $posting['deskripsi_post']; ?></textarea>
                            </div>
                            <div class="col-12">
                              <label class="form-label">Link pekerjaan</label>
                              <input type="text" class="form-control" id="edit-link_lamar"
                                placeholder="masukkan link tempat atau gform" name="edit-link_lamar"
                                value="<?php echo $posting['link_lamar']; ?>">
                            </div>
                            <div class="col-12">
                              <label class="form-label">Upload foto</label>
                              <input class="form-control form-control-sm" id="edit-formFileSm" type="file"
                                name="edit-foto">
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Modal Delete -->
                  <div class="modal fade" id="modal-delete-<?php echo $posting['id_post']; ?>">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Post</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin menghapus posting ini?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="button" class="btn btn-danger"
                            onclick="hapusData(<?php echo $posting['id_post']; ?>)">Hapus</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <!-- isi footer table -->
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

<!-- modal tambah -->
<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Postingan Pekerjaan </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="crud/tambah_data.php" enctype="multipart/form-data">
          <div class="col-md-12">
            <label class="form-label">Nama tempat</label>
            <input type="text" class="form-control" id="nama" placeholder="masukkan nama tempat" name="nama">
          </div>
          <div class="col-md-12">
            <label class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="judul_post" placeholder="masukkan nama pekerjaan"
              name="judul_post">
          </div>
          <div class="col-md-12">
            <label class="form-label">kategori</label>
            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="kategori">
              <option selected>pilih kategori pekerjaan</option>
              <?php
              $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategori");
              while ($kategori = mysqli_fetch_array($kategori_query)) {
                echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['kategori'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label class="form-label">deskripsi</label>
            <textarea class="form-control" id="deskripsi_post" placeholder="masukkan deskripsi pekerjaan"
              name="deskripsi_post" rows="5"></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Link pekerjaan</label>
            <input type="text" class="form-control" id="link_lamar" placeholder="masukkan link tempat atau gform"
              name="link_lamar">
          </div>
          <div class="col-12">
            <label class="form-label" for="customFile">Upload Foto</label>
            <input type="file" name="foto" class="form-control" id="customFile" />
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- cmdckmd -->