<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

$title = "USER";
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
    Tambah User Selesai .....
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php"> Dashboard </a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ol>
<form action="proses-user.php" method="post">

                            <!-- menampilan allert -->
                            <?php
                                if ($msg !== '') {
                                    echo $alert;
                                }

                            ?>
                                <!-- batas alaert -->

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"> <i class="fa-regular fa-square-plus"></i> Tambah User</span>
    <button type="submit" class="btn btn-primary float-end" name="simpan"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
    <button type="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>

  <div class="card-body">
    
    <div class="row">
        <div class="col-8">
        <div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text"  class="form-control border-1" id="username" name="username"  maxlength="20">
    </div>
        </div>

        <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <input type="text" class="form-control border-1" id="password" name="password"  maxlength="20">
    </div>
        </div>

        <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">Jabatan</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9" style="margin-left: -40px;">
      <select name="role" id="role" class="form-select">
        <option value="" selected >-- Pilih Jabatan --</option>
        <option value="admin" >Admin</option>
        <option value="user" >user</option>
      </select>
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