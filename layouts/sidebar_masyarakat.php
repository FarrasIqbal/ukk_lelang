<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../index.php?info=login");
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
                        <li class="nav-item">
                            <a class="nav-link ps-2 " aria-current="page" href="index.php"><i class="fas fa-home"></i>
                                Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="penawaran.php"><i
                                    class="fas fa-money-bill-wave-alt"></i> Penawaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" aria-current="page" href="lelang.php"><i
                                    class="fas fa-shopping-cart"></i> Lelang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>