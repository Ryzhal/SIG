<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

// Ambil ID lokasi dari URL
if (isset($_GET['id_lokasi'])) {
    $id_lokasi = $_GET['id_lokasi'];
    // Query untuk mengambil data lokasi berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id_lokasi = '$id_lokasi'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        // Jika data tidak ditemukan
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Lokasi tidak ada.";
    exit;
}

$title = "Edit Lokasi";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Lokasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="data-lokasi.php">Data Lokasi</a></li>
                <li class="breadcrumb-item active">Edit Lokasi</li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen"></i> Edit Lokasi</span>
                </div>
                <div class="card-body">
                    <form action="update-proses-lokasi.php" method="POST">
                        <input type="hidden" name="id_lokasi" value="<?= $data['id_lokasi'] ?>">
                        
                        <div class="mb-3">
                            <label for="id_koperasi" class="form-label">Nama Koperasi</label>
                            <select class="form-select" name="id_koperasi" id="id_koperasi" required>
                                <?php
                                // Ambil data koperasi untuk pilihan
                                $koperasiQuery = mysqli_query($koneksi, "SELECT * FROM koperasi");
                                while ($koperasi = mysqli_fetch_array($koperasiQuery)) {
                                    echo "<option value='" . $koperasi['id_koperasi'] . "' " . ($koperasi['id_koperasi'] == $data['id_koperasi'] ? "selected" : "") . ">" . $koperasi['nama_koperasi'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude" value="<?= $data['latitude'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude" value="<?= $data['longitude'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
include_once "../template/footer.php";
?>
