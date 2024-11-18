<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}

include_once "../config.php";

// Mengecek apakah ada parameter 'nama_koperasi' yang diterima melalui URL
if (isset($_GET['nama_koperasi'])) {
    // Menyimpan parameter nama koperasi dalam variabel
    $nama_koperasi = $_GET['nama_koperasi'];

    // Query untuk mendapatkan ID lokasi berdasarkan nama koperasi
    $query = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id_lokasi = '$nama_koperasi'");
    
    // Mengecek apakah lokasi ditemukan
    if (mysqli_num_rows($query) > 0) {
        // Mendapatkan data lokasi
        $data = mysqli_fetch_array($query);
        $id_lokasi = $data['id_lokasi'];

        // Melakukan query untuk menghapus lokasi
        $deleteQuery = mysqli_query($koneksi, "DELETE FROM lokasi WHERE id_lokasi = '$id_lokasi'");

        // Mengecek apakah penghapusan berhasil
        if ($deleteQuery) {
            // Mengarahkan ke halaman data lokasi setelah berhasil menghapus
            $_SESSION['message'] = "Data lokasi berhasil dihapus.";
            header("Location: data-lokasi.php");
            exit;
        } else {
            // Menampilkan pesan error jika penghapusan gagal
            $_SESSION['error'] = "Gagal menghapus data lokasi.";
            header("Location: data-lokasi.php");
            exit;
        }
    } else {
        // Jika lokasi tidak ditemukan
        $_SESSION['error'] = "Data lokasi tidak ditemukan.";
        header("Location: data-lokasi.php");
        exit;
    }
} else {
    // Jika parameter nama_koperasi tidak ada
    $_SESSION['error'] = "ID lokasi tidak ditemukan.";
    header("Location: data-lokasi.php");
    exit;
}
?>
