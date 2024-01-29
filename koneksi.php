<?php 
error_reporting(0);
$koneksi = mysqli_connect("localhost","root","","db_lelang1");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>