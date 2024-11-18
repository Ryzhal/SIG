<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "Data-Anggota";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";

?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Anggota Koperasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Anggota Koperasi</li>
                        </ol>
                        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div class="alert alert-success" role="alert">
        Data anggota berhasil diperbarui!
    </div>
<?php endif; ?>


                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Anggota Koperasi</span>
    <a href="<?= $main_url ?>anggota/input-anggota.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Anggota</a>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>NAMA KOPERASI</center></th>
      <th scope="col"><center>Nama Anggota</center></th>
      <th scope="col"><center>Jabatan</center></th>
      <th scope="col"><center>Alamat</center></th>
      <th scope="col"><center>No Hp</center></th>
      <th scope="col"><center>Email</center></th>
      <th scope="col"><center>SETTING</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
$no = 1;
$queryjabatan = mysqli_query($koneksi,"SELECT * FROM anggota
Join jabatan ON anggota.id_jabatan = jabatan.id_jabatan
JOIN koperasi ON anggota.id_koperasi = koperasi.id_koperasi");
while ($data = mysqli_fetch_array($queryjabatan)) {?>


    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td align="center"><?= $data['nama_koperasi']?></td>
      <td align="center"><?= $data['nm_anggota']?></td>
      <td align="center"><?= $data['nama_jabatan']?></td>
      <td align="center"><?= $data['alamat_anggota']?></td>
      <td align="center"><?= $data['no_hp']?></td>
      <td align="center"><?= $data['email_anggota']?></td>
      <td align="center">
      <a href="edit-anggota.php?id_anggota=<?=$data['id_anggota'] ?>" class="btn btn-sm btn-warning" tittle=" Update Dosen"><i class="fa-solid fa-pen"></i></a>
        <a href="hapus-anggota.php?id_anggota=<?= $data['id_anggota']?>" class="btn btn-sm btn-danger" tittle="Hapus Anggota" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fa-solid fa-trash"></i> </a>
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