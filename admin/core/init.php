<?php
  require 'functions.php';
  $host = "localhost";
  $username = "root";
  $password = "";
  $db = "safehao1_linkedaid";
  $con = mysqli_connect($host, $username, $password, $db);
  if (!$con) {
    echo "<script>alert('Error establishing database connection');</script>";
  } else {

  }

  session_start();
  if (isset($_POST['login_submit'])) {
    $data = userLogin($con, $_POST['username'], $_POST['password']);
    if ($data != 1) {
      header("location: ../login.php?loginFailed");
    } else {

      $_SESSION['id'] = $data;
      // echo "<script>window.location.href='../index.php'</script>";
      header("location: ../index.php");
    }

  }
  
  if (!$_SESSION['id']) {
    header("location: login.php");
  }
 ?>
