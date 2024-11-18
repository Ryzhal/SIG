<?php
session_start(); // Memulai session untuk melacak pengguna yang login

// Menghubungkan ke database
include_once "config.php"; // Pastikan file config.php berisi koneksi ke database

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan input dari form
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk mendapatkan username dan password dari tabel user
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah username ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Mendapatkan data user dari hasil query
        $user = mysqli_fetch_assoc($result);
        
        // Memeriksa apakah password cocok (diasumsikan password tidak di-hash)
        // Jika password sudah di-hash, gunakan password_verify($password, $user['password']);
        if ($password === $user['password']) {
            // Menyimpan informasi login ke session
            $_SESSION['username'] = $user['username'];
            $_SESSION["ssLogin"] = true;
            $_SESSION["ssUser"] = $username;

            // Redirect ke halaman setelah login sukses
            header('Location: index.php');
            exit(); // Jangan lupa exit setelah redirect
        } else {
            // Jika password salah
            echo "Password salah!";
        }
    } else {
        // Jika username tidak ditemukan
        echo "Username tidak ditemukan!";
    }
}
?>
