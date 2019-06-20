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
        $idCaleg = $_GET['caleg'];
        
        $deleteCalegFamily = mysqli_query($conn, "DELETE FROM tb_anggota_keluarga WHERE id_caleg='$idCaleg'");
        $addLogCaleg = mysqli_query($conn, "INSERT INTO tb_delete_caleg SELECT * FROM tb_data_caleg WHERE id='$idCaleg'");
        $deleteCaleg = mysqli_query($conn, "DELETE FROM tb_data_caleg WHERE id='$idCaleg'");
        $del = mysqli_affected_rows($conn);
        if ($del > 0) {
           header("location: data_caleg");
           exit;
        }
    }

    if(!empty($_GET['admin'])){
        $idAdmin = $_GET['admin'];
        
        $deleteAdmin = mysqli_query($conn, "DELETE FROM tb_admin WHERE id='$idAdmin'");
        $del = mysqli_affected_rows($conn);
        if ($del > 0) {
           header("location: data_admin");
           exit;
        }
    }

    if(!empty($_GET['user'])){
        $idUser = $_GET['user'];
        
        $deleteUser = mysqli_query($conn, "DELETE FROM tb_user_login WHERE id='$idUser'");
        $del = mysqli_affected_rows($conn);
        if ($del > 0) {
           header("location: data_user");
           exit;
        }
    }

    if(!empty($_GET['partai'])){
        $idPartai = $_GET['partai'];
        
        $deletePartai = mysqli_query($conn, "DELETE FROM tb_partai WHERE id='$idPartai'");
        $del = mysqli_affected_rows($conn);
        if ($del > 0) {
           header("location: partai");
           exit;
        }
    }

    header("location: index");
    exit;

?>