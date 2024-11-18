<?php

session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../login.php");
    exit;
}

include_once "../config.php";

$title = "LOKASI 2 KOPERASI";
include_once "../template/header.php";
include_once "../template/navbar.php";
include_once "../template/sidebar.php";

// Ambil ID koperasi dari URL
$id_koperasi = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mendapatkan data koperasi dan anggota dengan jabatan
$query = "
    SELECT koperasi.*, anggota.nm_anggota, anggota.id_jabatan, jabatan.nama_jabatan, kecamatan.nama_kecamatan, 
           jenis_koperasi.nama_jenis, lokasi.latitude, lokasi.longitude
    FROM koperasi
    LEFT JOIN kecamatan ON koperasi.id_kecamatan = kecamatan.id_kecamatan
    LEFT JOIN jenis_koperasi ON koperasi.id_jenis = jenis_koperasi.id_jenis
    LEFT JOIN lokasi ON koperasi.id_koperasi = lokasi.id_koperasi
    LEFT JOIN anggota ON koperasi.id_koperasi = anggota.id_koperasi
    LEFT JOIN jabatan ON anggota.id_jabatan = jabatan.id_jabatan
    WHERE koperasi.id_koperasi = ?
";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_koperasi);
$stmt->execute();
$result = $stmt->get_result();

// Pastikan ada data koperasi yang ditemukan
if ($row = $result->fetch_assoc()) {
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $nama_koperasi = $row['nama_koperasi'];
} else {
    // Jika koperasi tidak ditemukan, beri pesan atau redirect
    echo "<p>Koperasi tidak ditemukan.</p>";
    exit;
}

?>

<div id="layoutSidenav_content">
<main>
        <h1 align="center" style="margin-top: -40px;">DATA KOPERASI</h1><hr style="margin-top: -5px;">
 
    <!-- Membuat Row dengan dua Kolom -->
    <div class="row">
        <!-- Kolom untuk Map -->
        <div class="col-md-5">
            <div id="map" style="width: 100%; height: 400px; margin-left:15px; "></div>
        </div>

        <!-- Kolom untuk Card -->
        <div class="col-md-7" >
            <div class="card mt-4">
                <div class="card-header">
                    DATA KOPERASI
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                <table style="margin-left: 10px;">
                    <tr>
                        <td width="150px">NAMA KOPERASI</td>
                        <td >:</td>
                        <td><?php echo $row['nama_koperasi']; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">KETUA</td>
                        <td >:</td>
                        <td><?php echo $row['nm_anggota']; ?></td>
                    </tr>
                    <tr>
                        <td>ALAMAT KOPERASI</td>
                        <td>:</td>
                        <td><?php echo $row['alamat_koperasi']; ?></td>
                    </tr>
                    <tr>
                        <td>KECAMATAN</td>
                        <td>:</td>
                        <td><?php echo $row['nama_kecamatan']; ?></td>
                    </tr>
                    <tr>
                        <td>JENIS KOPERASI</td>
                        <td>:</td>
                        <td><?php echo $row['nama_jenis']; ?></td>
                    </tr>
                    <tr>
                        <td>NO HUKUM</td>
                        <td>:</td>
                        <td><?php echo $row['no_hukum']; ?></td>
                    </tr>
                    <tr>
                        <td>TELEPON</td>
                        <td>:</td>
                        <td><?php echo $row['nomor_telepon']; ?></td>
                    </tr>
                    <tr>
                        <td>EMAIL</td>
                        <td>:</td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                </table>
    
                </div>
            </div>
        </div>
    </div>

    <script>
        const map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 9);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Membuat ikon kustom
        var customIcon = L.icon({
            iconUrl: '<?= $main_url?>img/kop/favicon.ico',
            iconSize: [30, 30],
            iconAnchor: [19, 38],
            popupAnchor: [0, -38]
        });

        // Menambahkan marker untuk koperasi yang ditemukan
        var marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>], { icon: customIcon })
            .bindPopup(
                "<b><?php echo $nama_koperasi; ?></b><br>" +
                "<img src='../img/<?php echo $row['gambar']; ?>' alt='Gambar Koperasi Beringin' width='300px' height='150px'><br>" +
                "<a href='https://www.google.com/maps/place/<?php echo $latitude; ?>,<?php echo $longitude; ?>' target='_blank'>Lihat di Google Maps</a>"
            )
            .addTo(map);
    </script>
     </main>

<?php
include_once "../template/footer.php";
?>
