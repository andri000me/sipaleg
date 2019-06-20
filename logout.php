<?php
  require "functions.php";
  session_start();
  unset($_SESSION["username"]);
  unset($_SESSION["status"]);
  header("Location: index");
  exit;
?>
