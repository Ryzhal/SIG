<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "Tambah Koperasi";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";

// menangkap pesan 
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}else {
    $msg = '';
}

// alert
$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Tambah User Gagal , Username Sudah Ada .....
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    KOPERASI SUDAH DI TAMBAHKAN  .....
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($msg =='notimage'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-xmark"></i> Tambah User gagal, File yang anda upload tidak di terima atau bukan gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  if($msg == 'oversize'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-xmark"></i> Tambah User gagal, Maximal Ukuran gambar 1 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Input Koperasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php"> Dashboard </a></li>
                            <li class="breadcrumb-item "><a href="../anggota/anggota.php"> Data-Anggota-Koperasi </a></li>
                            <li class="breadcrumb-item active">Input Anggota Koperasi</li>
                        </ol>
<form action="proses-anggota.php" method="post" >

                            <!-- menampilan allert -->
                            <?php
                                if ($msg !== '') {
                                    echo $alert;
                                }

                            ?>
                                <!-- batas alaert -->

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"> <i class="fa-regular fa-square-plus"></i> Tambah Anggota Koperasi</span>
    <button type="submit" class="btn btn-primary float-end" name="simpan"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
    <button type="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>

  <div class="card-body">
  <div class="row">
  <div class="col-8">
  <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label"> Nama Koperasi</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
    <select name="koperasi" id="koperasi" class="form-select">
    <option value="" selected>-- Pilih Koperasi --</option>
    <?php
    // Query untuk mengambil data dari tabel jenis_koperasi
    $query = "SELECT * FROM koperasi";
    $result = mysqli_query($koneksi, $query);

    // Jika ada hasil dari query
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Membuat option untuk setiap jenis koperasi
            echo '<option value="' . $row['id_koperasi'] . '">' . $row['nama_koperasi'] . '</option>';
        }
    } else {
        echo '<option value="">Tidak ada koperasi tersedia</option>';
    }
    ?>
</select>
    </div>
       
        </div>

        <div class="mb-3 row">
    <label for="koperasi" class="col-sm-2 col-form-label">Nama Anggota</label>
    <label for="" class="col-sm-1 col-form-label" >:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text"  class="form-control border-1" id="nama" name="nama"  maxlength="20">
    </div>
        </div>

        <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label"> Jabatan</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
    <select name="jabatan" id="jabatan" class="form-select">
    <option value="" selected>-- Pilih Jabatan --</option>
    <?php
    // Query untuk mengambil data dari tabel jenis_koperasi
    $query = "SELECT * FROM jabatan";
    $result = mysqli_query($koneksi, $query);

    // Jika ada hasil dari query
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Membuat option untuk setiap jenis koperasi
            echo '<option value="' . $row['id_jabatan'] . '">' . $row['nama_jabatan'] . '</option>';
        }
    } else {
        echo '<option value="">Tidak ada jabatan tersedia</option>';
    }
    ?>
</select>
    </div>
       
        </div>

        <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
<label for="" class="col-sm-1 col-form-label">:</label>
<div class="col-sm-9" style="margin-left: -40px;">
  <textarea class="form-control border-1" id="alamat" name="alamat" rows="2" maxlength="200"></textarea>
</div>
        </div>

        <!-- NO TELEPON -->
<div class="mb-3 row">
    <label for="NoTlp" class="col-sm-2 col-form-label">No.Telp</label>
    <label for="" class="col-sm-1 col-form-label" >:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text"  class="form-control border-1" id="NoTlp" name="NoTlp"  maxlength="20">
    </div>
        </div>
<!-- EMAIL -->
<div class="mb-3 row">
<label for="email" class="col-sm-2 col-form-label">Email</label>
<label for="" class="col-sm-1 col-form-label">:</label>
<div class="col-sm-9" style="margin-left: -40px;">
  <input type="email" class="form-control border-1" id="email" name="email" maxlength="50">
        </div> 
    </div>
    
  </form>
</div>
</main>



<?php
include_once "../template/footer.php";

?>