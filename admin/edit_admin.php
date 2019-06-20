<?php
  session_start();
  require '../functions.php';
  $login = sessionChecker();

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin != 1){
    header("Location: login");
    exit;
  }
  
  $error = "";
  
  if (isset($_POST['update'])){
    $data = $_POST;
    $id = $data['ida'];
    $username = $data['username'];
    $nama = $data['admin_name'];
    $password = $data['password'];
    $email = $data['email'];
    $nama_foto_admin = $data['img_admin'];
    // var_dump($_FILES);
    if (isset($_FILES['foto_admin'])){
      if ($_FILES['foto_admin']['size'] < 512000 && $_FILES['foto_admin']['error'] == 0) {
      $temp = $_FILES['foto_admin']['tmp_name'];
      $nama_foto_admin = uniqid()."_".$_FILES['foto_admin']['name'];
      $folderImage2 = "../assets/img/admin/";
      $terupload2 = move_uploaded_file($temp, $folderImage2.$nama_foto_admin);
      }
      elseif ($_FILES['foto_admin']['error'] == 4) {
        $error = "";
      }
      else {
        $error = "File Lebih Dari 512kb";
      }
    }
    $queryUpdateAdmin = "UPDATE tb_admin SET username='$username', password='$password', admin_name='$nama', email_admin='$email', foto_admin='$nama_foto_admin' WHERE id_admin='$id'";
    $up = updateData($queryUpdateAdmin);
  }

  if (empty($_GET['admin'])){
    header("location: data_admin");
    exit;
  }

  $uname = $_SESSION['usernameAdmin'];
  $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'"));
  $idAdmin = $_GET['admin'];
  $dataAdmin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin=$idAdmin"));
  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Edit data admin | SIPALEG ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
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
</style>

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
        <div class="col-md-12 graphs">
	   <div class="xs">
	     <div class="bs-example4" data-example-id="contextual-table">
      
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><i style="color: black;" class="fa fa-user fa-fw nav_icon"></i>Edit Data Admin</h5>
           </div>
           <div class="modal-body">
             <form method="post" action="edit_admin" enctype="multipart/form-data">
             <input type="text" class="form-control" id="ida" name="ida" value="<?= $dataAdmin['id_admin'] ?>" style="display: none;">
               <div class="form-group">
                 <label for="username" class="form-control-label">Username:</label>
                 <input type="text" class="form-control" id="username" name="username" value="<?= $dataAdmin['username'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="password" class="form-control-label">Password:</label>
                 <input type="text" class="form-control" id="password" name="password" value="<?= $dataAdmin['password'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="admin_name" class="form-control-label">Nama Admin:</label>
                 <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?= $dataAdmin['admin_name'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="email" class="form-control-label">Email Admin:</label>
                 <input type="email" class="form-control" id="email" name="email" value="<?= $dataAdmin['email_admin'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="foto_admin" class="form-control-label">Foto Admin (max: 512kb; ):</label>
                 <input type="text" class="form-control" id="img_admin" name="img_admin" value="<?= $dataAdmin['foto_admin'] ?>" style="display: none;">
                 <img src="../assets/img/admin/<?= $dataAdmin['foto_admin'] ?>" alt="<?= $dataAdmin['foto_admin'] ?>" class="img-thumbnail" style="max-height: 50px;">&nbsp;<span class="text-danger"><?= $error ?></span>
                 <input type="file" class="form-control" id="foto_admin" name="foto_admin">
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                     href="data_admin" style="text-decoration: none;">Cancel</a></button>
                 <button type="submit" class="btn btn-danger" name="update" id="update">Update Data Admin</button>
               </div>
             </form>
           </div>
           
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
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
