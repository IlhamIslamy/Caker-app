<!-- dashboard -->
<footer class="main-footer">
    <strong>Copyright &copy; kelompok 3 <a href="https://wa.link/1ryem0">Cakers</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- post_user -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- searching table -->
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->

<script>
  function hapusData(id_post) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Panggil fungsi hapus data di sini
        $.ajax({
          type: "POST",
          url: "crud/delete_data.php",
          data: { id_post: id_post },
          success: function (response) {
            // Tampilkan notifikasi SweetAlert
            Swal.fire(
              'Terhapus!',
              'Post telah dihapus.',
              'success'
            );
            setTimeout(() => {
              location.reload();
            }, 500);
            // Refresh halaman atau lakukan manipulasi DOM sesuai kebutuhan
          },
          error: function (error) {
            console.error('Error:', error);
            // Tampilkan notifikasi SweetAlert untuk kesalahan jika diperlukan
            Swal.fire(
              'Error!',
              'Terjadi kesalahan saat menghapus data.',
              'error'
            );
          }
        });
      }
    });
  }

  // hapus data
  function hapusDataAUser(id_akun) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Panggil fungsi hapus data di sini
        $.ajax({
          type: "POST",
          url: "crud/delete_data.php",
          data: { id_akun: id_akun },
          success: function (response) {
            // Tampilkan notifikasi SweetAlert
            Swal.fire(
              'Terhapus!',
              'Post telah dihapus.',
              'success'
            );
            setTimeout(() => {
              location.reload();
            }, 500);
            // Refresh halaman atau lakukan manipulasi DOM sesuai kebutuhan
          },
          error: function (error) {
            console.error('Error:', error);
            // Tampilkan notifikasi SweetAlert untuk kesalahan jika diperlukan
            Swal.fire(
              'Error!',
              'Terjadi kesalahan saat menghapus data.',
              'error'
            );
          }
        });
      }
    });
  }
</script>

<!-- logout -->
<script>
    function logout() {
        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan operasi logout di sini, seperti mengirim permintaan ke server atau membersihkan sesi lokal
                // Setelah logout berhasil, arahkan pengguna ke halaman login atau halaman lainnya
                window.location.href = "logout.php";
            }
        });
    }
</script>
<!-- Tambahkan script di bagian head atau sebelum tag body ditutup -->

