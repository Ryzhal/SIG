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
    $alamat =trim(htmlspecialchars($_POST['alamat'])) ;
    $kecamatan =trim(htmlspecialchars($_POST['camat'])) ;
    $jenis =trim(htmlspecialchars($_POST['jenis'])) ;
    $Nohukum =trim(htmlspecialchars($_POST['NoHukum'])) ;
    $NoTlp =trim(htmlspecialchars($_POST['NoTlp'])) ;
    $email =trim(htmlspecialchars($_POST['email'])) ;
    $gambar  = trim(htmlspecialchars($_FILES['image']['name']));
    
}

// // cek Nama Koperasi agar tidak doble
// $cekKoperasi = mysqli_query($koneksi,"SELECT * FROM koperasi WHERE koperasi = '$koperasi'");
// if (mysqli_num_rows($cekKoperasi)> 0) {
//     header("location: add-user.php?msg=cancel");
//     return;
// }


// upload gambar
if($gambar != null){
    $url = 'input-koperasi.php';
    $gambar = uploadimg($url);
} else{
    $gambar = 'lawo.jpg';
}

mysqli_query($koneksi,"INSERT INTO koperasi VALUES(null,'$kecamatan','$jenis','$koperasi','$alamat','$Nohukum','$NoTlp','$email','$gambar')");
header("location: input-koperasi.php?msg=added");
return;

?>