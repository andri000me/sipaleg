<?php
  $conn = mysqli_connect("localhost", "root", "", "sipalegdb");
  // define error for register
  $uname_info = $pw_info = $email_info = "";

  $login = "";
  $loginAdmin = "";

  function getData($dataQuery){
    $arrData = [];
    foreach ($dataQuery as $value) {
      $arrData[] = $value;
    }
    return ($arrData);
  }
  
  function updateData($query){
    global $conn;
    $update = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }

function sessionChecker(){
  global $conn;
  global $login;
  if (!empty($_SESSION['status'])){
    if ($_SESSION['status'] == 'aktif'){
      $uname = $_SESSION['username'];
      $result = mysqli_query($conn, "SELECT * FROM tb_user_login WHERE username_login='$uname'");
      $login = mysqli_num_rows($result);
    }
  }
  return $login;
}

function sessionCheckerAdmin(){
  global $conn;
  global $loginAdmin;
  if (!empty($_SESSION['statusAdmin'])){
    if ($_SESSION['statusAdmin'] == 'aktif'){
      $uname = $_SESSION['usernameAdmin'];
      $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'");
      $loginAdmin = mysqli_num_rows($result);
    }
  }
  return $loginAdmin;
}


function register($data){
  global $conn;
  global $uname_info;
  global $pw_info;
  global $email_info;
  $username = htmlspecialchars($data['username']);
  // $nik = htmlspecialchars($_POST['nik']);
  $password = htmlspecialchars($data['password']);
  $password2 = htmlspecialchars($data['password2']);
  $email = htmlspecialchars($data['email']);

  $userdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user_login WHERE username_login='$username'"));

  if ($username === $userdata['username_login']){
    $uname_info = "Username Sudah Terdaftar.";
    return false;
  }

  if (!($password === $password2)){
    $pw_info = "Konfirmasi Password Tidak Sama.";
    return false;
  }

  if ($email === $userdata['email']){
    $pw_info = "Email sudah terdaftar.";
    return false;
  }

  $result = mysqli_query($conn, "INSERT INTO tb_user_login VALUES ('', '$username', '$password', '$email')");


  // $passwordNew = password_hash($password, PASSWORD_DEFAULT);
  //
  // $result = mysqli_query($conn, "INSERT INTO tb_user_login VALUES ('$nik', '$username', '$passwordNew', '$email')");

  return mysqli_affected_rows($conn);
}

function login($data){
  global $conn;
  global $uname_info;
  global $pw_info;
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $userdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user_login WHERE username_login='$username'"));

  if (!($username === $userdata['username_login']) || empty($username)){
    $uname_info = "Username Belum Terdaftar.";
    return false;
  }

  if (!($password === $userdata['password']) || empty($password)){
    $pw_info = "Password Tidak Benar.";
    return false;
  }

  return true;
}

function loginAdmin($data){
  global $conn;
  global $uname_info;
  global $pw_info;
  $username = htmlspecialchars($data['uname']);
  $password = htmlspecialchars($data['pass']);

  $admindata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'"));

  if (!($username === $admindata['username']) || empty($username)){
    $uname_info = "Username Belum Terdaftar.";
    return false;
  }

  if (!($password === $admindata['password']) || empty($password)){
    $pw_info = "Password Tidak Benar.";
    return false;
  }

  return true;
}

