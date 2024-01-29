<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Long's Caffe</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js">
    </script>




</head>

<body>
    <!-- Navbar -->
    <div class="sticky-top">
        <?php include "navbar.php"; ?>

    </div>
    <!-- End Navbar -->
    <div class="container-lg">
        <div class="row">
            <!-- Side Bar -->

            <?php include "sidebar.php"; ?>

            <!-- End Siderbar -->

            <!-- Content -->
            <?php
                include $page;
            ?>
            <!-- End Content -->
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        var otomatis = setInterval(
            function () {
                $('#div').load('isi.php').fadeIn("slow");
            }, 1000);
    </script>
</body>


</html>