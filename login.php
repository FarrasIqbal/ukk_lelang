<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Lelang | Develop by Farras</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="layouts/style.css"> -->
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <style>
        body {
            margin-top: 150px;
            background-color: slategrey;

        }

        .container {
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
            width: 100%;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }



        .card-columns .card {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 576px) {
            .card-columns {
                column-count: 3;
                column-gap: 1.25rem;
            }

            .card-columns .card {
                display: inline-block;
                width: 100%;
            }
        }

        .text-muted {
            color: #9faecb !important;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .input-group {
            position: relative;
            display: flex;
            width: 100%;
        }
    </style>





</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login Admin</h1>
                            <?php
                            if (isset($_GET['info'])) {
                            if ($_GET['info'] == "gagal") { ?>
                            <script>
                                swal("Username atau Password salah", "Login tidak valid!", "error");
                            </script>
                            <?php } else if ($_GET['info'] == "logout") { ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Terima Kasih</h5>
                                Anda telah berhasil logout
                            </div>
                            <?php } else if ($_GET['info'] == "login") { ?>
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-info"></i> Mohon Maaf</h5>
                                Anda harus login terlebih dahulu
                            </div>
                            <?php }
                              } ?>
                            <p class="text-muted">Sign In to your account</p>
                            <form action="proseslog/cek_login_petugas.php" method="POST">

                                <div class="input-group mb-3">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" placeholder="Username" name="username"
                                        required>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">Login</button>
                                    </div>


                            </form>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="index.php">Login masyarakat!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>E-Lelang</h2>
                            <div class="mt-3">
                                    <img src="assets/logorm.png" alt="Logo"  style="max-width: 100%; max-height: 100px; height: auto;">
                                </div>
                            <p>Silhakan login sesuai dengan username dan password yang anda punya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>