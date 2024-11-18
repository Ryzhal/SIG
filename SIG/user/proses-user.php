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
    $username =trim(htmlspecialchars($_POST['username'])) ;
    $password =$_POST['password'];
    $pass     = password_hash($password,PASSWORD_DEFAULT);
    $role  = $_POST['role'];
}

// cek username agar tidak doble
$cekUsername = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
if (mysqli_num_rows($cekUsername)> 0) {
    header("location: add-user.php?msg=cancel");
    return;
}

mysqli_query($koneksi,"INSERT INTO user VALUES(null,'$username','$password','$role')");
header("location: add-user.php?msg=added");
return;

?>