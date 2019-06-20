<?php
    session_start();
    require '../functions.php';
    $login = sessionChecker();
  
    $loginAdmin = sessionCheckerAdmin();
  
    if ($loginAdmin != 1){
      header("Location: login");
      return false;
      exit;
    }


    if(!empty($_GET['caleg'])){
        $id = $_GET['caleg'];
        header("location: edit_caleg?caleg=$id");
    }

    if(!empty($_GET['admin'])){
        $id = $_GET['admin'];
        header("location: edit_admin?admin=$id");
    }

    if(!empty($_GET['user'])){
        $id = $_GET['user'];
        header("location: edit_user?user=$id");
    }

    if(!empty($_GET['partai'])){
        $id = $_GET['partai'];
        header("location: edit_partai?partai=$id");
    }
    exit;

?>