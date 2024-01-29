<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$telp = $_POST['telp'];

if (preg_match('/^(?:\+62|08)[1-9][0-9]{7,11}$/', $telp)) {
    echo "Nomor telepon valid.";
  } else {
    echo "Nomor telepon tidak valid.";
  }

// menginput data ke database
mysqli_query($koneksi,"insert into tb_masyarakat values('','$nama_lengkap','$username','$password','$telp')");

// mengalihkan halaman kembali ke index.php
header("location:../index.php?info=daftar");

?>