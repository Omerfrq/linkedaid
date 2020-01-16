<?php
require_once '../core/init.php';
if (isset($_POST['firstname']) && isset($_POST['lastname']) 
&& isset($_POST['email']) && isset($_POST['password'])
 && isset($_POST['name'])) {
   $firstName = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $countries = implode(" ", $_POST['countries']);

   registerngo($con, $firstName, $lastname, $email, $password, $name, $countries);
}
function registerngo($con, $firstName, $lastname, $email, $password, $name, $countries) {

  if(check_if_exists($con, 'users', $email) == true) {
      echo 1;
      exit();
    } else {
      $options = [
  'cost' => 12,
  ];

  $hashed = password_hash($password, PASSWORD_BCRYPT, $options);
      // $data = array(
      //   'ngo_name' => $name ,
      //   'ngo_country_of_op' => $countries ,
      //   'cp_fname' => $firstName,
      //   'cp_lname' => $lastname,
      //   'email' => $email,
      //   'password' => $hashed
      // );

      $SQL = "INSERT INTO `users`(`user_type_id`, `email`, `password`) VALUES ('1', '$email', '$hashed')";
      $result = mysqli_query($con, $SQL);
      $user_id = mysqli_insert_id($con);
      if($result) {
      if(mysqli_query($con, "INSERT INTO `ngo`(`user_id`, `cp_fname`, `cp_lname`, `ngo_name`, `ngo_country_of_op`)
      VALUES ($user_id, '$firstName', '$lastname', '$name', '$countries')")) {
        $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_type'] = $row['user_type_id'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user'] = "ngo";
        echo true;
      }

} else {
  echo false;
}


    }
}

 ?>
