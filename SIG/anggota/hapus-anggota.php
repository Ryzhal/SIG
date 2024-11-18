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

$id_anggota  = $_GET['id_anggota'];

mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id_anggota'");


echo"<script>
        alert(' Data Koperasi berhasil di hapus ..');
        document.location.href = 'anggota.php';
</script>";
return ;
?>
