<?php
require 'core/init.php';
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

$explode = explode('.',$fileName);
  $videoFileType = strtolower(end($explode));
  $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

  if(in_array($videoFileType,$extensions_arr) == false){
         echo 1;
         exit();
      } elseif ($fileSize > 4836239) {
        echo 2;
        exit();
      }

if(move_uploaded_file($fileTmpLoc, "videos/$fileName")){
  $data = array(
    'user_id' => $_SESSION['id'],
    'v_title' => $_POST['v_title'],
    'v_name' => $fileName,
    'v_type' => $fileType,
    'v_size' => $fileSize,
    'date_added' => date('Y-m-d')
   );

  if(dbRowInsert($con, 'ngo_videos', $data)) {
        echo 3;
      } else {
        echo 4;
        exit();
  }
} else {
  echo 5;
}

?>
