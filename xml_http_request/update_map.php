<?php
require_once '../core/init.php';
if (isset($_POST['ngo_latitude']) && isset($_POST['ngo_longitude']) && isset($_POST['ngo_address'])) {
  $data = array(
      'latitute' => $_POST['ngo_latitude'],
      'longitude' => $_POST['ngo_longitude'],
      'ngo_address' => $_POST['ngo_address'],
     );
     $id = $_SESSION['id'];
    if (dbRowUpdate($con, 'ngo', $data, "WHERE user_id='$id'")) {
        echo 1;
    }
}

 ?>
