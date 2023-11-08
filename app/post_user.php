<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-striped">
              <thead>
                <tr>
                  <th>no</th>
                  <th>nama</th>
                  <th>judul</th>
                  <th>deskripsi</th>
                  <th>link</th>
                  <th>aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi,"SELECT * FROM detail_post");
                while($posting = mysqli_fetch_array($query)){
                  $no++
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $posting['nama'];?></td>
                  <td><?php echo $posting['judul_post'];?></td>
                  <td><?php echo $posting['deskripsi_post'];?></td>
                  <td><?php echo $posting['link_lamar'];?></td>
                  <td>X</td>
                </tr>
                <?php }?>
              </tbody>
              <tfoot>
                <tr>
                  <th>no</th>
                  <th>nama</th>
                  <th>judul</th>
                  <th>deskripsi</th>
                  <th>link</th>
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