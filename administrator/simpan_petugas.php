<?php 
// koneksi database

include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];

// Menggunakan md5() untuk menghasilkan hash dari password
$password_hash = md5($password);

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tb_petugas VALUES('', '$nama_petugas', '$username', '$password_hash', '$id_level')");

// mengalihkan halaman kembali ke index.php
header("location:petugas.php?info=simpan");
?>
