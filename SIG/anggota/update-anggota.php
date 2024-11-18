<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

// Pastikan data POST ada
if (isset($_POST['id_anggota'])) {
    $id_anggota = $_POST['id_anggota'];
    $id_koperasi = $_POST['id_koperasi'];
    $id_jabatan = $_POST['id_jabatan'];
    $nm_anggota = $_POST['nm_anggota'];
    $alamat_anggota = $_POST['alamat_anggota'];
    $no_hp = $_POST['no_hp'];
    $email_anggota = $_POST['email_anggota'];

    // Sanitasi data
    $id_anggota = mysqli_real_escape_string($koneksi, $id_anggota);
    $id_koperasi = mysqli_real_escape_string($koneksi, $id_koperasi);
    $id_jabatan = mysqli_real_escape_string($koneksi, $id_jabatan);
    $nm_anggota = mysqli_real_escape_string($koneksi, $nm_anggota);
    $alamat_anggota = mysqli_real_escape_string($koneksi, $alamat_anggota);
    $no_hp = mysqli_real_escape_string($koneksi, $no_hp);
    $email_anggota = mysqli_real_escape_string($koneksi, $email_anggota);

    // Query untuk memperbarui data anggota
    $query = "UPDATE anggota SET 
                id_koperasi = '$id_koperasi', 
                id_jabatan = '$id_jabatan', 
                nm_anggota = '$nm_anggota', 
                alamat_anggota = '$alamat_anggota', 
                no_hp = '$no_hp', 
                email_anggota = '$email_anggota' 
              WHERE id_anggota = '$id_anggota'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect setelah berhasil
        header("location: anggota.php?status=success");
    } else {
        // Jika terjadi error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika id_anggota tidak ada di POST
    echo "ID Anggota tidak ditemukan.";
}
?>
