<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_level = $_POST['id_level'];
// update data ke database
mysqli_query($koneksi,"update tb_petugas set nama_petugas='$nama_petugas',username='$username',password='$password',id_level='$id_level' where id_petugas='$id_petugas'");

// mengalihkan halaman kembali ke index.php
header("location:petugas.php?info=update");

?>