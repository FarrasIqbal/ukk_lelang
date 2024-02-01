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
      <div class="card">

        <?php
                    if (isset($_GET['info'])) {
                        if ($_GET['info'] == "hapus") { ?>
        <script>
          swal("Data Berhasil DiHapus", "", "success");
        </script>
        <?php } else if ($_GET['info'] == "simpan") { ?>
        <script>
          swal("Berhasil Mengikuti Lelang", "Silahkan pantau data Real Time dibawah", "success");
        </script>
        <?php } else if ($_GET['info'] == "update") { ?>
        <script>
          swal("Data Berhasil Di Updated", "", "success");
        </script>
        <?php }
                         } ?>
        <div class="table-responsive">

          <!-- /.col-md-6 -->
          <div class="col-lg-12">

            <div class="card-header">
              <h5>Histori Penawaran</h5>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Tawaran Harga</th>
                    <th>Status Lelang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  include "../koneksi.php";
                  $history_lelang    = mysqli_query($koneksi, "SELECT * FROM history_lelang INNER JOIN tb_barang oN history_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_masyarakat oN history_lelang.id_user=tb_masyarakat.id_user INNER JOIN tb_lelang oN history_lelang.id_lelang=tb_lelang.id_lelang");
                  while ($d_history_lelang = mysqli_fetch_array($history_lelang)) {
                  ?>
                  <?php if ($d_history_lelang['username'] == $_SESSION['username']) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $d_history_lelang['nama_barang'] ?></td>
                    <td>Rp. <?= number_format($d_history_lelang['harga_awal']) ?></td>
                    <td>Rp. <?= number_format($d_history_lelang['penawaran_harga']) ?></td>
                    <td>
                      <?php if ($d_history_lelang['penawaran_harga'] == $d_history_lelang['harga_akhir']) { ?>
                      <div class="btn btn-success btn-block">Selamat Anda Memenangkan Lelang</div>
                      <?php } elseif ($d_history_lelang['penawaran_harga'] != $d_history_lelang['harga_akhir']) { ?>
                      <div class="btn btn-warning btn-block">Belum Ada Pemenang</div>
                      <?php } else  { ?>
                      <div class="btn btn-danger btn-block">Maaf Anda Kurang Beruntung</div>
                      <?php } ?>

                    </td>
                    <td>
                      <?php if ($d_history_lelang['status'] == 'dibuka') { ?>
                      <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#modal-ubah<?php echo $d_history_lelang['id_history']; ?>">
                        <i class="fas fa-edit"></i> Edit
                      </button>
                      <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#modal-hapus<?php echo $d_history_lelang['id_history']; ?>">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                      <?php } else { ?>
                      <?php } ?>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-hapus<?php echo $d_history_lelang['id_history']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Data Lelang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Akan Menghapus Data <b><?= $d_history_lelang['nama_barang'] ?></b>
                              !!!
                            </p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <a href="hapus_penawaran.php?id_history=<?php echo $d_history_lelang['id_history']; ?>"
                              class="btn btn-primary">Hapus</a>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                  <div class="modal fade" id="modal-ubah<?php echo $d_history_lelang['id_history']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Lelang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="update_penawaran.php">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="text" name="id_history"
                                value="<?php echo $d_history_lelang['id_history']; ?>" hidden>
                            </div>
                            <div class="form-group">
                              <label>Penawaran Harga</label>
                              <input type="number" class="form-control" name="penawaran_harga"
                                value="<?php echo $d_history_lelang['penawaran_harga']; ?>"
                                placeholder="Masukan Penawan Harga ...">
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
                  <?php } else { ?>
                  <?php }
                  } ?>
                </tbody>
              </table>
            </div>


          </div>

        </div>
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5>Data Real Time</h5>
          </div>
          <div class="card-body">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Peserta Lelang Tertinggi</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    include "../koneksi.php";
                    $tb_lelang    = mysqli_query($koneksi, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas");
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
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $d_tb_lelang['nama_barang'] ?></td>
                    <td><?php if ($d_harga_tertinggi == 0 || $d_harga_tertinggi == null) { ?>
                      Belum ada Pemenang
                      <?php } else { ?>
                      <?= $d_tb_masyarakat['nama_lengkap'] ?? null ?>
                      <?php } ?></td>
                    <td>Rp. <?= number_format($d_harga_tertinggi) ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
include '../layouts/footer.php';
?>