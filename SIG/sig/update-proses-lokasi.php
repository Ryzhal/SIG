<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}

include_once "../config.php";

// Pastikan parameter 'id_lokasi' ada di POST
if (isset($_POST['id_lokasi'])) {
    $id_lokasi = $_POST['id_lokasi'];
    $id_koperasi = $_POST['id_koperasi'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Validasi input (untuk keamanan, misalnya, menggunakan mysqli_real_escape_string)
    $id_lokasi = mysqli_real_escape_string($koneksi, $id_lokasi);
    $id_koperasi = mysqli_real_escape_string($koneksi, $id_koperasi);
    $latitude = mysqli_real_escape_string($koneksi, $latitude);
    $longitude = mysqli_real_escape_string($koneksi, $longitude);

    // Query untuk memperbarui data lokasi
    $query = "UPDATE lokasi SET 
                id_koperasi = '$id_koperasi', 
                latitude = '$latitude', 
                longitude = '$longitude' 
              WHERE id_lokasi = '$id_lokasi'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect setelah berhasil
        header("location: data-lokasi.php?status=success");
    } else {
        // Jika terjadi kesalahan
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_lokasi tidak ada di POST
    echo "ID Lokasi tidak ditemukan.";
}
?>
