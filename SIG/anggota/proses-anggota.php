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
    $nama =trim(htmlspecialchars($_POST['nama'])) ;
    $jabatan =trim(htmlspecialchars($_POST['jabatan'])) ;
    $alamat =trim(htmlspecialchars($_POST['alamat'])) ;
    $NoTlp =trim(htmlspecialchars($_POST['NoTlp'])) ;
    $email =trim(htmlspecialchars($_POST['email'])) ;
    
}



mysqli_query($koneksi,"INSERT INTO anggota VALUES(null,'$koperasi','$nama','$jabatan','$alamat','$NoTlp','$email')");
header("location: input-anggota.php?msg=added");
return;

?>