<?php
require_once '../core/init.php';
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])
 && isset($_POST['description'])) {
   $firstName = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $description = $_POST['description'];
   $options = [
 'cost' => 12,
 ];

 $hashed = password_hash($password, PASSWORD_BCRYPT, $options);
   registeruser($con, $firstName, $lastname, $email, $hashed, $description);
}

function registeruser($con, $firstName, $lastname, $email, $password, $description) {

    if(check_if_exists($con, 'users', $email) == 1) {
        echo 1;
    } else {
        $SQL = "INSERT INTO `users`(`user_type_id`, `email`, `password`) VALUES ('2', '$email', '$password')";
        $result = mysqli_query($con, $SQL);
        $user_id = mysqli_insert_id($con);
        if($result) {
          if(mysqli_query($con, "INSERT INTO `donor`(`user_id`, `f_name`, `l_name`, `description`)
           VALUES ('$user_id', '$firstName', '$lastname', '$description')")) {
             $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));
             $_SESSION['id'] = $row['id'];
             $_SESSION['user_type'] = $row['user_type_id'];
             $_SESSION['user_email'] = $row['email'];
             $_SESSION['user'] = "donor";
            echo 'logged_in';
            }
        }else {
            echo 'cannot_create';
        }
    }
}

?>
