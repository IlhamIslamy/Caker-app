<!-- Konten utama -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Data postingan pekerjaan </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th style="width: 20%;">no</th>
                  <th style="width: 20%;">Nama tempat</th>
                  <th style="width: 20%;">Pekerjaan</th>
                  <th style="width: 20%;">Kategori</th>
                  <th style="width: 2%;">aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori");
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
                      <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo $posting['id_post']; ?>"
                        class="btn btn-danger">Hapus</a>
                    </td>

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
                              <label class="col-sm-2 col-form-label">Nama:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $posting['nama']; ?>" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Judul:</label>
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
                              <img src="crud/<?php echo $posting['foto']; ?>" alt="Foto"
                              style="width: 150px; height: auto;">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                <th>no</th>
                  <th>Nama tempat</th>
                  <th>Pekerjaan</th>
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

