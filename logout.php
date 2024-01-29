<?php 
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();
    setcookie("lelang", "", time() -1, "/");

// mengalihkan halaman ke halaman login
// echo "<script>
// alert('Logout telah berhasil!')
// setTimout(function() {
//     window.location = 'index.php?info=logout';
// }, 0);
// </script>";
header("Location: index.php?info=logout");

//header("location:index.php?info=logout");
?>