<?php
include '../layouts/header.php';
?>

<div class="container-lg">
    <div class="row">
        <?php include '../layouts/sidebar_admin_petugas.php'; ?>
        <div class="col-lg-10 mt-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Petugas</span>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                        data-bs-target="#modal-tambah">
                        <i class="fas fa-plus"></i> Tambah Petugas
                    </button>
                </div>
                <div class="table-responsive">
                <?php
                    if (isset($_GET['info'])) {
                        if ($_GET['info'] == "hapus") { ?>
                    <script>
                        swal("Petugas Berhasil DiHapus", "", "success");
                    </script>
                    <?php } else if ($_GET['info'] == "simpan") { ?>
                    <script>
                        swal("Petugas Berhasil Ditambahkan", "", "success");
                    </script>
                    <?php } else if ($_GET['info'] == "update") { ?>
                    <script>
                        swal("Petugas Berhasil Di Updated", "", "success");
                    </script>
                    <?php }
              } ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                  $no = 1;
                  include "../koneksi.php";
                  $tb_petugas    = mysqli_query($koneksi, "SELECT * FROM tb_petugas INNER JOIN tb_level ON tb_petugas.id_level=tb_level.id_level");
                  while ($d_tb_petugas = mysqli_fetch_array($tb_petugas)) {
                  ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $d_tb_petugas['nama_petugas'] ?></td>
                                <td><?= $d_tb_petugas['username'] ?></td>
                                <td><?= $d_tb_petugas['level'] ?></td>
                                <td>
                                    <?php if ($_SESSION['username'] == $d_tb_petugas['username']) { ?>
                                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#modal-ubah<?php echo $d_tb_petugas['id_petugas']; ?>">
                                        <i class="fas fa-edit"></i> Ubah
                                    </button>
                                    <?php } else { ?>
                                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#modal-ubah<?php echo $d_tb_petugas['id_petugas']; ?>">
                                        <i class="fas fa-edit"></i> Ubah
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modal-hapus<?php echo $d_tb_petugas['id_petugas']; ?>">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-hapus<?php echo $d_tb_petugas['id_petugas']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Petugas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin akan menghapus data
                                                    <b><?= $d_tb_petugas['nama_petugas'] ?></b> !!!</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Tutup</button>
                                                <a href="hapus_petugas.php?id_petugas=<?php echo $d_tb_petugas['id_petugas']; ?>"
                                                    class="btn btn-primary">Hapus</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <div class="modal fade" id="modal-ubah<?php echo $d_tb_petugas['id_petugas']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Petugas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="update_petugas.php">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Petugas</label>
                                                    <input type="text" name="id_petugas"
                                                        value="<?php echo $d_tb_petugas['id_petugas']; ?>" hidden>
                                                    <input type="text" class="form-control" name="nama_petugas"
                                                        value="<?php echo $d_tb_petugas['nama_petugas']; ?>"
                                                        placeholder="Masukkan Nama Petugas" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="username" class="form-control" name="username"
                                                        value="<?php echo $d_tb_petugas['username']; ?>"
                                                        placeholder="Masukkan Username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        value="<?php echo $d_tb_petugas['password']; ?>"
                                                        placeholder="Masukkan Password" required>
                                                    <i>
                                                        <font color="red">Abaikan jika password tidak di rubah *</font>
                                                    </i>
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select name="id_level" class="form-control select2"
                                                        style="width: 100%;">
                                                        <option disabled selected>~ Pilih Level ~</option>
                                                        <?php
                                  include "../koneksi.php";
                                  $tb_level    = mysqli_query($koneksi, "SELECT * FROM tb_level");
                                  while ($d_tb_level = mysqli_fetch_array($tb_level)) {
                                  ?>
                                                        <option value="<?= $d_tb_level['id_level'] ?>" <?php if ($d_tb_level['id_level'] == $d_tb_petugas['id_level']) {
                                                                                    echo 'selected';
                                                                                  } ?>><?= $d_tb_level['level'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <?php } ?>

                            <div class="modal fade" id="modal-tambah">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Petugas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="simpan_petugas.php">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Petugas</label>
                                                    <input type="text" class="form-control" name="nama_petugas"
                                                        placeholder="Masukkan Nama Petugas" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="username" class="form-control" name="username"
                                                        placeholder="Masukkan Username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Masukkan Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="form-control" name="id_level" required>
                                                        <option value="">~ Pilih Level ~</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Petugas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
 include '../layouts/footer.php';
?>