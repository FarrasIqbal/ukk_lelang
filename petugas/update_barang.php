<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];
// update data ke database
mysqli_query($koneksi,"update tb_barang set nama_barang='$nama_barang',tgl='$tgl',harga_awal='$harga_awal',deskripsi_barang='$deskripsi_barang' where id_barang='$id_barang'");

// mengalihkan halaman kembali ke index.php
header("location:barang.php?info=update");

?>