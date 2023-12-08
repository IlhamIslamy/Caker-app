<section class="content">
  <!-- postingan -->
  <?php
  $no = 0;
  $query = mysqli_query($koneksi, "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori");
  $total_postings = mysqli_num_rows($query);
  ?>
  <!-- kategori -->
  <?php
  $no = 0;
  $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori ");
  $total_kategori = mysqli_num_rows($query_kategori);
  ?>
  <!-- user -->
  <?php
  $no = 0;
  $query_user = mysqli_query($koneksi, "SELECT * FROM akun WHERE level = 'user'");
  $total_user = mysqli_num_rows($query_user);
  ?>

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>
              <?php echo $total_postings; ?><sup style="font-size: 20px"></sup>
            </h3>
            <p>Total Postingan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="index.php?page=postadmin" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>
              <?php echo $total_kategori; ?>
            </h3>
            <p>Kategori</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="index.php?page=kategori" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
              <?php echo $total_user; ?>
            </h3>
            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="index.php?page=user" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <!-- <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
      </div>

      <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <!-- Content section 1 - Futuristic Green background -->
        <div class="content-section futuristic" style="background-color: #2ecc71; color: #fff;">
          <h4>Informasi Postingan</h4>
          <p>pada laman post di dalam list tugas terdapat data-data postingan pekerjaan dari semua user</p>
          <p>pastikan untuk melihat setiap postingan yang di upload oleh user
            apabila ada postingan yang sudah usang dan melanggar aturan mohon hubungi user yang bersangkutan
            dan apabila user tidak merespon admin dapat menghapus postingan tersebut</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <!-- Content section 2 - Futuristic Red background -->
        <div class="content-section futuristic" style="background-color: #e74c3c; color: #fff;">
          <h4>Informasi Kategotri 
          </h4>
          <p>pada laman kategori anda dapat menambahkan dan menghapus kategori yang nantinya digunakan dalam posting pekerjaan untuk User
          anda juga dapat melihat setiap postingan user menutut kategori yang anda inginkan</p>
          <p>anda juga dapat melihat setiap postingan user menutut kategori yang anda inginkan</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <!-- Content section 3 - Futuristic Orange background -->
        <div class="content-section futuristic" style="background-color: #e67e22; color: #fff;">
          <h4>Informasi Akun</h4>
          <p>Dalam informasi akun anda dapat melihat semua user yang telah terdaftar</p>
          <p>apabila ada akun yang bermasalah dan melanggar aturan dalam membuat postingan anda dapat mencari informasi akun tersebut pada laman user</p>
          <p>terdapat email dan nomor hp user yang dapat anda hubungi untuk memberikan peringatan</p>
          <p>anda juga dapat menghapus akun tersebut apabila user tidak merespon peringatan anda</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row (main row) -->

  </div><!-- /.container-fluid -->
</section>


<style 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transitionstyle>
  .futuristic {
    border-radius: 10px;
    paddin: transform 0.3s;
  }

  .futuristic:hover {
    transform: scale(1.05);
  }
</style>
