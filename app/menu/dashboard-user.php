<section class="content">
  <?php
  // Kode yang sudah ada untuk mengambil posting
  $no = 0;
  $id_akun = $_SESSION['id_akun'];
  $query = mysqli_query($koneksi, "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori WHERE id_akun = $id_akun");

  // Menghitung total posting
  $totalPosting = mysqli_num_rows($query);
  ?>

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>
              <?php echo $totalPosting; ?><sup style="font-size: 20px"></sup>
            </h3>
            <p>Total Posting</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="index.php?page=post_user" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


      <?php
      // Kode yang sudah ada untuk mengambil kategori
      $no = 0;
      $id_akun = $_SESSION['id_akun'];
      $query = mysqli_query($koneksi, "SELECT * FROM kategori ");

      // Menghitung total kategori
      $totalKategori = mysqli_num_rows($query);
      ?>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>
              <?php echo $totalKategori; ?>
            </h3>
            <p>Kategori</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="index.php?page=userkategori" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>
              nomor admin
            </h4>
            <p>085784626830</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="https://wa.me/6285784626830" class="small-box-footer" target="_blank">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
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
            </div>
          </div> -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <!-- Content section 1 - Futuristic Green background -->
              <div class="content-section futuristic" style="background-color: #2ecc71; color: #fff;">
                <h4> Halaman Posting</h4>
                <p> Di dalam halaman posting anda dapat </p>
                <p> - Membuat postingan pekerjaan</p>
                <p> - melihat detail postingan pekerjaan anda</p>
                <p> - mengedit potingan yang anda buat</p>
                <p> - menghapus postingan yang tidak dibutuhkan</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="height: 280px;">
            <div class="card-body">
              <!-- Content section 2 - Futuristic Red background -->
              <div class="content-section futuristic" style="background-color: #e74c3c; color: #fff; height:230px">
                <h4>Informasi Kategori</h4>
                <p>Dalam infomasi kategori anda dapat melihat semua postingan berdasarkan kategori yang anda inginkan
                </p>
                <p></p>
                <p></p>
                <p></p>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <div class="card">
      <div class="card-body">
        <!-- Content section 3 - Futuristic Orange background -->
        <div class="content-section futuristic" style="background-color: #e67e22; color: #fff;">
          <h4>Posting Pekerjaan</h4>
          <p>Saat anda menambahkan postinggan pekerjaan ada beberapa hal hang harus diperhatikan :</p>
          <P>- nama tempat : isi nama tempat dengan nama toko,perusahaan,kantor saat ini yang membuka lowongan pekerjaan
          </P>
          <p>- pekerjaan : masukkan nama pekerjaan sesuai yang anda butuhkan</p>
          <p>- kategori : pilih kategori pekerjaan yang cocok dengan pekerjaan yang anda masukkan</p>
          <P>- deskripsi : masukkan informasi lowongan anda, kriteria pelamar, alamat, dan informasi-informasi lainnya
          </P>
          <p>- link : isi link dengan link gform untuk pelamar / website / link whastapp / ling yang dapat digunakan
            pelamar untuk melamar di tempat anda</p>
          <p>- foto : masukkan logo atau foto tempat kerja</p>
        </div>
      </div>
    </div>
</section>

<style 20px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transitionstyle>
  .futuristic {
    border-radius: 10px;
    paddin: transform 0.3s;
  }

  .futuristic:hover {
    transform: scale(1.05);
  }
</style>