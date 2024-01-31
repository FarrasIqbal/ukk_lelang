<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$id_lelang = $_POST['id_lelang'];
$penawaran_harga = $_POST['penawaran_harga'];

// menginput data ke database
mysqli_query($koneksi,"insert into history_lelang values('','$id_lelang','$id_barang','$id_user','$penawaran_harga')");

// mengalihkan halaman kembali ke index.php
header("location:penawaran.php?info=simpan");

?>