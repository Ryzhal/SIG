<?php

include_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGIS</title>
    <link rel="stylesheet" href="login.css">
    <!-- SCRIPT LEAFLET -->
    <link rel="stylesheet" href="<?= $main_url?>leaflet/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="leaflet/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="img/unipol2.png" alt="WebGIS Logo">
            <img src="img/soppeng.png" alt="WebGIS Logo">
        </div>
       
        <form method="POST" action="log.php">
        <div class="login">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" id="login" name="login">Login</button>
        </div>
    </form>
    </nav>

    <!-- Content -->
    <section id="Home" class="hero">
        <h2>SELAMAT DATANG DI SISTEM INFORMASI GEOGRAFIS</h2>
        <h2>TEKNIK INFORMATIKA</h2>
        <h2>UNIVERSITAS LAMAPPAPOLEONRO</h2>
        <img class="midimg" src="img/unipol2.png" alt="WebGIS Logo">
        <p>Explore maps and data seamlessly.</p>
    </section>

</body>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <marquee behavior="" direction=""><p>&copy; 2024 WebGIS. Ryz - TEKNIK INFORMATIKA.</p> </marquee>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
        </ul>
    </div>
</footer>

</html>
