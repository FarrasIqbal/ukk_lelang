<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['id_level'] == "") {
  header("location:../login.php?info=login");
}
?>

<div class="col-lg-2">
    <nav class="navbar bg-body-tertiary navbar-expand-lg rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" style="width: 250px;" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard | E-Lelang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav justify-content-end flex-grow-1  flex-column nav-pills">
                        <?php if ($_SESSION['id_level'] == "1") { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active text-white ' : ''; ?>"
                                    aria-current="page" href="index.php"><i class="fas fa-home"></i> Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'barang.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="barang.php"><i class="fas fa-window-restore"></i> Pendataan
                                    Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'petugas.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="petugas.php"><i class="fas fa-users"></i> Data Petugas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'laporan.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="laporan.php"><i class="fas fa-flag"></i> Laporan</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="index.php"><i class="fas fa-home"></i> Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'barang.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="barang.php"><i class="fas fa-window-restore"></i> Pendataan
                                    Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'aktivasi.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="aktivasi.php"><i class="fas fa-chart-line"></i> Aktivitas
                                    Lelang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo basename($_SERVER['PHP_SELF']) == 'laporan.php' ? 'active text-white' : ''; ?>"
                                    aria-current="page" href="laporan.php"><i class="fas fa-flag"></i> Laporan</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
