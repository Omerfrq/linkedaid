<?php
require_once '../core/init.php';
  if (isset($_POST['post_id']) && isset($_POST['userId'])) {
    $data = array(
      'post_id' => $_POST['post_id'],
      'user_id' => $_POST['userId']
     );

     if (dbRowInsert($con, 'post_shares', $data)) {
       echo 1;
     } else {
       echo 0;
     }
  }
 ?>
