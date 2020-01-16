<?php
require_once '../core/init.php';
if (isset($_POST['confirm_current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
  $current = $_POST['confirm_current_password'];
  $new = $_POST['new_password'];
  $confirm = $_POST['confirm_new_password'];
  $id = $_SESSION['id'];
  $user = $_SESSION['user'];
  if (check_current_password($con, $current, $id) == false) {
    echo 'Wrong Password';
  } else {
    $options = [
      'cost' => 12,
  ];
    $hashed = password_hash($confirm, PASSWORD_BCRYPT, $options);

      $data = array(
        'password' => $hashed,
       );

      if (dbRowUpdate($con, 'users', $data, "WHERE id='$id'")) {
        echo true;
      } else {
        echo false;
      }
  }
}
 ?>
