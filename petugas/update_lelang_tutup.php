<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_lelang = $_POST['id_lelang'];
$status = $_POST['status'];
$id_user = $_POST['id_user'];
$harga_akhir = $_POST['harga_akhir'];
// update data ke database
mysqli_query($koneksi,"update tb_lelang set status='$status', id_user='$id_user', harga_akhir='$harga_akhir' where id_lelang='$id_lelang'");

// mengalihkan halaman kembali ke index.php
header("location:aktivasi.php?info=update");

?>