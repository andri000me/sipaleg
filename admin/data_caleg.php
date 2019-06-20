<?php
  session_start();
  require '../functions.php';
  $login = sessionChecker();

  $loginAdmin = sessionCheckerAdmin();

  if ($loginAdmin != 1){
    header("Location: login");
    exit;
  }

  $uname = $_SESSION['usernameAdmin'];
  $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$uname'"));

  $jumlahCALEG = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_caleg"));

  $calegs = mysqli_query($conn, "SELECT * FROM tb_data_caleg");
  $dataCalegs = getData($calegs);
  $dataPerPage = 5;
  if (isset($_GET)){
    if (empty($_GET['page'])) {
      $page = 1;
    }
    else {
      $page = $_GET['page'];
    }
  }
  $awalPage = ($page-1)*$dataPerPage;
  $jumlahPage = ceil($jumlahCALEG/$dataPerPage);
  $akhirPage = $page*$dataPerPage;
  if ($akhirPage == ($jumlahPage*$dataPerPage) ) {
    $akhirPage = $page*$dataPerPage-($page*$dataPerPage-$jumlahCALEG);
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
  table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
    
	}
  .table-title .btn span {
		float: left;
		margin-top: 2px;
	}
  .table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
    color: white;
	}
  .table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}

  table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
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
	       <div class="table-wrapper">
	         <div class="table-title">
	           <div class="row">
	             <div class="col-sm-5">
                 <h2>Calon Anggota Legislatif Management</h2>
                 
               </div>
               
                
	             <!-- <div class="col-sm-7">
            <a href="#" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
            <a href="#" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>
          </div> -->
             </div>
	         </div>
	         <table class="table table-striped table-hover">
	           <thead>
	             <tr>
	               <th>No</th>
	               <th>Foto</th>
	               <th>Name</th>
	               <th>NIK</th>
	               <th>Tingkat Caleg</th>
	               <th>Partai</th>
	               <th>Username Login</th>
	               <th>Action</th>
	             </tr>
	           </thead>
	           <tbody>
              
	             <?php for ($i=$awalPage; $i < $akhirPage ; $i++) :?>
	             <tr>
                 <?php $caleg = $dataCalegs[$i]; ?>
	               <td><?= $i+1 ?></td>
	               <td>
                   <img style="max-height: 50px;" src="../assets/img/caleg/<?= $caleg['foto'] ?>" class="avatar"
	                   alt="Avatar+<?= $i ?>">
	               </td>
                  <td><?= $caleg['nama'] ?></td>
	               <td><?= $caleg['nik'] ?></td>
	               <?php 
                    $idTingkat = $caleg['tingkat_caleg'];
                    $namaTingkat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_tingkat_caleg WHERE id_tingkat='$idTingkat'"))['nama_tingkat'];
                  ?>
                 <td><?= $namaTingkat ?></td>
                <?php 
                  $idPartai = $caleg['id_partai']; 
                  $namaPartai = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_partai WHERE id='$idPartai'"))['nama_partai'];
                ?>
	               <td><?= $namaPartai ?></td>
	               <td><?= $caleg['username'] ?></td>
	               <td>
	                 <!-- <a href="edit_data?caleg=<?= $caleg['id'] ?>" class="settings" title="Edit"><i
                  class="material-icons">&#xE8B8;</i></a> -->
	                 <a href="delete_data?caleg=<?= $caleg['id'] ?>" class="delete" title="Delete" data-toggle="tooltip">
	                   <i class="material-icons">&#xE5C9;</i>
	                 </a>
	               </td>
	             </tr>
	             <?php endfor; ?>
	           </tbody>
           </table>
           <div class="clearfix">
              <div class="hint-text">Showing <b><?= $akhirPage-$dataPerPage*($page-1) ?></b> out of <b><?= $jumlahCALEG ?></b> entries</div>
              <ul class="pagination">
                <?php if ($page != 1) : ?>
                <li class="page-item"><a href="?page=<?= $page-1 ?>">Previous</a></li>
                <?php endif; ?>
                <?php for ($i=1; $i <= $jumlahPage; $i++) : ?>
                <?php if ($page == $i) :?>
                <li class="page-item"><a  style="background: #F44336; color: white;" href="?page=<?= $i ?>" class="page-link"><?= $i ?></a></li>
                <?php else : ?>
                <li class="page-item"><a href="?page=<?= $i ?>" class="page-link"><?= $i ?></a></li>
                <?php endif; endfor; ?> 
                <?php if ($page != $jumlahPage) : ?>
                <li class="page-item"><a href="?page=<?= $page+1 ?>" class="page-link">Next</a></li>
                <?php endif; ?>
              </ul>
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
