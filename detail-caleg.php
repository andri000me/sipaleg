<?php
  session_start();
  require "functions.php";
  $login = sessionChecker();

  $nocaleg = htmlspecialchars($_GET['caleg']);

  $caleg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_data_caleg WHERE id='$nocaleg'"));
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DETAIL CALON ANGGOTA LEGISLATIF</title>
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
                    <?php if ($login != 1) : ?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="login">LOGIN</a></li>
                    <?php else : ?>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="logout">LOGOUT</a></li>
                    <?php endif; ?>
                </ul>
        </div>
        </div>
    </nav>
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">DETAIL CALON ANGGOTA LEGISLATIF</h2>
                    <p>Berikut merupakan daftar riwayat hidup setiap calon anggota legislatif</p>
                </div>
                <div class="block-content">
                    <div class="clean-blog-post">
                        <div class="row">
                            <div class="col-lg-5"><img class="rounded img-fluid" src="assets/img/caleg/<?= $caleg['foto'] ?>"></div>
                            <div class="col-lg-7">
                                <h3>Calon Anggota Legislatif No <?= $_GET['caleg'] ?></h3>
                                <table border="0" cellpadding="10" >
                                  <tr>
                                    <td>Nama </td>
                                    <td>:</td>
                                    <td><?= $caleg['nama'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>Partai </td>
                                    <td>:</td>
                                    <?php $idpartai = $caleg['id_partai']; $partai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_partai WHERE id='$idpartai'")); ?>
                                    <td><?= $partai['nama_partai'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>Visi </td>
                                    <td>:</td>
                                    <td><?= $caleg['visi'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>Misi </td>
                                    <td>:</td>
                                    <td><?= $caleg['misi'] ?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
