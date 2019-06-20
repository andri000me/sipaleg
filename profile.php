<?php
  session_start();
  require "functions.php";

  $login = sessionChecker();

  $error1 = "";
  $error2 = "";

  if ($login != 1){
    echo "
      <script>
        alert('silahkan login dulu.');
        location.href = 'login';
      </script>
    ";
  }

  $enableEdit = "disable";

  if (isset($_GET['edit'])) {
    $enableEdit = "enable";
  }

  $uname = $_SESSION['username'];
  $result = mysqli_query($conn, "SELECT * FROM tb_data_caleg WHERE username='$uname'");
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


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - SIPALEG</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="https://designrevision.com/demo/shards-dashboards/styles/shards-dashboards.1.3.1.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .edit-user-details__avatar {
          max-width: 200px;
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
    <main class="page registration-page">
        
    <section class="clean-block clean-form dark">
    <div class="main-navbar sticky-top bg-white">
          <div class="main-content-container container-fluid px-4">
            <div class="row" style="margin-top: 20px;">
              <div class="col-lg-8 mx-auto mt-4">
                <!-- Edit User Details Card -->
                <div class="card card-small edit-user-details mb-4">
                  <div class="card-body p-0">
                    <form id="formDaftar" action="#" class="py-4" style="max-width: 100%; border-top: 2px solid red;">
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Umum</h6>
                          <p class="form-text text-muted m-0">Sesuaikan data yang salah.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="col-lg-4" style="padding-bottom: 20px;">
                          <label for="foto_caleg" class="text-center w-100 mb-4">Foto Profil</label>
                          <div class="edit-user-details__avatar m-auto" >
                            <img src="assets/img/caleg/<?= $dataCaleg['foto'] ?>" alt="User Avatar">
                            <label class="edit-user-details__avatar__change">
                              <i class="material-icons mr-1">&#xE439;</i>
                              <input type="file" id="foto_caleg" name="foto_caleg" class="d-none">
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
                                <input type="text" class="form-control" name="gender" id="gender" value="<?= $namaGender ?>" hidden>
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
                                <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $namaPro ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kabupaten">Kabupaten</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="<?= $namaKab ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kecataman">Kecamatan</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="kecataman" id="kecataman" value="<?= $namaKec ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kelurahan">Kelurahan</label>
                            <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $namaKel ?>">
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
                              <img src="assets/img/ktp/<?= $dataCaleg['foto_ktp'] ?>" alt="<?= $dataCaleg['foto_ktp'] ?>" class="img-thumbnail" style="max-height: 50px;">&nbsp;<span class="text-danger"><?= $error1 ?></span>
                              <br>
                              <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="foto_tulisan">Foto Tulisan 1 halaman</label>
                            <div class="input-group input-group-seamless">
                              <img src="assets/img/tulisan/<?= $dataCaleg['foto_tulisan'] ?>" alt="<?= $dataCaleg['foto_tulisan'] ?>" class="img-thumbnail" style="max-height: 50px;">&nbsp;<span class="text-danger"><?= $error2 ?></span>
                              <br><input type="file" class="form-control" id="foto_tulisan" name="foto_tulisan">
                            </div>
                        </div>
                      </div>
                        <div class="card-footer border-top">
                            <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Save Changes</button>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- End Edit User Details Card -->
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
    <script>
      console.log('<?= $enableEdit ?>');
      if ('<?= $enableEdit ?>' == "disable") {
        $('#formDaftar :input').prop('disabled', true);
      }
    </script>
</body>

</html>
