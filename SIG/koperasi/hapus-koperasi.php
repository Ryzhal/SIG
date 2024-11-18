<?php
// Mulai sesi
session_start();

// Cek apakah user sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}

// Menghubungkan ke database
include_once "../config.php";

$id_koperasi     = $_GET['id_koperasi'];
$gambar   = $_GET['gambar'];

mysqli_query($koneksi,"DELETE FROM koperasi WHERE id_koperasi = '$id_koperasi'");
if ($foto != 'lawo.jpg') {
    unlink('../img/'. $foto);
}

echo"<script>
        alert(' Data Koperasi berhasil di hapus ..');
        document.location.href = 'koperasi.php';
</script>";
return ;
?>
