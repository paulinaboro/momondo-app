<?php
  session_start();
  if(  !isset($_SESSION['sEmail']) ){
    header('Location: admin-login.php');
    exit();
  }
?>