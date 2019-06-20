<?php
  session_start();
  require "functions.php";

  $login = sessionChecker();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIPALEG - Sistem Pendaftaran Calon Legislatif</title>
    <meta name="description" content="Pendaftaran, Informasi, dan Poling CALEG">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/"
                style="font-weight: bold;font-size: 38px;">SIPALEG</a><button class="navbar-toggler"
                data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pendaftaran">PENDAFTARAN</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-caleg">DAFTAR
                            CALEG</a></li>
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
    <main class="page landing-page">
        <section class="clean-block clean-hero"
            style="background-image: url(&quot;assets/img/pemilu/pemilu2.jpg&quot;);color: rgba(190, 0, 0, 0.85);">
            <div class="text">
                <h2>SISTEM PENDAFTARAN CALON LEGISLATIF</h2>
                <p>Situs pendaftaran, Informasi, dan Poling Calon Legislatif</p><button
                    class="btn btn-outline-light btn-lg" type="button">Tampilkan</button>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><i class="icon-info"></i>&nbsp;Informasi Pendaftaran</h2>
                    <p>Calon Legislatif yang ingin mendaftar harus melakukan perlengkapan berkas sehingga sesuai dengan
                        syarat daftar.</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="assets/img/pemilu/pemilu-2019.jpg"></div>
                    <div class="col-md-6">
                        <h3>Pendaftaran Calon Legislatif 2019</h3>
                        <div class="getting-started-info">
                            <p>Syarat Pendaftar CALEG :<br>1. Berumur diatas 25 tahun<br>2. Berasal dari partai
                                pengusung terdaftar.<br>3. Sehat jasmani dan rohani<br>4. Mengisi berkas yang
                                dibutuhkan.</p>
                        </div><button class="btn btn-outline-primary btn-lg" type="button"><a
                                href="./pendaftaran">DAFTAR SEKARANG</a></button>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><i class="icon-wrench"></i>&nbsp;Fitur SIPALEG</h2>
                    <p>SIPALEG memiliki fitur untuk memenuhi pelayanan agar rakyat lebih mengenal calon legislatif.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-user-following icon"></i>
                        <h4>Pendaftaran</h4>
                        <p>Calon Legislatif dapat melakukan pendaftaran dengan mengisi form pada menu ini dan
                            mengirimkan berkas pemenuhan syarat.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-note icon"></i>
                        <h4>Polling</h4>
                        <p>Pengguna SIPALEG dapat melakukan poling pada menu ini sehingga dapat diketahui elektabilitas
                            dari caleg terdaftar.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-people icon"></i>
                        <h4>Daftar Caleg</h4>
                        <p>Pengguna SIPALEG dapat melihat daftar caleg yang terdaftar sehingga dapat melihat visi misi
                            dari caleg tersebut.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pie-chart icon"></i>
                        <h4>Hasil Polling</h4>
                        <p>Pengguna dapat melihat hasil elektabilitas dari caleg terdaftar pada menu ini sehingga dapat
                            diketahui caleg yang elektabilitasnya tinggi.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">&nbsp;DAFTAR PARTAI TERDAFTAR</h2>
                    <p>Berikut beberapa partai yang berpartisipasi pada pemilihan CALEG.</p>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/partai/1_pkb.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/2_gerindra.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/3_pdip.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/4_golkar.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/5_nasdem.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/6_garuda.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/7_berkarya.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/8_pks.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/9_perindo.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/10_ppp.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/11_psi.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/12_pan.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/13_hanura.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/14_demokrat.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/15_pbb.jpg"
                                alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/partai/16_pkp.jpg"
                                alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                                class="carousel-control-prev-icon" style="background-color: #000000;"></span><span
                                class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                            role="button" data-slide="next"><span class="carousel-control-next-icon"
                                style="background-color: #000000;"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                        <li data-target="#carousel-1" data-slide-to="3"></li>
                        <li data-target="#carousel-1" data-slide-to="4"></li>
                        <li data-target="#carousel-1" data-slide-to="5"></li>
                        <li data-target="#carousel-1" data-slide-to="6"></li>
                        <li data-target="#carousel-1" data-slide-to="7"></li>
                        <li data-target="#carousel-1" data-slide-to="8"></li>
                        <li data-target="#carousel-1" data-slide-to="9"></li>
                        <li data-target="#carousel-1" data-slide-to="10"></li>
                        <li data-target="#carousel-1" data-slide-to="11"></li>
                        <li data-target="#carousel-1" data-slide-to="12"></li>
                        <li data-target="#carousel-1" data-slide-to="13"></li>
                        <li data-target="#carousel-1" data-slide-to="14"></li>
                        <li data-target="#carousel-1" data-slide-to="15"></li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><i class="icon-user"></i>&nbsp;Admin Website</h2>
                    <p>Sitti Suwaibah (170411100009)<br>Wijanarko Putra Rajeb (170411100061)</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block"
                                src="assets/img/avatars/admin1.png">
                            <div class="card-body info">
                                <h4 class="card-title">Sitti Suwaibah</h4>
                                <p class="card-text">170411100009</p>
                                <div class="icons"><a href="http://facebook.com/sitti"><i
                                            class="icon-social-facebook"></i></a><a href="http://instagram.com/sitti"><i
                                            class="icon-social-instagram"></i></a><a href="http://twtter.com/sitti"><i
                                            class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block"
                                src="assets/img/avatars/admin2.png">
                            <div class="card-body info">
                                <h4 class="card-title">Wijanarko Putra Rajeb</h4>
                                <p class="card-text">170411100061</p>
                                <div class="icons"><a href="http://facebook.com/wijanarko.rajeb"><i
                                            class="icon-social-facebook"></i></a><a
                                        href="http://instagram.com/wprajeb"><i class="icon-social-instagram"></i></a><a
                                        href="http://twtter.com/putra_rajeb"><i class="icon-social-twitter"></i></a>
                                </div>
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
                        <?php if ($login != 1) : ?>
                        <li><a href="#">Daftar</a></li>
                        <li><a href="#">Masuk</a></li>
                        <?php endif; ?>
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
                        <?php if ($login == 1) : ?>
                        <li><a href="#">Hapus Akun</a></li>
                        <?php endif; ?>
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
