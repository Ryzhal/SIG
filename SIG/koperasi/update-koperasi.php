<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}
include_once "../config.php";

// Pastikan ada id_koperasi di POST
if (isset($_POST['id_koperasi'])) {
    $id_koperasi = $_POST['id_koperasi'];
    $nama_koperasi = $_POST['nama_koperasi'];
    $alamat_koperasi = $_POST['alamat_koperasi'];
    $no_hukum = $_POST['no_hukum'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    
    // Sanitasi input
    $id_koperasi = mysqli_real_escape_string($koneksi, $id_koperasi);
    $nama_koperasi = mysqli_real_escape_string($koneksi, $nama_koperasi);
    $alamat_koperasi = mysqli_real_escape_string($koneksi, $alamat_koperasi);
    $no_hukum = mysqli_real_escape_string($koneksi, $no_hukum);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $nomor_telepon);
    $email = mysqli_real_escape_string($koneksi, $email);

    // Cek apakah ada file gambar yang di-upload
    $gambar = $_FILES['gambar']['name'];
    if ($gambar) {
        // Jika ada gambar baru, upload gambar tersebut
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_name = time() . '_' . $gambar;
        $gambar_path = "../img/" . $gambar_name;

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Jika upload berhasil, update gambar koperasi
            $query = "UPDATE koperasi SET 
                        nama_koperasi = '$nama_koperasi',
                        alamat_koperasi = '$alamat_koperasi',
                        no_hukum = '$no_hukum',
                        nomor_telepon = '$nomor_telepon',
                        email = '$email',
                        gambar = '$gambar_name'
                    WHERE id_koperasi = '$id_koperasi'";
        } else {
            // Jika gagal upload gambar
            echo "Error uploading the image.";
            exit;
        }
    } else {
        // Jika tidak ada gambar yang di-upload, update tanpa gambar
        $query = "UPDATE koperasi SET 
                    nama_koperasi = '$nama_koperasi',
                    alamat_koperasi = '$alamat_koperasi',
                    no_hukum = '$no_hukum',
                    nomor_telepon = '$nomor_telepon',
                    email = '$email'
                WHERE id_koperasi = '$id_koperasi'";
    }

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect jika berhasil
        header("location: koperasi.php?status=success");
    } else {
        // Jika ada error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada id_koperasi
    echo "ID Koperasi tidak ditemukan.";
}
?>
