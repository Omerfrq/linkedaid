<?php
  require 'functions.php';

  $host = "localhost";
  $username = "root";
  $password = "";
  $db = "safehao1_linkedaid";

  $con = mysqli_connect($host, $username, $password, $db);
  if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
  }

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['user_type'])) {
  $user_data = get_user_by_id($con, $_SESSION['user_type'], $_SESSION['id']);
}
  function login($con, $email, $password, $usertype) {
    $data = check_login($con, $email, $password, $usertype);
    if ($data == null) {
      echo 0;
    } elseif ($data == 0) {
      echo "Incorrect Password";
    } elseif ($data == 1) {
      echo 1;
    } elseif ($data == 2) {
      echo 2;
    } else {
       $_SESSION['id'] = $data[0];
       $_SESSION['user_type'] = $data[1];
       $_SESSION['user_email'] = $data[2];
       if ($_SESSION['user_type'] == 1) {
         $_SESSION['user'] = "ngo";
       } elseif ($_SESSION['user_type'] == 2) {
         $_SESSION['user'] = "donor";
       }
       echo "Authenticated";
    }

  }

  // check_user_info($con, $user_data['id'], $_SESSION['user']);
  // if (isset($_GET['profile_data'])) {
  //   echo json_encode(get_user_by_id($con, 'ngo', $_SESSION['id']));
  // }


  if (isset($_POST['type'])) {

  if($_POST['type'] == 'login') {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $usertype = $_POST['usertype'];
      login($con, $email, $password, $usertype);
  }
  }




 ?>
