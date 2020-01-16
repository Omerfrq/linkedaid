<?php
require_once '../core/init.php';
    if (isset($_FILES['ngo_profile_pic'])) {

      $img = $_FILES['ngo_profile_pic'];
      $img_name = $_FILES['ngo_profile_pic']['name'];
      $img_type = $_FILES['ngo_profile_pic']['type'];
      $img_size = $_FILES['ngo_profile_pic']['size'];
      $file_tmp = $_FILES['ngo_profile_pic']['tmp_name'];

      $explode = explode('.',$img_name);
      $file_ext = strtolower(end($explode));
      $extensions= array("jpeg","jpg","png");
       if(in_array($file_ext,$extensions)=== false){
              echo 3;
           } elseif ($img_size > 2097152) {
             echo 2;
           } else {
            if(move_uploaded_file($file_tmp,"../img/".$img_name)) {

            $data = array(
              'pic_name' => $img_name,
              'pic_type' => $img_type,
              'pic_size' => $img_size,
              'date_added' => date('Y-m-d')
             );

             $id = $_SESSION['id'];
            if(dbRowUpdate($con, 'ngo', $data, "WHERE user_id='$id'")) {
              echo 1;
            }
          }
        }

    }

    if (isset($_FILES['donor_profile_pic'])) {

      $img = $_FILES['donor_profile_pic'];
      $img_name = $_FILES['donor_profile_pic']['name'];
      $img_type = $_FILES['donor_profile_pic']['type'];
      $img_size = $_FILES['donor_profile_pic']['size'];
      $file_tmp = $_FILES['donor_profile_pic']['tmp_name'];

      $explode = explode('.',$img_name);
      $file_ext = strtolower(end($explode));
      $extensions= array("jpeg","jpg","png");
       if(in_array($file_ext,$extensions)=== false){
              echo 3;
           } elseif ($img_size > 2097152) {
             echo 2;
           } else {
            if(move_uploaded_file($file_tmp,"../img/".$img_name)) {

            $data = array(
              'pic_name' => $img_name,
              'pic_type' => $img_type,
              'pic_size' => $img_size,
              'date_added' => date('Y-m-d')
             );
             $id = $_SESSION['id'];
            if(dbRowUpdate($con, 'donor', $data, "WHERE user_id='$id'")) {
              echo 1;
            }
          } else {
            echo 0;
          }
        }

    }
 ?>
