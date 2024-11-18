<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";


// jika tombol simpan di tekan
if (isset($_POST['simpan'])) {
    // ambil data dari value
    $koperasi =trim(htmlspecialchars($_POST['koperasi'])) ;
    $latitude =trim(htmlspecialchars($_POST['latud'])) ;
    $longitude =trim(htmlspecialchars($_POST['longtud'])) ;
    
    
    mysqli_query($koneksi,"INSERT INTO lokasi VALUES(null,'$koperasi','$latitude','$longitude')");
    header("location: add-lokasi.php?msg=added");
    return;
}
?>
