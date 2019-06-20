<?php
  session_start();
  require "functions.php";

  $login = sessionChecker();

  if ($login == 1){
    header("location: index");
    exit;
  }

  if (isset($_POST['register'])) {
    if (register($_POST) > 0){
      echo "
        <script>
          alert('Data berhasil di tambahkan.');
          location.href = 'login';
        </script>
      ";
    }
  }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register Member - SIPALEG</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/" style="font-weight: bold;font-size: 38px;">SIPALEG</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pendaftaran">PENDAFTARAN</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-caleg">DAFTAR CALEG</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="polling">POLlING</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="polling-result">HASIL POlLING</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login">LOGIN</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-danger" style="color: rgb(255,0,0);font-weight: normal;">Register Akun</h2>
                    <p>Daftar agar bisa menjadi member SIPALEG</p>
                </div>
                <form class="border-danger" method="POST" action="">
                    <div class="form-group"><label for="username">Username <span class="text-danger" id="username_info"><?= $uname_info?></span> </label><input class="form-control item" type="text" id="username" name="username" required></div>
                    <!-- <div class="form-group"><label for="nik">NIK</label><input class="form-control item" type="text" id="nik" name="nik"></div> -->
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" id="password" name="password" required></div>
                    <div class="form-group"><label for="password2">Password <span class="text-danger" id="password_info"><?= $pw_info?></span> </label><input class="form-control item" type="password" id="password2" name="password2" required></div>
                    <div class="form-group"><label for="email">Email&nbsp; <span id="email_info"></span> </label><input class="form-control item" type="email" id="email" name="email" required></div>
                    <button class="btn btn-primary btn-block" type="submit" name="register" style="background-color: rgb(255,46,0);width: 50%;margin-left: 25%;">Register</button>
                    <p
                        style="margin-top: 5%;">Sudah memiliki akun ? Masuk &nbsp;<a href="login" style="color: rgb(234,52,52);font-weight: bold;">kesini</a></p>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Mulai Aja dulu</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Daftar</a></li>
                        <li><a href="#">Masuk</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Tentang Kami</h5>
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#">Sitti Suwaibah</a></li>
                        <li><a href="#">Wijanarko Putra Rajeb</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Dukungan Pengguna</h5>
                    <ul>
                        <li><a href="#">Hapus Akun</a></li>
                        <li><a href="#">Kritik dan Saran</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Laporan</h5>
                    <ul>
                        <li><a href="#">Pelanggaran</a></li>
                        <li><a href="#">Daftar Pelanggaran</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>Copyright Reserved © 2018 Suko - SIPALEG</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
