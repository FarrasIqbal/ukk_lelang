<?php
include '../layouts/header.php';
?>

<div class="container-lg">
    <div class="row">
        <?php include '../layouts/sidebar_admin_petugas.php'; ?>

        <div class="col-lg-10  mt-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Selamat Datang di Aplikasi Pelelangan Daring, Admin!</h6>
                    <p class="card-text">Lihat Data Petugas di tombol bawah ini</p>
                    <a href="petugas.php" class="btn btn-primary"><i class="fas fa-users"></i> Petugas</a>
                </div>
            </div>
        </div>
    </div>
</div>