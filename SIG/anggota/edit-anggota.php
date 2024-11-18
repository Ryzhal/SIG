<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

// Cek apakah ada id_anggota di URL
if (isset($_GET['id_anggota'])) {
    $id_anggota = $_GET['id_anggota'];

    // Ambil data anggota berdasarkan id_anggota
    $query = mysqli_query($koneksi, "SELECT * FROM anggota
                                     JOIN jabatan ON anggota.id_jabatan = jabatan.id_jabatan
                                     JOIN koperasi ON anggota.id_koperasi = koperasi.id_koperasi
                                     WHERE id_anggota = '$id_anggota'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        // Jika data tidak ditemukan
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Anggota tidak ada.";
    exit;
}

$title = "Edit Anggota";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Anggota Koperasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="anggota.php">Data Anggota</a></li>
                <li class="breadcrumb-item active">Edit Anggota</li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen"></i> Edit Anggota</span>
                </div>
                <div class="card-body">
                    <form action="update-anggota.php" method="POST">
                        <input type="hidden" name="id_anggota" value="<?= $data['id_anggota'] ?>">

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
                            <label for="id_jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" name="id_jabatan" id="id_jabatan" required>
                                <?php
                                // Ambil data jabatan untuk pilihan
                                $jabatanQuery = mysqli_query($koneksi, "SELECT * FROM jabatan");
                                while ($jabatan = mysqli_fetch_array($jabatanQuery)) {
                                    echo "<option value='" . $jabatan['id_jabatan'] . "' " . ($jabatan['id_jabatan'] == $data['id_jabatan'] ? "selected" : "") . ">" . $jabatan['nama_jabatan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nm_anggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" name="nm_anggota" id="nm_anggota" value="<?= $data['nm_anggota'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_anggota" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_anggota" id="alamat_anggota" required><?= $data['alamat_anggota'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $data['no_hp'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email_anggota" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_anggota" id="email_anggota" value="<?= $data['email_anggota'] ?>" required>
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
