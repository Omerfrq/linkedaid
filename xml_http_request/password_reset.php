<?php
require_once '../core/init.php';
    if (isset($_POST['user_role']) && isset($_POST['email'])) {
      $user_role = $_POST['user_role'];
      $email = $_POST['email'];
      if (check_if_exists($con, $user_role, $email) == true) {
        $options = [
    'cost' => 12,
    ];

    $password = randomPassword();
    $hashed = password_hash($password, PASSWORD_BCRYPT, $options);
        $data = array(
          'password' => $hashed
        );
        if (dbRowUpdate($con, $user_role, $data, "WHERE email='$email'")) {
          $to = $email; // this is your Email address
          $from = 'eaglewings909@gmail.com'; // this is the sender's Email address
          $subject = 'New Password';
          $message = 'Hi! Your new password:"'.$password.'"';

          $headers = "From:" . $from;
          if(mail($to,$subject,$message,$headers)) {
            echo 1;
          } else {
            echo 0;
          }
        } else {
            return false;
        }
      } else {
        echo 0;
      }
    }
 ?>
