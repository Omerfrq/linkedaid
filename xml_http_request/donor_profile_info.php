<?php
require_once '../core/init.php';

if (isset($_POST['first_name']) || isset($_POST['last_name'])
 || isset($_POST['email']) || isset($_POST['datetimepicker']) ||isset($_POST['donor_phone'])
 || isset($_POST['donor_country']) || isset($_POST['donor_city']) || isset($_POST['description'])
 || isset($_POST['donor_competencies']) || isset($_POST['donor_occupation']) || isset($_POST['donor_marital_status'])
 || isset($_POST['p_sectors_of_action']) || isset($_POST['donor_fb_account']) || isset($_POST['donor_tw_account']))

{

  $sectors_of_action = implode(",", $_POST['p_sectors_of_action']);

  $data = array(
    'f_name' => $_POST['first_name'],
    'l_name' => $_POST['last_name'] ,
    'donor_gender' => $_POST['gender'] ,
    'donor_phone' => $_POST['donor_phone'] ,
    'donor_country' => $_POST['donor_country'] ,
    'donor_city' => $_POST['donor_city'] ,
    'donor_dob' => date('Y-m-d', strtotime($_POST['datetimepicker'])) ,
    'description' => $_POST['description'] ,
    'donor_occupation' => $_POST['donor_occupation'] ,
    'donor_marital_status' => $_POST['donor_marital_status'] ,
    'p_sectors_of_action' => $sectors_of_action ,
    'donor_fb_account' => $_POST['donor_tw_account'],
    'donor_tw_account' => $_POST['donor_fb_account'],
    'donor_competencies' => $_POST['donor_competencies'],
  );

  $id = $user_data['id'];
  if (dbRowUpdate($con, "donor", $data, "WHERE id='$id'")) {
      echo true;
  } else {
    echo false;
  }
}
 ?>