function daftar($data){
  global $conn;

  $nik = $data['nik'];
  $nama = $data['nama'];
  $id_partai = $data['partai'];
  $id_jbt_partai = $data['jbt_partai'];
  $tempat_lahir = $data['tempat_lahir'];
  $tanggal_lahir = $data['tanggal_lahir'];
  $id_gender = $data['gender'];
  $id_agama = $data['agama'];
  $id_pend = $data['pend_akhir'];
  $bidang_pend = $data['bidang_pend'];
  $pekerjaan = $data['pekerjaan'];

  $nama_provinsi = $data['nama_provinsi'];
  $nama_kabupaten = $data['nama_kabupaten'];
  $nama_kecamatan = $data['nama_kecamatan'];
  $nama_kelurahan = $data['nama_kelurahan'];

  $id_provinsi = $data['provinsi'];
  $id_kabupaten = $data['kabupaten'];
  $id_kecamatan = $data['kecamatan'];
  $id_kelurahan = $data['kelurahan'];
  

  $alamat_ktp = $data['alamat_ktp'];
  $alamat_tinggal = $data['alamat_tinggal'];
  $telepon = $data['telepon'];
  $email = $data['email'];
  $facebook = $data['facebook'];
  $twitter = $data['twitter'];
  $instagram = $data['instagram'];
  $tingkat_caleg = $data['tingkat_caleg'];
  $tempat_caleg = $data['daerah_caleg'];
  $daerah_pilih = $data['daerah_pilih'];
  $visi = $data['visi'];
  $misi = $data['misi'];
  $nama_foto = "no_photo.jpg";
  $nama_foto_ktp = "no_photo.jpg";
  $nama_foto_tulisan = "no_photo.jpg";
  $tanggal_daftar = $data['tanggal_now'];

  

  if (isset($_FILES)){
    if (isset($_FILES['foto'])){
      $foto = $_FILES['foto'];
      $temp = $_FILES['foto']['tmp_name'];
      $nama_foto = uniqid()."_".$_FILES['foto']['name'];
      $folderImage = "assets/img/caleg/";
      $terupload1 = move_uploaded_file($temp, $folderImage.$nama_foto);
      // var_dump($foto);

      if ($foto['error'] == 4){
        header("location: ?error=4");
        return false;
      }
    }
    if (isset($_FILES['foto_ktp'])){
      $foto_ktp = $_FILES['foto_ktp'];
      $temp = $_FILES['foto_ktp']['tmp_name'];
      $nama_foto_ktp = uniqid()."_".$_FILES['foto_ktp']['name'];
      $folderImage2 = "assets/img/ktp/";
      $terupload2 = move_uploaded_file($temp, $folderImage2.$nama_foto_ktp);
      // var_dump($foto_ktp);

      // if ($foto_ktp['error'] == 4){
      //   header("location: ?error=5");
      //   return false;
      // }
    }
    if (isset($_FILES['foto_tulisan'])){
      $foto_tulisan = $_FILES['foto_tulisan'];
      $temp = $_FILES['foto_tulisan']['tmp_name'];
      $nama_foto_tulisan = uniqid()."_".$_FILES['foto_tulisan']['name'];
      $folderImage3 = "assets/img/tulisan/";
      $terupload3 = move_uploaded_file($temp, $folderImage3.$nama_foto_tulisan);
      // var_dump($foto_tulisan);

      // if ($foto_tulisan['error'] == 4){
      //   header("location: ?error=6");
      //   return false;
      // }

    }
    
    $uname = $_SESSION['username'];

    $query = "INSERT INTO tb_data_caleg VALUES 
    (
      '$uname',
      CURDATE(),
      '',
      '$nik',
      '$nama',
      '$id_partai',
      '$id_jbt_partai',
      '$tempat_lahir',
      '$tanggal_lahir',
      '$id_gender',
      '$id_agama',
      '$id_pend',
      '$pekerjaan',
      '$bidang_pend',
      '$id_kelurahan',
      '$alamat_ktp',
      '$alamat_tinggal',
      '$telepon',
      '$email',
      '$facebook',
      '$twitter',
      '$instagram',
      '$tingkat_caleg',
      '$tempat_caleg',
      '$daerah_pilih',
      '$visi',
      '$misi',
      '$nama_foto',
      '$nama_foto_ktp',
      '$nama_foto_tulisan'
    )";

    $queryProv = "INSERT INTO tb_provinsi VALUES ('$id_provinsi', '$nama_provinsi')";
    $queryKab = "INSERT INTO tb_kabupaten VALUES ('$id_kabupaten', '$id_provinsi', '$nama_kabupaten')";
    $queryKec = "INSERT INTO tb_kecamatan VALUES ('$id_kecamatan', '$id_kabupaten', '$nama_kecamatan')";
    $queryKel = "INSERT INTO tb_kelurahan VALUES ('$id_kelurahan', '$id_kecamatan', '$nama_kelurahan')";

    $insertProv = mysqli_query($conn, $queryProv);
    $insertKab = mysqli_query($conn, $queryKab);
    $insertKec = mysqli_query($conn, $queryKec);
    $insertKel = mysqli_query($conn, $queryKel);

    $insert = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="./admin/images/icons/favicon.ico"/>
</head>
<body>
  
</body>
</html>