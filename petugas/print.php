<?php
include '../layouts/header.php';
?>

<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <!-- /.col-md-6 -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col-lg-12 text-center">
              <h5 class="m-0"> Laporan Hasil Lelang Daring</h5>
            </div>
          </div>
          <div class="card-body">
            <?php
            if (isset($_GET['info'])) {
              if ($_GET['info'] == "hapus") { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-trash"></i> Sukses</h5>
                  Data berhasil di hapus
                </div>
              <?php } else if ($_GET['info'] == "simpan") { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses</h5>
                  Data berhasil di simpan
                </div>
              <?php } else if ($_GET['info'] == "update") { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-edit"></i> Sukses</h5>
                  Data berhasil di update
                </div>
            <?php }
            } ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Tanggal Lelang</th>
                  <th>Pemenang Lelang</th>
                  <th>Harga Tertinggi</th>
                  <th>Status Lelang</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                include "../koneksi.php";
                $tb_lelang    = mysqli_query($koneksi, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas ");
                while ($d_tb_lelang = mysqli_fetch_array($tb_lelang)) {
                  $harga_tertinggi = mysqli_query($koneksi, "select max(penawaran_harga) as penawaran_harga FROM history_lelang where id_lelang='$d_tb_lelang[id_lelang]'");
                  $harga_tertinggi = mysqli_fetch_array($harga_tertinggi);
                  $d_harga_tertinggi = $harga_tertinggi['penawaran_harga'];
                  $pemenang = mysqli_query($koneksi, "SELECT * FROM history_lelang where penawaran_harga='$harga_tertinggi[penawaran_harga]'");
                  $d_pemenang = mysqli_fetch_array($pemenang);
                  if ($d_pemenang != null) {
                    $tb_masyarakat = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where id_user='$d_pemenang[id_user]'");
                  }
                  if ($d_pemenang != null) {
                    $d_tb_masyarakat = mysqli_fetch_array($tb_masyarakat);
                  }
                ?>
                  <?php
                  if ($d_tb_lelang['status'] == 'dibuka') { ?>
                  <?php } else { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?= $d_tb_lelang['nama_barang'] ?></td>
                      <td><?= $d_tb_lelang['tgl_lelang'] ?></td>
                      <td><?php if ($d_harga_tertinggi == 0 || $d_harga_tertinggi == null) { ?>
                          Belum ada Pemenang
                        <?php } else { ?>
                          <?= $d_tb_masyarakat['nama_lengkap'] ?? null ?>
                        <?php } ?></td>
                      <td>Rp. <?= number_format($d_harga_tertinggi) ?></td>
                      <td>
                        <?php if ($d_tb_lelang['status'] == '') { ?>
                          <div class="btn btn-warning btn-sm">Lelang Belum Aktif</div>
                        <?php } else if ($d_tb_lelang['status'] == 'dibuka') { ?>
                          <div class="btn btn-success btn-sm">Lelang Dibuka</div>
                        <?php } else { ?>
                          <div class="btn btn-success btn-sm">Lelang Selesai</div>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  <div class="modal fade" id="modal-buka<?php echo $d_tb_lelang['id_lelang']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Aktivasi Buka Lelang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="update_lelang_buka.php">
                          <div class="modal-body">
                            <p>Apakah anda ingin membuka lelang...?</p>
                            <div class="form-group">
                              <input type="text" class="form-control" value="dibuka" name="status" hidden="">
                              <input type="text" class="form-control" value="<?php echo $d_tb_lelang['id_lelang']; ?>" name="id_lelang" hidden="">
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                  <div class="modal fade" id="modal-tutup<?php echo $d_tb_lelang['id_lelang']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Aktivasi Tutup Lelang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="update_lelang_tutup.php">
                          <div class="modal-body">
                            <p>Apakah Anda ingin menutup lelang...?</p>
                            <div class="form-group">
                              <input type="text" class="form-control" value="ditutup" name="status" hidden="">
                              <input type="text" class="form-control" value="<?php echo $d_tb_lelang['id_lelang']; ?>" name="id_lelang" hidden="">
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                <?php } ?>
              </tbody>
            </table>
            <div class="modal fade" id="modal-tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Lelang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="simpan_lelang.php">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" class="form-control select2" style="width: 100%;">
                          <option disabled selected>--- Pilih Barang ---</option>
                          <?php
                          include "../koneksi.php";
                          $tb_barang    = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                          while ($d_tb_barang = mysqli_fetch_array($tb_barang)) {
                          ?>
                            <option value="<?php echo $d_tb_barang['id_barang']; ?>"><?php echo $d_tb_barang['nama_barang']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <?php
                        include "../koneksi.php";
                        $tb_petugas    = mysqli_query($koneksi, "SELECT * FROM tb_petugas where username='$_SESSION[username]'");
                        while ($d_tb_petugas = mysqli_fetch_array($tb_petugas)) {
                        ?>
                          <input type="text" class="form-control" value="<?php echo $d_tb_petugas['id_petugas']; ?>" name="id_petugas" hidden>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<script>
  window.print();
</script>
<!-- /.content-wrapper -->
<?php
?>