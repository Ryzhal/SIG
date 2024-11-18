<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">HOME</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class=" sb-sidenav-menu-heading">PETA</div>
                            <!-- Dropdown Peta -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="petaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                            Peta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="petaDropdown">
                            <li><a class="dropdown-item" href="<?= $main_url ?>sig/lokasi.php"><i class="fa-solid fa-map-location-dot"></i>  Location</a></li>
                            <li><a class="dropdown-item" href="<?= $main_url ?>sig/data-lokasi.php"><i class="fa-solid fa-map-location-dot"></i> Add Location</a></li>
                        </ul>
                    </div>
                    <hr class="mb-0">

                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <!-- Dropdown Admin -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="<?= $main_url ?>user/add-user.php"><i class="fa-solid fa-user"></i>  Tambah Akun</a></li>
                            <li><a class="dropdown-item" href="<?= $main_url ?>user/ganti-pass.php"><i class="fa-solid fa-user"></i>  Ganti Password</a></li>
                        </ul>
                    </div>
                    <hr class="mb-0">

                            <div class="sb-sidenav-menu-heading">KOPERASI</div>
                            <!-- Dropdown Koperasi -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="koperasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                            Koperasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="koperasiDropdown">
                            <li><a class="dropdown-item" href="<?= $main_url ?>koperasi/koperasi.php"><i class="fa-solid fa-database"></i> Input Koperasi</a></li>
                            <li><a class="dropdown-item" href="<?= $main_url ?>anggota/anggota.php"><i class="fa-solid fa-database"></i> Input Anggota Koperasi</a></li>
                        </ul>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <h3><?= $_SESSION["ssUser"] ?></h3>
                    </div>
                </nav>
            </div>