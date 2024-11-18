<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "Data-Lokasi";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";

?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Lokasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Lokasi</li>
                        </ol>

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Lokasi</span>
    <a href="<?= $main_url ?>sig/add-lokasi.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Lokasi</a>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>NAMA KOPERASI</center></th>
      <th scope="col"><center>Latitude</center></th>
      <th scope="col"><center>Longitude</center></th>
      <th scope="col"><center>Aksi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
$no = 1;
$queryLokasi = mysqli_query($koneksi,"SELECT * FROM lokasi
JOIN koperasi ON lokasi.id_koperasi = koperasi.id_koperasi");
while ($data = mysqli_fetch_array($queryLokasi)) {?>


    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td align="center"><?= $data['nama_koperasi']?></td>
      <td align="center"><?= $data['latitude']?></td>
      <td align="center"><?= $data['longitude']?></td>
      <td align="center">
      <a href="edit-lokasi.php?id_lokasi=<?= $data['id_lokasi']?>" class="btn btn-sm btn-warning" tittle=" Update Lokasi"><i class="fa-solid fa-pen"></i></a>
      <a href="hapus-lokasi.php?nama_koperasi=<?= $data['id_lokasi']?>" class="btn btn-sm btn-danger" tittle="Hapus lokasi" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fa-solid fa-trash"></i> </a>
      </td>
    </tr>
    <?php
}


?>
  </tbody>
</table>
                    </div>
                </main>






<?php
include_once "../template/footer.php";

?>