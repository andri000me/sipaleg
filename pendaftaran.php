<?php
  session_start();
  require "functions.php";
  
  // $urlProvinsi = "http://dev.farizdotid.com/api/daerahindonesia/provinsi";
  // $prov = json_decode(file_get_contents($urlProvinsi), true);
  // $dataProvinsi = $prov['semuaprovinsi'];

  $login = sessionChecker();

  if ($login != 1){
    echo "
      <script>
        alert('silahkan login dulu.');
        location.href = 'login';
      </script>
    ";
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

  // var_dump($id_kel, $id_kec, $id_kab, $id_prov);
  
  $today = date("Y-m-d");
  if ($getDaftar > 0) {
    $today = $dataCaleg['tanggal_daftar'];
  }

  if (isset($_POST['daftar'])){
    if (daftar($_POST) > 0) {
      header("location: ?success");
    }
  }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pendaftaran Caleg - SIPALEG</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <style>
      .clean-block.clean-form form {
        max-width: 100%;
      }

      input[type='file']{
        height: 45px;
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/" style="font-weight: bold;font-size: 38px;">SIPALEG</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="pendaftaran">PENDAFTARAN</a></li>
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
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-danger">Pendaftaran Caleg</h2>
                    <p>Berikut adalah form online pendaftaran Caleg, untuk form offline dapat diunduh&nbsp;<a class="text-danger" href="assets/xls/tb_anggota_keluarga.xlsx" style="font-weight: bold;">disini</a></p>
                </div>
                <form id="formDaftar" class="text-danger border-danger" method="post" action="" enctype="multipart/form-data">
                <?php if (isset($_GET['error'])) : ?>
                  <?php if(($_GET["error"] == 4)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="text-danger">File foto Profile belum ada</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                  <?php if(($_GET["error"] == 5)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="text-danger">File foto Profile belum ada</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                  <?php if(($_GET["error"] == 7)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="text-danger">File foto Profile belum ada</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
              <?php endif; ?>
                  <?php if(isset($_GET["success"])) { ?>
                    <div class="alert alert-success" role="alert">
                      Data Berhasil Disimpan !
                      <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><a style="text-decoration: none;" href="pendaftaran">&times;</a></span>
                      </button>
                    </div>
                  <?php } ?>
                    <div class="form-group"><label for="nik">NIK</label><input class="form-control" type="text" name="nik" id="nik" required></div>
                    <div class="form-group"><label for="nama">Nama Lengkap dan Gelar</label><input class="form-control" type="text" name="nama" id="nama" required></div>
                    <div class="form-group"><label for="partai">Partai</label>
                    <input class="form-control" type="text" name="nama_partai" id="nama_partai" value="<?= $namaPartai ?>" hidden>
                      <select class="form-control" name="partai" id="partai" required>
                        <?php
                          $partais = mysqli_query($conn, "SELECT * FROM tb_partai");
                        ?>
                        <?php foreach ($partais as $partai) : ?>
                        <option value="<?= $partai['id'] ?>"><?= $partai['nama_partai'] ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group"><label for="jbt_partai">Jabatan dalam partai</label>
                    <input class="form-control" type="text" name="nama_jbt_partai" id="nama_jbt_partai" value="<?= $namaJbtPartai ?>" hidden>
                      <select class="form-control" name="jbt_partai" id="jbt_partai" required>
                        <?php
                          $jbt_partai = mysqli_query($conn, "SELECT * FROM tb_jbt_partai");
                        ?>
                        <?php foreach ($jbt_partai as $jabatan) : ?>
                        <option value="<?= $jabatan['id_jbt_partai'] ?>"><?= $jabatan['nama_jabatan'] ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group float-left" style="width: 49%;"><label for="tempat_lahir">Tempat Lahir</label><input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" required></div>
                    <div class="form-group float-left" style="width: 49%;margin-left: 2%;"><label for="tanggal_lahir">Tanggal Lahir</label><input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required></div>
                    <div class="form-group float-left" style="width: 49%;"><label>Jenis Kelamin</label>
                    <input class="form-control" type="text" name="nama_gender" id="nama_gender" value="<?= $namaGender ?>" hidden>
                      <select class="form-control" name="gender" id="gender" required>
                        <?php
                          $genders = mysqli_query($conn, "SELECT * FROM tb_jenis_kelamin");
                        ?>
                        <?php foreach ($genders as $gender) : ?>
                        <option value="<?= $gender['id_gender'] ?>"><?= $gender['ket_gender'] ?></option>
                      <?php endforeach; ?>
                      </select></div>
                    <div class="form-group float-left" style="width: 49%;margin-left: 2%;"><label for="agama">Agama</label>
                    <input class="form-control" type="text" name="nama_agama" id="nama_agama" value="<?= $namaAgama ?>" hidden>
                      <select class="form-control" name="agama" id="agama" required>
                        <?php
                          $agamaAll = mysqli_query($conn, "SELECT * FROM tb_agama");
                        ?>
                        <?php foreach ($agamaAll as $agama) : ?>
                        <option value="<?= $agama['id_agama'] ?>" ><?= $agama['nama_agama']; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group float-left" style="width: 49%;"><label for="pend_akhir">Pendidikan Terakhir</label>
                    <input class="form-control" type="text" name="nama_pend" id="nama_pend" value="<?= $namaPend ?>" hidden>
                      <select class="form-control" name="pend_akhir" id="pend_akhir" required>
                        <?php
                          $pends = mysqli_query($conn, "SELECT * FROM tb_pendidikan");
                        ?>
                        <?php foreach ($pends as $pend) : ?>
                        <option value="<?= $pend['id_pend'] ?>"><?= $pend['nama_pend'] ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group float-left" style="width: 49%;margin-left: 2%;"><label  for="bidang_pend">&nbsp;</label><input class="form-control" type="text" name="bidang_pend" id="bidang_pend" placeholder="Bidang pendidikan" required></div>
                    <div class="form-group"><label for="pekerjaan">Pekerjaan</label><input class="form-control" type="text" name="pekerjaan" id="pekerjaan" required></div>
                    <div class="form-group" id="prov"><label for="provinsi">Provinsi</label>
                      <input class="form-control" type="text" name="nama_provinsi" id="nama_provinsi" hidden>
                      <select class="form-control" name="provinsi" id="provinsi" onchange="setVisible('kab')" required>
                        <option value="">Pilih Provinsi</option>
                      </select>
                    </div>
                    <div class="form-group" id="kab" hidden='true'><label for="kabupaten">Kabupaten</label>
                      <input class="form-control" type="text" name="nama_kabupaten" id="nama_kabupaten" hidden>
                      <select class="form-control" name="kabupaten" id="kabupaten" onchange="setVisible('kec')" required>
                        <option value="">Pilih Kabupaten</option>
                      </select>
                    </div>
                    <div class="form-group" id="kec" hidden='true'><label for="kecamatan">Kecamatan</label>
                      <input class="form-control" type="text" name="nama_kecamatan" id="nama_kecamatan" hidden>
                      <select class="form-control" name="kecamatan" id="kecamatan" onchange="setVisible('kel')" required>
                        <option value="">Pilih Kecamatan</option>
                      </select>
                    </div>
                    <div class="form-group" id="kel" hidden='true'><label for="kelurahan">Kelurahan</label>
                      <input class="form-control" type="text" name="nama_kelurahan" id="nama_kelurahan" hidden>
                      <select class="form-control" name="kelurahan" id="kelurahan" required>
                        <option value="">Pilih Kelurahan</option>
                      </select>
                    </div>
                    <div class="form-group"><label for="alamat_ktp">Alamat sesuai KTP</label><textarea class="form-control" name="alamat_ktp" id="alamat_ktp" required></textarea></div>
                    <div class="form-group"><label for="alamat_tinggal">Alamat Tinggal</label><textarea class="form-control" name="alamat_tinggal" id="alamat_tinggal" required></textarea></div>
                    <div class="form-group"><label for="telepon">Telepon/No. HP</label><input class="form-control" type="text" name="telepon" id="telepon" required></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control" type="email" name="email" id="email" required></div>
                    <div class="form-group"><label for="facebook">Facebook</label><input class="form-control" type="text" name="facebook" id="facebook"></div>
                    <div class="form-group"><label for="twitter">Twitter</label><input class="form-control" type="text" name="twitter" id="twitter"></div>
                    <div class="form-group"><label for="instagram">Instagram</label><input class="form-control" type="text" name="instagram" id="instagram"></div>
                    <div class="form-group"><label for="tingkat_caleg">Tingkat CALEG</label>
                    <input class="form-control" type="text" name="nama_tingkat" id="nama_tingkat" value="<?= $namaTingkat ?>" hidden>
                    <select class="form-control" name="tingkat_caleg" id="tingkat_caleg" required>
                      <?php
                        $tingkats = mysqli_query($conn, "SELECT * FROM tb_tingkat_caleg");
                      ?>
                      <?php foreach ($tingkats as $tingkat) : ?>
                      <option value="<?= $tingkat['id_tingkat'] ?>"><?= $tingkat['nama_tingkat'] ?></option>
                    <?php endforeach; ?>
                    </select></div>
                    <div class="form-group"><label for="daerah_caleg">Provinsi/Kab/Kota </label><input class="form-control" type="text" name="daerah_caleg" id="daerah_caleg" required></div>
                    <div class="form-group"><label for="daerah_pilih">Daerah Pemilihan</label><input class="form-control" type="text" name="daerah_pilih" id="daerah_pilih" required></div>
                    <div class="form-group"><label for="visi">Visi</label><textarea class="form-control" name="visi" id="visi" required></textarea></div>
                    <div class="form-group"><label for="misi">Misi</label><textarea class="form-control" name="misi" id="misi" required></textarea></div>
                    <div class="form-group"><label for="foto">Foto Caleg</label><input class="form-control" type="file" name="foto" id="foto" accept="image/*" required><br>
                    <img id="img_foto" class="img-thumbnail" src="assets/img/caleg/<?= $dataCaleg['foto'] ?>" alt="<?= $dataCaleg['foto'] ?>" style="max-height: 150px" hidden>
                    </div>
                    <div class="form-group"><label for="foto_ktp">Foto KTP</label><input class="form-control" type="file" name="foto_ktp" id="foto_ktp" accept="image/*" required><br>
                    <img id="img_ktp" class="img-thumbnail" src="assets/img/ktp/<?= $dataCaleg['foto_ktp'] ?>" alt="<?= $dataCaleg['foto_ktp'] ?>" style="max-height: 150px" hidden>
                    </div>
                    <div class="form-group"><label for="fot_tulisan">Foto Tulisan 1 halaman</label>
                    <input class="form-control" type="file" name="foto_tulisan" id="foto_tulisan" accept="image/*" required><br>
                    <img id="img_tulisan" class="img-thumbnail" src="assets/img/tulisan/<?= $dataCaleg['foto_tulisan'] ?>" alt="<?= $dataCaleg['foto_tulisan'] ?>" style="max-height: 150px" hidden>
                    
                    </div>
                    <div class="form-group"><label for="tanggal_now">Tanggal Daftar</label><input class="form-control" type="date" name="tanggal_now" id="tanggal_now" value="<?= $today ?>" disabled></div>
                    <div class="form-group"><button class="btn btn-danger btn-block" name="edit" id="edit" hidden=true >
                      <a style="text-decoration: none; color: white;" href="profile">Edit in Dashbord</a>
                  </button></div>
                    <div class="form-group" ><button class="btn btn-danger btn-block" type="submit" name="daftar" id="daftar">Send</button></div>
                    
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
    <script>
      function setVisible(id_vis) {

        if (id_vis=='kab'){
          document.getElementById('kec').hidden = true;
          document.getElementById('kel').hidden = true;
        }
        if (id_vis=='kec'){
          document.getElementById('kel').hidden = true;
        }
        document.getElementById(id_vis).hidden = false;
        if (document.getElementById('provinsi').value == ""){
          document.getElementById(id_vis).hidden = true;
        }
      }
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

      if (<?= $getDaftar ?> > 0) {
        $('#nik').attr('value', "<?= $dataCaleg['nik'] ?>");
        $('#nama').attr('value', "<?= $dataCaleg['nama'] ?>");
        $('#partai').attr('value', "<?= $dataCaleg['id_partai'] ?>");
        $('#jbt_partai').attr('value', "<?= $dataCaleg['id_jbt_partai'] ?>");
        $('#tempat_lahir').attr('value', "<?= $dataCaleg['tempat_lahir'] ?>");
        $('#tanggal_lahir').attr('value', "<?= $dataCaleg['tanggal_lahir'] ?>");
        $('#gender').attr('value', "<?= $dataCaleg['id_gender'] ?>");
        $('#agama').attr('value', "<?= $dataCaleg['id_agama'] ?>");
        $('#pend_akhir').attr('value', "<?= $dataCaleg['id_pend'] ?>");
        $('#bidang_pend').attr('value', "<?= $dataCaleg['bidang_pend'] ?>");
        $('#pekerjaan').attr('value', "<?= $dataCaleg['pekerjaan'] ?>");
        $('#alamat_ktp').html("<?= $dataCaleg['alamat_ktp'] ?>");
        $('#alamat_tinggal').html( "<?= $dataCaleg['alamat_tinggal'] ?>");
        $('#telepon').attr('value', "<?= $dataCaleg['telepon'] ?>");
        $('#email').attr('value', "<?= $dataCaleg['email'] ?>");
        $('#facebook').attr('value', "<?= $dataCaleg['facebook'] ?>");
        $('#twitter').attr('value', "<?= $dataCaleg['twitter'] ?>");
        $('#instagram').attr('value', "<?= $dataCaleg['instagram'] ?>");
        $('#tingkat_caleg').attr('value', "<?= $dataCaleg['tingkat_caleg'] ?>");
        $('#daerah_caleg').attr('value', "<?= $dataCaleg['tempat_caleg'] ?>");
        $('#daerah_pilih').attr('value', "<?= $dataCaleg['daerah_pilih'] ?>");
        $('#visi').html("<?= $dataCaleg['visi'] ?>");
        $('#misi').html( "<?= $dataCaleg['misi'] ?>");
        $('#foto').attr('value', "<?= $dataCaleg['foto'] ?>");
        $('#foto_ktp').attr('value', "<?= $dataCaleg['foto_ktp'] ?>");
        $('#foto_tulisan').attr('value', "<?= $dataCaleg['foto_tulisan'] ?>");
        $('#formDaftar :input').prop('disabled', true);
        $('#daftar').prop('hidden', true);
        $('#edit').prop('hidden', false);
        $('#edit').prop('disabled', false);
        
        $('#img_foto').prop('hidden', false);
        $('#img_ktp').prop('hidden', false);
        $('#img_tulisan').prop('hidden', false);
        $('#foto').prop('hidden', true);
        $('#foto_ktp').prop('hidden', true);
        $('#foto_tulisan').prop('hidden', true);
        $('#provinsi').prop('hidden', true);
        $('#kabupaten').prop('hidden', true);
        $('#kecamatan').prop('hidden', true);
        $('#kelurahan').prop('hidden', true);
        $('#kab').prop('hidden', false);
        $('#kec').prop('hidden', false);
        $('#kel').prop('hidden', false);
        $('#nama_provinsi').prop('hidden', false);
        $('#nama_kabupaten').prop('hidden', false);
        $('#nama_kecamatan').prop('hidden', false);
        $('#nama_kelurahan').prop('hidden', false);
        $('#nama_kabupaten').attr('style', "text-transform: uppercase");
        $('#nama_kecamatan').attr('style', "text-transform: uppercase");
        $('#nama_kelurahan').attr('style', "text-transform: uppercase");
        $('#nama_provinsi').attr('value', "<?= $namaPro ?>");
        $('#nama_kabupaten').attr('value', "<?= $namaKab ?>");
        $('#nama_kecamatan').attr('value', "<?= $namaKec ?>");
        $('#nama_kelurahan').attr('value', "<?= $namaKel ?>");

        $('#nama_partai').prop('hidden', false);
        $('#nama_jbt_partai').prop('hidden', false);
        $('#nama_gender').prop('hidden', false);
        $('#nama_agama').prop('hidden', false);
        $('#nama_pend').prop('hidden', false);
        $('#nama_tingkat').prop('hidden', false);

        $('#partai').prop('hidden', true);
        $('#jbt_partai').prop('hidden', true);
        $('#gender').prop('hidden', true);
        $('#agama').prop('hidden', true);
        $('#pend_akhir').prop('hidden', true);
        $('#tingkat_caleg').prop('hidden', true);
      }

    </script>
    

</body>

</html>
