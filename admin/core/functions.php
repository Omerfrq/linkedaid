<?php
  function userLogin($con, $username, $password) {
    $sql = $con->prepare("SELECT id, username, password FROM admin WHERE username=? LIMIT 1");
    $sql->bind_param('s', $username);
    $sql->execute();
    $sql->bind_result($id, $db_username, $db_password);
    $sql->store_result();
    if($sql->num_rows == 1)  //To check if the row exists
    {
      while($sql->fetch()) //fetching the contents of the row
      {
        $id = $id;
      }
        if (password_verify($password, $db_password)) {
          return $id;
        } else {
          return "Incorrect Password!";
        }
      } else {
      return 0;
    }
  }
 ?>
