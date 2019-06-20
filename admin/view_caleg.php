<?php
  session_start();
  require '../functions.php';
  $login = sessionChecker();

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin != 1){
    header("Location: login");
    exit;
  }
  
  $error1 = "";
  $error2 = "";

  $uname = $_SESSION['usernameAdmin'];
  $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'"));
  
  $idC = $_GET['caleg'];
  $result = mysqli_query($conn, "SELECT * FROM tb_data_caleg WHERE id='$idC'");
  $getDaftar = mysqli_num_rows($result);
  $dataCaleg = mysqli_fetch_assoc($result);

  $id_kel = $dataCaleg['id_kelurahan'];
  $id_kec = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kelurahan WHERE id_kelurahan='$id_kel'"))['id_kecamatan'];
  $id_kab = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kecamatan WHERE id_kecamatan='$id_kec'"))['id_kabupaten'];
  $id_prov = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kabupaten WHERE id_kabupaten='$id_kab'"))['id_provinsi'];

  $namaKel = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kelurahan WHERE id_kelurahan='$id_kel'"))['nama_kelurahan'];
  $namaKec = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kecamatan WHERE id_kecamatan='$id_kec'"))['nama_kecamatan'];
  $namaKab = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_kabupaten WHERE id_kabupaten='$id_kab'"))['nama_kab'];
  $namaPro = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_provinsi WHERE id_provinsi='$id_prov'"))['nama_prov'];

  $idPartai = $dataCaleg['id_partai'];
  $namaPartai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_partai WHERE id='$idPartai'"))['nama_partai'];

  $idJbtPartai = $dataCaleg['id_jbt_partai'];
  $namaJbtPartai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_jbt_partai WHERE id_jbt_partai='$idJbtPartai'"))['nama_jabatan'];

  $idGender = $dataCaleg['id_gender'];
  $namaGender = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_jenis_kelamin WHERE id_gender='$idGender'"))['ket_gender'];

  $idAgama = $dataCaleg['id_agama'];
  $namaAgama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_agama WHERE id_agama='$idAgama'"))['nama_agama'];
  
  $idPend = $dataCaleg['id_pend'];
  $namaPend = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_pendidikan WHERE id_pend='$idPend'"))['nama_pend'];
  
  $idTingkat = $dataCaleg['tingkat_caleg'];
  $namaTingkat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_tingkat_caleg WHERE id_tingkat='$idTingkat'"))['nama_tingkat'];

  if (empty($_GET['caleg'])){
    header("location: data_caleg");
    exit;
  }
  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Caleg Management | SIPALEG ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Custom CSS -->
    <link rel="stylesheet" href="https://designrevision.com/demo/shards-dashboards/styles/shards-dashboards.1.3.1.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
 
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<style>
  .form-control{
    border: 1px solid #aaa !important;
  }
  .nav{
    font-family: 'Roboto', sans-serif;
  }
</style>
<style>
        .edit-user-details__avatar {
          max-width: 300px;
          height: 300px;
        }
        .edit-user-details__avatar img{
          height: 300px;
        }
        .edit-user-details__avatar__change i {
            line-height: 150px;
        }
        .form-text {
            color: blue;
        }
    </style>

