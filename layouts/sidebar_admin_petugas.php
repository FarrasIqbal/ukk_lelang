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
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <ul class="navbar-nav nav justify-content-end flex-grow-1  flex-column nav-pills">
                    <?php if ($_SESSION['id_level'] == "1") { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 " aria-current="page" href="index.php"><i
                                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="menu"><i
                                    class="bi bi-basket-fill me-2"></i>Pendataan Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="order"><i
                                    class="bi bi-basket-fill me-2"></i>Data Petugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="customer"><i
                                    class="bi bi-person-video2 me-2"></i>Laporan</a>
                        </li>
                        <?php } else { ?>
                            <li class="nav-item">
                            <a class="nav-link ps-2 " aria-current="page" href="index.php"><i
                                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="barang.php"><i
                                    class="bi bi-basket-fill me-2"></i>Pendataan Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="aktivasi.php"><i
                                    class="bi bi-basket-fill me-2"></i>Aktivitas Lelang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="laporan.php"><i
                                    class="bi bi-person-video2 me-2"></i>Laporan</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>