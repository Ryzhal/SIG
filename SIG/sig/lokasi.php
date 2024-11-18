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

// Mengambil daftar kecamatan untuk dropdown
$kecamatanQuery = "SELECT * FROM kecamatan";
$kecamatanResult = mysqli_query($koneksi, $kecamatanQuery);


// Mendapatkan kecamatan yang dipilih dari form
$selectedKecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';

// Menyiapkan query untuk mengambil data berdasarkan kecamatan yang dipilih
$query = "SELECT * FROM lokasi
JOIN koperasi ON lokasi.id_koperasi = koperasi.id_koperasi
JOIN jenis_koperasi ON koperasi.id_jenis = jenis_koperasi.id_jenis
JOIN kecamatan ON koperasi.id_kecamatan = kecamatan.id_kecamatan";

if ($selectedKecamatan) {
    $query .= " WHERE kecamatan.id_kecamatan = " . intval($selectedKecamatan);
}


$result = mysqli_query($koneksi, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">LOKASI KOPERASI</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a href="../index.php"> Dashboard </a></li>
                <li class="breadcrumb-item active">LOKASI KOPERASI</li>
            </ol>

            <!-- Form untuk memilih kecamatan -->
            <form method="POST" action="">
                <!-- <label for="kecamatan">Pilih Kecamatan:</label>
                <select name="kecamatan" id="kecamatan"> -->
                <div class="mb-2 row">
    <label for="kecamatan" class="col-sm-2 col-form-label">Pilih Kecamatan</label>
    <label for="" class="col-sm-1 col-form-label" style="margin-left: -40px;">:</label>
    <div class="col-sm-5" style="margin-left: -60px;">
        <select name="kecamatan" id="kecamatan" class="form-select">
            <option value="">-- Pilih Kecamatan --</option>
            <?php while ($kecamatan = mysqli_fetch_assoc($kecamatanResult)) { ?>
                <option value="<?php echo $kecamatan['id_kecamatan']; ?>" 
                    <?php echo ($selectedKecamatan == $kecamatan['id_kecamatan']) ? 'selected' : ''; ?>>
                    <?php echo $kecamatan['nama_kecamatan']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-1" style="margin-left: -20px;">
        <input class="btn btn-primary w-100" type="submit" value="Cari">
    </div>
</div>


    </main>
    <hr>

    <div id="map" style="width: 98%; margin-left:15px; height: 400px;"></div>
    <script>
        const map = L.map('map').setView([-4.351552912359528, 119.88921073095801], 19);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Membuat ikon kustom
        var customIcon = L.icon({
            iconUrl: '<?= $main_url?>img/kop/marker.png',
            iconSize: [40, 40],
            iconAnchor: [19, 38],
            popupAnchor: [0, -38]
        });

        // Jika ada hasil dari query
        <?php while ($row = $result->fetch_assoc()) { ?>
            var marker = L.marker([<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>], { icon: customIcon })
                .bindPopup(
                    "<b><?php echo $row['nama_koperasi']; ?></b><br>" +
                    "<p>Alamat: <?php echo $row['alamat_koperasi']; ?></p>" +
                    "<p>Kecamatan: <?php echo $row['nama_kecamatan']; ?></p>" +
                    "<p>Jenis Koperasi: <?php echo $row['nama_jenis']; ?></p>" +
                    "<p>No. Hukum: <?php echo $row['no_hukum']; ?></p>" +
                    "<p>Kontak: <?php echo $row['nomor_telepon']; ?></p>" +
                    "<p>Email: <?php echo $row['email']; ?></p>" +
                    "<img src='../img/<?php echo $row['gambar']; ?>' alt='Gambar Koperasi Beringin' width='300px' height='150px'><br>" +
                    "<hr>"+
                    "<div style='text-align: center;'>" +
                    "<button style='padding: 10px 20px; background-color: rgb(173,216,230);  color: black; border: 1;  cursor: pointer;' " +
                    "onclick='window.location.href=\"detail.php?id=<?php echo $row['id_koperasi']; ?>\";'>Lihat Detail</button><br>" +
                    "<br>"+
                    "<a href='https://www.google.com/maps/place/<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>' target='_blank'>Lihat di Google Maps</a>" +
                    "</div>" 
                )
                .addTo(map);
        <?php } ?>
        
    </script>
    <hr>
<?php
include_once "../template/footer.php";
?>
 