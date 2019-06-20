<?php
  session_start();
  require '../functions.php';

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin != 1){
    header("Location: login");
    exit;
  }

  $uname = $_SESSION['usernameAdmin'];
  $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'"));

  $jumlahCALEG = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_caleg"));

  $query1 = "SELECT * FROM tb_data_caleg WHERE tingkat_caleg='1'";
  $jumlahDPRRI = mysqli_num_rows(mysqli_query($conn, $query1));

  $query2 = "SELECT * FROM tb_data_caleg WHERE tingkat_caleg='2'";
  $jumlahDPRDP = mysqli_num_rows(mysqli_query($conn, $query2));

  $query3 = "SELECT * FROM tb_data_caleg WHERE tingkat_caleg='3'";
  $jumlahDPRDK = mysqli_num_rows(mysqli_query($conn, $query3));


  $partaiAll = mysqli_query($conn, "SELECT * FROM tb_partai");

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Welcome Admin | SIPALEG ADMIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- Graph CSS -->
  <link href="css/lines.css" rel='stylesheet' type='text/css' />
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- webfonts--->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <!---//webfonts--->
  <!-- Nav CSS -->
  <link href="css/custom.css" rel="stylesheet">
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: red; height: 60px;">
      <div class="navbar-header" style="margin-top: 5px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin SIPALEG</a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="../assets/img/admin/<?= $admin['foto_admin'] ?>"></a>
          <ul class="dropdown-menu">
            <li class="m_2"><a href="logout"><i class="fa fa-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
      <div class="navbar-default sidebar" role="navigation" style="top: 60px;">
        <div class="sidebar-nav navbar-collapse" style="margin-top: -15px;">
          <ul class="nav" id="side-menu">
            <li>
              <a href="index"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
            </li>
            <li>
              <br>
            </li>
            <li>
              <a href="data_caleg"><i class="fa fa-list fa-fw nav_icon"></i>Data Caleg</a>
            </li>
            <li>
              <a href="partai"><i class="fa fa-flag fa-fw nav_icon"></i>Data Partai</a>
            </li>
            <li>
              <a href="data_user"><i class="fa fa-user fa-fw nav_icon"></i>Data User</a>
            </li>
            <li>
              <a href="data_admin"><i class="fa fa-user fa-fw nav_icon"></i>Data Admin</a>
            </li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
      <div class="graphs">
        <div class="col_3">
          <i class="label-primary icon-rounded" style="background-color: rgb(0, 200, 135); width: 150px; padding:7px;">&nbsp; Jumlah Calon Anggota Legislatif Terdaftar &nbsp;</i>
          <br>
        </div>
        <div class="col_3">
          <div class="col-md-3 widget widget">
            <div class="r3_counter_box">
              <i class="pull-left fa icon-rounded">RI</i>
              <div class="stats">
                <h5><strong><?= $jumlahDPRRI ?></strong></h5>
                <span>DPR Republik Indonesia</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget widget">
            <div class="r3_counter_box">
              <i class="pull-left fa user1 icon-rounded">Prov</i>
              <div class="stats">
                <h5><strong><?= $jumlahDPRDP ?></strong></h5>
                <span>DPRD Provinsi</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget widget">
            <div class="r3_counter_box">
              <i class="pull-left fa user2 icon-rounded">Kab</i>
              <div class="stats">
                <h5><strong><?= $jumlahDPRDK ?></strong></h5>
                <span>DPRD Kabupaten/Kota</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget">
            <div class="r3_counter_box">
              <i class="pull-left fa dollar1 icon-rounded">Total</i>
              <div class="stats">
                <h5><strong><?= $jumlahCALEG ?></strong></h5>
                <span>Total Calon Legislatif</span>
              </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="col_1">
          <div class="col-md-4 stats-info">
            <div class="panel-heading">
              <h3 class="panel-title">
                <i class="label-primary icon-rounded" style="font-size: 20px; background-color: rgb(0, 100, 255); width: 150px; padding:7px;">&nbsp; Jumlah Caleg per Partai &nbsp;</i>
              </h3>
            </div>
            <div class="panel-body">
              <ul class="list-unstyled">
                <?php foreach ($partaiAll as $partai) :?>
                  <?php $idPartai = $partai['id']; $JumlahCalegPartai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_caleg WHERE id_partai='$idPartai'")); ?>
                  <li style="text-transform: capitalize;"><?= $partai['id'] ?>. <?= $partai['nama_partai'] ?><div class="text-success pull-right"><?= $JumlahCalegPartai ?></div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="clearfix"> </div>
      <div class="copy" style="bottom=0;">
        <p> Copyright Reserved © 2019 Suko - SIPALEG</p>
      </div>
      <div class="text-center w-full">
        <a class="txt1" href="../">
          Back to Website
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </div>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
