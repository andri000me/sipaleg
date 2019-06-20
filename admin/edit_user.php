<?php
  session_start();
  require '../functions.php';
  $login = sessionChecker();

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin != 1){
    header("Location: login");
    exit;
  }
  
  if (isset($_POST['update'])){
    $data = $_POST;
    $id = $data['id_user'];
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $queryUpdateUser = "UPDATE tb_user_login SET id='$id', username_login='$username', password='$password', email='$email' WHERE id='$id'";
    $up = updateData($queryUpdateUser);
  }

  if (empty($_GET['user'])){
    header("location: data_user");
    exit;
  }

  $uname = $_SESSION['usernameAdmin'];
  $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'"));
  $idUser = $_GET['user'];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user_login WHERE id=$idUser"));
  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Management | SIPALEG ADMIN</title>
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
             <h5 class="modal-title" id="exampleModalLabel"><i style="color: black;" class="fa fa-user fa-fw nav_icon"></i>Edit Data User Login</h5>
           </div>
           <div class="modal-body">
             <form method="post" action="edit_user">
             <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $user['id'] ?>" hidden='true' style="display: none;">
               
               <div class="form-group">
                 <label for="username" class="form-control-label">Username:</label>
                 <input type="text" class="form-control" id="username" name="username" value="<?= $user['username_login'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="password" class="form-control-label">Password:</label>
                 <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?>" required>
               </div>
               <div class="form-group">
                 <label for="email" class="form-control-label">Email:</label>
                 <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                     href="data_user" style="text-decoration: none;">Cancel</a></button>
                 <button type="submit" class="btn btn-danger" name="update" id="update">Update Data User</button>
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
