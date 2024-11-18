<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

// Cek apakah ada id_koperasi di URL
if (isset($_GET['id_koperasi'])) {
    $id_koperasi = $_GET['id_koperasi'];

    // Ambil data koperasi berdasarkan id_koperasi
    $query = mysqli_query($koneksi, "SELECT * FROM koperasi WHERE id_koperasi = '$id_koperasi'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        // Jika data tidak ditemukan
        echo "Data koperasi tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Koperasi tidak ada.";
    exit;
}

$title = "Edit Koperasi";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Koperasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="koperasi.php">Data Koperasi</a></li>
                <li class="breadcrumb-item active">Edit Koperasi</li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen"></i> Edit Koperasi</span>
                </div>
                <div class="card-body">
                    <form action="update-koperasi.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_koperasi" value="<?= $data['id_koperasi'] ?>">

                        <div class="mb-3">
                            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
                            <input type="text" class="form-control" name="nama_koperasi" id="nama_koperasi" value="<?= $data['nama_koperasi'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_koperasi" class="form-label">Alamat Koperasi</label>
                            <textarea class="form-control" name="alamat_koperasi" id="alamat_koperasi" required><?= $data['alamat_koperasi'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_hukum" class="form-label">No Hukum</label>
                            <input type="text" class="form-control" name="no_hukum" id="no_hukum" value="<?= $data['no_hukum'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" value="<?= $data['nomor_telepon'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                            <small>Leave blank if you don't want to change the image.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
include_once "../template/footer.php";
?>