</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
     <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: red; height: 60px;">
      <div class="navbar-header" style="margin-top: -10px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin SIPALEG</a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-nav navbar-right" style="margin-top: -10px;">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="../assets/img/admin/<?= $admin['foto_admin'] ?>"></a>
          <ul class="dropdown-menu">
            <li class="m_2"><a href="logout"><i class="fa fa-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
      <div class="navbar-default sidebar" role="navigation" style="top: 60px; width: 200px; left: 0;">
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
        <div class="col-md-12 graphs">
	     <div class="bs-example4" data-example-id="contextual-table">
      
       <div class="main-navbar sticky-top bg-white">
          <div class="main-content-container container-fluid px-4">
            <div class="row" style="margin-top: 20px;">
                <!-- Edit User Details Card -->
                <div class="card card-small edit-user-details mb-4">
                  <div class="card-body p-0">
                    <?php
                      if ($idC != mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(id) FROM tb_data_caleg"))["MIN(id)"]) {
                        $idPrev = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) FROM tb_data_caleg WHERE id < $idC"))["MAX(id)"];
                      }
                      if ($idC != mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) FROM tb_data_caleg"))["MAX(id)"]) {
                        $idNext = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(id) FROM tb_data_caleg WHERE id > $idC"))["MIN(id)"];
                      }
                    ?>
                    <div class="card-footer border-top" id='btn_save'>
                      <?php if ($idC != mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(id) FROM tb_data_caleg"))["MIN(id)"]) { ?>
                        <button onclick="location.href = '?caleg=<?= $idPrev ?>'" class="btn btn-sm btn-accent ml-auto d-table mr-3">Prev Caleg
                        </button>
                      <?php } else { ?>
                        <button onclick="location.href = '?caleg=<?= $idPrev ?>'" class="btn btn-sm btn-accent ml-auto d-table mr-3" disabled>Prev Caleg</button>
                      <?php } ?>
                      <button onclick="location.href = 'edit_caleg?caleg=<?= $idC ?>'" class="btn btn-sm btn-primary ml-auto d-table mr-3" >Edit Caleg</button>
                      <button onclick="location.href = 'delete_data?caleg=<?= $idC ?>'" class="btn btn-sm btn-danger ml-auto d-table mr-3" >Delete Caleg</button>
                      <?php if ($idC != mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) FROM tb_data_caleg"))["MAX(id)"]) { ?>
                        <button onclick="location.href = '?caleg=<?= $idNext ?>'" class="btn btn-sm btn-accent ml-auto d-table mr-3">Next Caleg
                      </button>
                      <?php } else { ?>
                        <button onclick="location.href = '?caleg=<?= $idNext ?>'" class="btn btn-sm btn-accent ml-auto d-table mr-3" disabled>Next Caleg
                      </button>
                      <?php } ?>
                    </div>
                    <form id="formDaftar" method="post" action="edit_caleg" enctype="multipart/form-data" class="py-4" style="max-width: 100%; border-top: 2px solid red;">
                    
                    <input type="text" id="idc" name="idc" value="<?= $dataCaleg['id'] ?>" hidden>
                      <div class="form-row mx-4" style="margin-top: 20px;">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Umum</h6>
                          <p class="form-text text-muted m-0">Sesuaikan data yang salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="col-lg-4" style="padding-bottom: 20px;">
                          <label for="foto_caleg" class="text-center w-100 mb-4">Foto Profil</label>
                          <div class="edit-user-details__avatar m-auto" >
                          <img src="../assets/img/caleg/<?= $dataCaleg['foto'] ?>" alt="User Avatar">
                            <label class="edit-user-details__avatar__change">
                              <i class="material-icons mr-1">&#xE439;</i>
                            </label>
                          </div>
                          <!-- <button class="btn btn-sm btn-white d-table mx-auto mt-4"><i class="material-icons">&#xE2C3;</i> Upload Image</button> -->
                        </div>
                        <div class="col-lg-8">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="nik">NIK</label>
                              <input type="text" class="form-control" name="nik" id="nik" value="<?= $dataCaleg['nik'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="nama">Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama" id="nama" value="<?= $dataCaleg['nama'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $dataCaleg['tempat_lahir'] ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <div class="input-group input-group-seamless">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $dataCaleg['tanggal_lahir'] ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="gender">Jenis Kelamin</label>
                              <div class="input-group input-group-seamless">
                                <select class="form-control" name="gender" id="gender" required>
                                  <?php
                                    $genders = mysqli_query($conn, "SELECT * FROM tb_jenis_kelamin");
                                  ?>
                                  <option value="">Pilih Jenis Kelamin</option>
                                  <?php foreach ($genders as $gender) : ?>
                                  <option value="<?= $gender['id_gender'] ?>" <?= ($gender['id_gender'] == $dataCaleg['id_gender'] ? "selected" : ""); ?> ><?= $gender['ket_gender'] ?></option>
                                <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="agama">Agama</label>
                              <div class="input-group input-group-seamless">
                              <select class="form-control" name="agama" id="agama" required>
                                <?php
                                  $agamaAll = mysqli_query($conn, "SELECT * FROM tb_agama");
                                ?>
                                
                                <option value="">Pilih Agama</option>
                                <?php foreach ($agamaAll as $agama) : ?>
                                <option value="<?= $agama['id_agama'] ?>" <?= ($agama['id_agama'] == $dataCaleg['id_agama'] ? "selected" : ""); ?> ><?= $agama['nama_agama']; ?></option>
                              <?php endforeach; ?>
                              </select>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="pend_akhir">Pendidikan Terakhir</label>
                              <div class="input-group input-group-seamless">
                              <select class="form-control" name="pend_akhir" id="pend_akhir" required>
                                <?php
                                  $pends = mysqli_query($conn, "SELECT * FROM tb_pendidikan");
                                ?>
                                <option value="">Pilih Pendidikan</option>
                                <?php foreach ($pends as $pend) : ?>
                                <option value="<?= $pend['id_pend'] ?>" <?= ($pend['id_pend'] == $dataCaleg['id_pend'] ? "selected" : ""); ?> ><?= $pend['nama_pend'] ?></option>
                              <?php endforeach; ?>
                              </select>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="bidang_pend">Bidang Pendidikan</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="bidang_pend" id="bidang_pend" value="<?= $dataCaleg['bidang_pend'] ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="pekerjaan">Pekerjaan</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $dataCaleg['pekerjaan'] ?>">
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div style="clear: both;"></div>
                      <hr>
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Alamat Lengkap</h6>
                          <p class="form-text text-muted m-0">Ganti alamat apabila salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                            <label for="provinsi">Provinsi</label>
                            <div class="input-group input-group-seamless">
                            <select class="form-control" name="provinsi" id="provinsi"  required>
                              <option value="0">Pilih Provinsi</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kabupaten">Kabupaten</label>
                            <div class="input-group input-group-seamless">
                            <select class="form-control" name="kabupaten" id="kabupaten" required>
                              <option value="">Pilih Kabupaten</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kecataman">Kecamatan</label>
                            <div class="input-group input-group-seamless">
                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                              <option value="">Pilih Kecamatan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kelurahan">Kelurahan</label>
                            <div class="input-group input-group-seamless">
                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                              <option value="">Pilih Kelurahan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat_ktp">Alamat Sesuai Ktp</label>
                            <div class="input-group input-group-seamless">
                                <textarea class="form-control" name="alamat_ktp" id="alamat_ktp" ><?= $dataCaleg['alamat_ktp'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat_tinggal">Alamat Tinggal</label>
                            <div class="input-group input-group-seamless">
                                <textarea class="form-control" name="alamat_tinggal" id="alamat_tinggal"><?= $dataCaleg['alamat_tinggal'] ?></textarea>
                            </div>
                        </div>
                      </div>
                      <div style="clear: both;"></div>
                      <hr>
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Media Social</h6>
                          <p class="form-text text-muted m-0">Ganti sosial media jika salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                            <label for="telepon">Telepon/No. Hp</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="telepon" id="telepon" value="<?= $dataCaleg['telepon'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group input-group-seamless">
                                <input type="email" class="form-control" name="email" id="email" value="<?= $dataCaleg['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="facebook">Facebook</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?= $dataCaleg['facebook'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="twitter">Twitter</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?= $dataCaleg['twitter'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instagram">Instagram</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="instagram" id="instagram" value="<?= $dataCaleg['instagram'] ?>">
                            </div>
                        </div>
                      </div>
                      <div style="clear: both;"></div>
                      <hr>
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Data Partai</h6>
                          <p class="form-text text-muted m-0">Ganti data detail partai apabila ada yang salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                            <label for="partai">Partai</label>
                            <div class="input-group input-group-seamless">
                                <select class="form-control" name="partai" id="partai" required>
                                  <?php
                                    $partais = mysqli_query($conn, "SELECT * FROM tb_partai");
                                  ?>
                                  <option value="">Pilih Partai</option>
                                  <?php foreach ($partais as $partai) : ?>
                                  <option value="<?= $partai['id'] ?>" <?= ($partai['id'] == $dataCaleg['id_partai'] ? "selected" : ""); ?> ><?= $partai['nama_partai'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jbt_partai">Jabatan dalam partai</label>
                            <div class="input-group input-group-seamless">
                                <select class="form-control" name="jbt_partai" id="jbt_partai" required>
                                    <?php
                                      $jbt_partai = mysqli_query($conn, "SELECT * FROM tb_jbt_partai");
                                    ?>
                                    <option value="">Pilih jabatan Partai</option>
                                    <?php foreach ($jbt_partai as $jabatan) : ?>
                                    <option value="<?= $jabatan['id_jbt_partai'] ?>" <?= ($jabatan['id_jbt_partai'] == $dataCaleg['id_jbt_partai'] ? "selected" : ""); ?> ><?= $jabatan['nama_jabatan'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tingkat_caleg">Tingkat Caleg</label>
                            <div class="input-group input-group-seamless">
                            <select class="form-control" name="tingkat_caleg" id="tingkat_caleg" required>
                              <?php
                                $tingkats = mysqli_query($conn, "SELECT * FROM tb_tingkat_caleg");
                              ?>
                              
                              <option value="">Pilih Tingkatan Caleg</option>
                              <?php foreach ($tingkats as $tingkat) : ?>
                              <option value="<?= $tingkat['id_tingkat'] ?>" <?= ($tingkat['id_tingkat'] == $dataCaleg['tingkat_caleg'] ? "selected" : ""); ?> ><?= $tingkat['nama_tingkat'] ?></option>
                            <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="daerah_caleg">Provinsi/Kab/Kota</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="daerah_caleg" id="daerah_caleg" value="<?= $dataCaleg['tempat_caleg'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="daerah_pilih">Daerah Pilihan</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="daerah_pilih" id="daerah_pilih" value="<?= $dataCaleg['daerah_pilih'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visi">Visi</label>
                            <div class="input-group input-group-seamless">
                                <textarea class="form-control" name="visi" id="visi"><?= $dataCaleg['visi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="misi">Misi</label>
                            <div class="input-group input-group-seamless">
                                <textarea class="form-control" name="misi" id="misi"><?= $dataCaleg['misi'] ?></textarea>
                            </div>
                        </div>
                      </div>
                      <div style="clear: both;"></div>
                      <hr>
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Foto Pendukung</h6>
                          <p class="form-text text-muted m-0">Upload foto ulang apabila salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                            <label for="foto_ktp">Foto KTP</label>
                            <div class="input-group input-group-seamless">
                              <img src="../assets/img/ktp/<?= $dataCaleg['foto_ktp'] ?>" alt="<?= $dataCaleg['foto_ktp'] ?>" class="img-thumbnail" style="width: 600px;">&nbsp;<span class="text-danger"><?= $error1 ?></span>
                              <br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="foto_tulisan">Foto Tulisan 1 halaman</label>
                            <div class="input-group input-group-seamless">
                              <img src="../assets/img/tulisan/<?= $dataCaleg['foto_tulisan'] ?>" alt="<?= $dataCaleg['foto_tulisan'] ?>" class="img-thumbnail" style="width: 500px;">&nbsp;<span class="text-danger"><?= $error2 ?></span>
                              <br>
                            </div>
                        </div>
                      <div class="card-footer border-top" id='btn_save'>
                      <img src="../assets/img/tulisan/<?= $dataCaleg['foto_tulisan'] ?>" alt="<?= $dataCaleg['foto_tulisan'] ?>" class="img-thumbnail" style="max-width: 500px; display: none">&nbsp;</div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End Edit User Details Card -->
              
            </div>
          </div>
      
      </div>
       
	   </div>
     <div class="copy_layout">
      <p>Copyright Reserved © 2019 Suko - SIPALEG</p>
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
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<script>$('#formDaftar :input').prop('disabled', true);</script>
<script>
      var return_first = function() {
          var tmp = null;
          $.ajax({
              'async': false,
              'type': "get",
              'global': false,
              'dataType': 'json',
              'url': 'https://x.rajaapi.com/poe',
              'success': function(data) {
                  tmp = data.token;
              }
          });
          return tmp;
      }();

      $(document).ready(function() {
        $.ajax({
          url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
          type: 'GET',
          dataType: 'json',
          success: function(json) {
            if (json.code == 200) {
                for (i = 0; i < Object.keys(json.data).length; i++) {
                    $('#provinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                }
            } else {
                $('#provinsi').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
            }
          }
        });
        
        $("#provinsi").change(function() {
          $("#nama_provinsi").attr('value', $("#provinsi").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
              data: "idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                $("#kabupaten").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                    }
                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });
        $("#kabupaten").change(function() {
          $("#nama_kabupaten").attr('value', $("#kabupaten").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                $("#kecamatan").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                    }
                } else {
                    $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });

        $("#kecamatan").change(function() {
          $("#nama_kecamatan").attr('value', $("#kecamatan").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          var kecamatan = $("#kecamatan").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
              type: 'GET',
              dataType: 'json',
              cache: false,
              success: function(json) {
                $("#kelurahan").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                    }
                } else {
                    $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });

        $("#kelurahan").change(function() {
          $("#nama_kelurahan").attr('value', $("#kelurahan").children("option:selected").text());
        });
      });
    </script>
    <script>
      var return_first = function() {
          var tmp = null;
          $.ajax({
              'async': false,
              'type': "get",
              'global': false,
              'dataType': 'json',
              'url': 'https://x.rajaapi.com/poe',
              'success': function(data) {
                  tmp = data.token;
              }
          });
          return tmp;
      }();

      $(document).ready(function() {
        $.ajax({
          url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
          type: 'GET',
          dataType: 'json',
          success: function(json) {
            if (json.code == 200) {
                    var idProvSelected = '<?= $id_prov ?>';
                for (i = 0; i < Object.keys(json.data).length; i++) {
                    var idProv = String(json.data[i].id);
                    $('#provinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).prop('selected', (idProv == idProvSelected ? true : false)));
                    
                }
            } else {
                $('#provinsi').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
            }
          }
        });
        
        $("#provinsi").ready(function() {
          $("#nama_provinsi").attr('value', $("#provinsi").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
              data: "idpropinsi=" + '<?= $id_prov ?>',
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                $("#kabupaten").html('');
                if (json.code == 200) {
                    var idKabSelected = '<?= $id_kab ?>';
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                    var idKab = String(json.data[i].id);
                        $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).prop('selected', (idKab == idKabSelected ? true : false)));
                    }
                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });
        $("#kabupaten").ready(function() {
          $("#nama_kabupaten").attr('value', $("#kabupaten").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
              data: "idkabupaten=" + '<?= $id_kab ?>' + "&idpropinsi=" + '<?= $id_prov ?>',
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                $("#kecamatan").html('');
                if (json.code == 200) {
                    var idKecSelected = '<?= $id_kec ?>';
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                    var idKec = String(json.data[i].id);
                        $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).prop('selected', (idKec == idKecSelected ? true : false)));
                    }
                } else {
                    $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });

        $("#kecamatan").ready(function() {
          $("#nama_kecamatan").attr('value', $("#kecamatan").children("option:selected").text());
          var propinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          var kecamatan = $("#kecamatan").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
              data: "idkabupaten=" + '<?= $id_kab ?>' + "&idpropinsi=" + '<?= $id_prov ?>' + "&idkecamatan=" + '<?= $id_kec ?>',
              type: 'GET',
              dataType: 'json',
              cache: false,
              success: function(json) {
                $("#kelurahan").html('');
                if (json.code == 200) {
                    var idKelSelected = '<?= $id_kel ?>';
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                    var idKel = String(json.data[i].id);
                        $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).prop('selected', (idKel == idKelSelected ? true : false)));
                    }
                } else {
                    $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
              }
          });
        });

        $("#kelurahan").ready(function() {
          $("#nama_kelurahan").attr('value', $("#kelurahan").children("option:selected").text());
        });
      });
    </script>
</body>
</html>
