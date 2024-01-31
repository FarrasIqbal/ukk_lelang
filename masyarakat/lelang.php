<?php
include '../layouts/header.php';
?>

<style>
    a {
        text-decoration: none;
    }
</style>

<div class="container-lg">
    <div class="row">
        <?php include '../layouts/sidebar_masyarakat.php'; ?>
        <div class="col-lg-10 mt-2">

            <?php
            include "../koneksi.php";
            $tb_lelang = mysqli_query($koneksi, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas WHERE tb_lelang.status = 'dibuka'");
            $num_rows = mysqli_num_rows($tb_lelang);

            if ($num_rows > 0) {
                while ($d_tb_lelang = mysqli_fetch_array($tb_lelang)) {
            ?>

            <div class="row">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        </div>

                        <h3 class="profile-username text-center"><?= $d_tb_lelang['nama_barang'] ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tanggal</b> <a class="float-right"><?= $d_tb_lelang['tgl'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Harga Awal</b> <a class="float-right">Rp.
                                    <?= number_format($d_tb_lelang['harga_awal']) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Deskripsi Barang</b> <a
                                    class="float-right"><?= $d_tb_lelang['deskripsi_barang'] ?></a>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                                    data-target="#modal-tawar<?php echo $d_tb_lelang['id_lelang']; ?>"><b>Ikut
                                        Lelang</b></a>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-tawar<?php echo $d_tb_lelang['id_lelang']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Masukkan Jumlah Tawaran</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="simpan_penawaran.php">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" name="id_lelang"
                                                    value="<?php echo $d_tb_lelang['id_lelang']; ?>" hidden>
                                                <input type="text" name="id_barang"
                                                    value="<?php echo $d_tb_lelang['id_barang']; ?>" hidden>
                                            </div>
                                            <?php
                            include "../koneksi.php";
                            $tb_masyarakat    = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where username='$_SESSION[username]'");
                            while ($d_tb_masyarakat = mysqli_fetch_array($tb_masyarakat)) {
                            ?>
                                            <div class="form-group">
                                                <label>Nominal Tawaran</label>
                                                <input type="text" name="id_user"
                                                    value="<?php echo $d_tb_masyarakat['id_user']; ?>" hidden>
                                                <input type="number" class="form-control" name="penawaran_harga"
                                                    placeholder="Silakan Masukkan Tawaran Anda ..." min="0" required>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tawar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
            } else {
            ?>

            <div class="col-lg-10 mt-2 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="card-text text-lg"><B>Pemberitauhan</B></p>
                        <div class="alert alert-danger" role="alert">
                            Barang lelang belum tersedia!
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php
include '../layouts/footer.php';
?>