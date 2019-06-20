<?php
  require '../functions.php';
  session_start();
  unset($_SESSION["usernameAdmin"]);
  unset($_SESSION["statusAdmin"]);
  header("Location: login");
  exit;
?>
