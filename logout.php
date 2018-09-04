<?php
  session_start();

  unset($_SESSION['username']);
  unset($_SESSION['full_name']);
  unset($_SESSION['time']);
  unset($_SESSION['date']);
  unset($_SESSION['others_username']);
  unset($_SESSION['others_full_name']);
  //unset($_SESSION['username']);
  //unset($_SESSION['username']);
  unset($_SESSION['logout']);

  session_destroy();

  header("Location:login.php");
?>