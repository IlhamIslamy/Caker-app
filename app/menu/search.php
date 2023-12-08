<?php
include('config.php');
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$searchData = array(
  'searchNama' => isset($_GET['searchNama']) ? mysqli_real_escape_string($koneksi, $_GET['searchNama']) : '',
  'searchPekerjaan' => isset($_GET['searchPekerjaan']) ? mysqli_real_escape_string($koneksi, $_GET['searchPekerjaan']) : '',
  'searchKategori' => isset($_GET['searchKategori']) ? mysqli_real_escape_string($koneksi, $_GET['searchKategori']) : '',
  'searchJudul' => isset($_GET['searchJudul']) ? mysqli_real_escape_string($koneksi, $_GET['searchJudul']) : '',
  'searchDeskripsi' => isset($_GET['searchDeskripsi']) ? mysqli_real_escape_string($koneksi, $_GET['searchDeskripsi']) : ''
);

$no = 0;
$query = "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori WHERE 1=1";

foreach ($searchData as $key => $value) {
  if (!empty($value)) {
    $query .= " AND $key LIKE '%$value%'";
  }
}

$result = mysqli_query($koneksi, $query);

while ($posting = mysqli_fetch_array($result)) {
  $no++;
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $posting['nama']; ?></td>
    <td><?php echo $posting['judul_post']; ?></td>
    <td><?php echo $posting['kategori']; ?></td>
    <td>
      <a href="#" data-toggle="modal" data-target="#modal-lihat-<?php echo $posting['id_post']; ?>" class="btn btn-info">Lihat</a>
    </td>
    <td>
      <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo $posting['id_post']; ?>" class="btn btn-danger">Hapus</a>
    </td>
    <!-- ... Modal Lihat dan Modal Delete yang sudah ada ... -->
  </tr>
<?php } ?>
