<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "ADD-LOKASI";
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
    LOKASI DI TAMBAHKAN .....
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ADD Location Koperasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php"> Dashboard </a></li>
                            <li class="breadcrumb-item "><a href="../sig/data-lokasi.php"> Data-Lokasi </a></li>
                            <li class="breadcrumb-item active">Add-Location</li>
                        </ol>
<form action="proses-lokasi.php" method="post">

                            <!-- menampilan allert -->
                            <?php
                                if ($msg !== '') {
                                    echo $alert;
                                }

                            ?>
                                <!-- batas alaert -->

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"> <i class="fa-regular fa-square-plus"></i> Tambah Lokasi</span>
    <button type="submit" class="btn btn-primary float-end" name="simpan"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
    <button type="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>

  <div class="card-body">
    
    <div class="row">
        <div class="col-8">
        <div class="mb-3 row">
    <label for="koperasi" class="col-sm-2 col-form-label">Nama Koperasi</label>
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
        echo '<option value="">Tidak ada jenis koperasi tersedia</option>';
    }
    ?>
</select>

</div>
</div>

        <div class="mb-3 row">
    <label for="latud" class="col-sm-2 col-form-label">Latitude</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text" class="form-control border-1" id="latud" name="latud"  maxlength="20">
    </div>
        </div>
        <div class="mb-3 row">
    <label for="longtud" class="col-sm-2 col-form-label">Longitude</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text" class="form-control border-1" id="longtud" name="longtud"  maxlength="20">
    </div>
        </div>

      

    
        
        <div class="col-4"></div>
    </div>
  </div>
  </form>
</div>
</main>



<?php
include_once "../template/footer.php";

?>