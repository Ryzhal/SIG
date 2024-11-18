<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "Data-Koperasi";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";

?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Koperasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Koperasi</li>
                        </ol>
                        <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
    <div class="alert alert-success">Data koperasi berhasil diperbarui.</div>
<?php endif; ?>

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Koperasi</span>
    <a href="<?= $main_url ?>koperasi/input-koperasi.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Koperasi</a>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>NAMA KOPERASI</center></th>
      <th scope="col"><center>ALAMAT KOPERASI</center></th>
      <th scope="col"><center>No HUKUM</center></th>
      <th scope="col"><center>No Tlp</center></th>
      <th scope="col"><center>EMAIL</center></th>
      <th scope="col"><center>Setting</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
$no = 1;
$queryKoperasi = mysqli_query($koneksi,"SELECT * FROM koperasi");
while ($data = mysqli_fetch_array($queryKoperasi)) {?>


    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td align="center"><?= $data['nama_koperasi']?></td>
      <td align="center"><?= $data['alamat_koperasi']?></td>
      <td align="center"><?= $data['no_hukum']?></td>
      <td align="center"><?= $data['nomor_telepon']?></td>
      <td align="center"><?= $data['email']?></td>
      <td align="center">
        <a href="edit-koperasi.php?id_koperasi=<?= $data['id_koperasi']?>&gambar=<?= $data['gambar']?>" class="btn btn-sm btn-warning" tittle=" Update Koperasi"><i class="fa-solid fa-pen"></i></a>
        <a href="hapus-koperasi.php?id_koperasi=<?= $data['id_koperasi']?>&gambar=<?= $data['gambar']?>" class="btn btn-sm btn-danger" tittle="Hapus koperasi" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fa-solid fa-trash"></i> </a>
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