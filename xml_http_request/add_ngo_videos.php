<?php
require_once '../core/init.php';
  // if (isset($_FILES['ngo_video']) && isset($_POST['id'])) {
  //
  //   $video = $_FILES['ngo_video'];
  //   $video_name = $_FILES['ngo_video']['name'];
  //   $video_type = $_FILES['ngo_video']['type'];
  //   $video_size = $_FILES['ngo_video']['size'];
  //   $file_tmp = $_FILES['ngo_video']['tmp_name'];
  //
  //   echo $_FILES['ngo_video']['type'] . "<br>";
  //   $explode = explode('.',$video_name);
  //   $videoFileType = strtolower(end($explode));
  //   $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
  //
  //   if(in_array($videoFileType,$extensions_arr)=== false){
  //          echo 3;
  //       // } elseif ($video_size > 4836239) {
  //       //   echo 2;
  //
  //       } else {
  //       if(move_uploaded_file($file_tmp,"../videos/".$video_name)) {
  //         $data = array(
  //           'p_id' => $_POST['id'],
  //           'v_name' => $video_name,
  //           'v_type' => $video_type,
  //           // 'v_size' => $video_size,
  //           'date_added' => date('Y-m-d')
  //          );
  //
  //         if(dbRowInsert($con, 'ngo_videos', $data)) {
  //           echo 1;
  //         } else {
  //           echo 0;
  //         }
  //       } else {
  //         echo $_FILES['ngo_video']['error'];
  //         echo "Could Not Move File!";
  //       }
  //       }
  // }



 ?>
