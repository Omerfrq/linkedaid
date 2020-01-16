<?php
require_once '../core/init.php';
if (isset($_POST['userId']) && isset($_POST['tbl_name']) && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['userId'];
    $table_name = $_POST['tbl_name'];
    if (isset($_POST['elementId'])) {
      $id = $_POST['elementId'];
    } else {
      $id = $post_id;
    }
    if ($table_name == "post_likes") {
      $data = array(
        'post_id' => $post_id,
        'user_id' => $user_id
      );
    } else {
      $data = array(
        'user_id' => $user_id,
        'post_id' => $post_id,
        'comment_id' => $id
      );
    }

    if ($table_name == "post_likes") {
      $field = "post_id";
    } elseif ($table_name == "comment_likes") {
      $field = "comment_id";
    }
    if (check_post_liked($con, $field, $id, $user_id, $table_name) == true) {
      if ($table_name == "post_likes") {
        $sql = mysqli_query($con, "DELETE FROM $table_name WHERE post_id = '$post_id' AND user_id = '$user_id'");
      } elseif ($table_name == "comment_likes") {
        $sql = mysqli_query($con, "DELETE FROM $table_name WHERE post_id = '$post_id' AND user_id = '$user_id' AND comment_id = '$id'");
      }
      if ($sql) {
        echo 'd1';
      } else {
        echo 'd2';
      }

      } else {
      if (dbRowInsert($con, $table_name, $data)) {
        echo 'l1';
      } else {
        echo 'l2';
      }
    }


}
 ?>
