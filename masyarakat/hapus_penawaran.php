<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id_history = $_GET['id_history'];


// menghapus data dari database
mysqli_query($koneksi,"delete from history_lelang where id_history='$id_history'");

// mengalihkan halaman kembali ke index.php
header("location:penawaran.php?info=hapus");

?>