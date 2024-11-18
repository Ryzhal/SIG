<?php

// Setelah login berhasil, misalnya di login.php
session_start();



?>



<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <img style="height: 50px;  " src="<?= $main_url?>img/unipol2.png" alt="Unipol" class="ps-3">
           <img style="height: 50px;  " src="<?= $main_url?>img/soppeng.png" alt="" class="ps-3">
            <!-- Sidebar Toggle-->
            <button class="ps-4 btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <h4 class="text-white " style="padding-left: 100px; padding-right:100px;"><marquee behavior="" direction="">SISTEM INFORMASI GEOGRAFIS PEMETAAN KOPERASI DI KABUPATEN SOPPENG</marquee></h4>
            <!-- Navbar Search-->
            
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <span class="text-white text-capitalize"> <?= $_SESSION["ssUser"] ?></span>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= $main_url?>logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>