<?php
  session_start();
  require "functions.php";
  $login = sessionChecker();
  if ($login == 1) {
    $uname = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM tb_data_caleg WHERE username='$uname'");
    $getDaftar = mysqli_num_rows($result);
    $dataCaleg = mysqli_fetch_assoc($result);
  }

  $calegs = mysqli_query($conn, "SELECT * FROM tb_data_caleg");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DAFTAR NAMA CALEG TERDAFTAR</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="daftar-caleg">DAFTAR CALEG</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="polling">POLlING</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="polling-result">HASIL POlLING</a></li> -->
                    <?php if ($login != 1) : ?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="login">LOGIN</a></li>
                    <?php else : ?>
                    <li class="nav-item dropdown" role="presentation">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"
                        style="text-decoration: none; color: black;">
                            <img src="assets/img/caleg/<?= $dataCaleg['foto'] ?>"
                                style="border-radius: 50%; width: 50px; height : 50px;">
                        </a>
                        <ul class="dropdown-menu">
                            <li class="m_2"><a href="profile" class="nav-link"><i class="icon-user icon"></i> Profile</a></li>
                            <li class="m_2"><a href="profile?edit" class="nav-link"><i class="icon-user-following icon"></i> Edit Profile</a></li>
                            <li class="m_2"><a href="logout" class="nav-link"><i class="icon-lock icon"></i> Logout</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
        </div>
        </div>
    </nav>
    <main class="page service-page">
        <section class="clean-block clean-services dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info text-danger">DAFTAR &nbsp; NAMA &nbsp;CALEG</h2>
                    <p>Berikut Nama CALEG Yang Terdaftar di SIPALEG Beserta Visi Dan Misi Masing-Masing CALEG. Silahkan Dibaca Untuk Mengetahui Lebih Dalam Profil Setiap CALEG.</p>
                </div>
                <div class="row">
                  <?php foreach ($calegs as $caleg) :?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><img class="card-img-top w-100 d-block" style="max-height: 200px;" src="assets/img/caleg/<?= $caleg['foto'] ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?= $caleg['nama'] ?></h4>
                                <?php $idpartai = $caleg['id_partai']; $partai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_partai WHERE id='$idpartai'")); ?>
                                <p class="card-text text-danger"><?= $partai['nama_partai'] ?></p>
                                <p class="card-text">VISI : <?= $caleg['visi'] ?></p>
                                <p class="card-text">MISI : <?= $caleg['misi'] ?></p>
                            </div>
                            <div><button class="btn btn-outline-primary btn-sm" type="button"><a href="./detail-caleg?caleg=<?= $caleg['id'] ?>">View More</a></button></div>
                        </div>
                    </div>
                  <?php endforeach; ?>
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
