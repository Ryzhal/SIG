<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= $main_url?>asset/boot/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- SCRIPT LEAFLET -->
    <link rel="stylesheet" href="<?= $main_url?>leaflet/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="<?= $main_url?>leaflet/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <style>
         /* CSS untuk container dropdown dan button */
         .filter-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antar elemen */
            margin: 15px; /* Margin luar container */
        }

        /* CSS untuk elemen dropdown */
        #jenisKoperasiFilter {
            padding: 8px;
            font-size: 16px;
        }

        /* CSS untuk tombol */
        button {
            padding: 8px 15px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Styling untuk peta */
        #map {
            width: 100%;
            height: 600px;
        }
     </style>
    </head>