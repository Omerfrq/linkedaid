<?php
require_once '../core/init.php';
if (isset($_POST['contact_person_first_name']) || isset($_POST['contact_person_last_name']) || isset($_POST['active_since_date']) ||isset($_POST['website'])
 || isset($_POST['phone_no']) || isset($_POST['country_of_operation']) || isset($_POST['city_of_operation'])
 || isset($_POST['description']) || isset($_POST['hq_location']) || isset($_POST['sectors_of_action'])
 || isset($_POST['additional_info']) || isset($_POST['facebook_account_link']) || isset($_POST['twitter_account_link']))

{
  $date = date('Y-m-d', strtotime($_POST['active_since_date']));
  $sectors_of_action = implode(",", $_POST['sectors_of_action']);
  $data = array(
    'cp_fname' => $_POST['contact_person_first_name'],
    'cp_lname' => $_POST['contact_person_last_name'] ,
    'ngo_active_since' => $date ,
    'ngo_website' => $_POST['website'] ,
    'ngo_phone' => $_POST['phone_no'] ,
    'ngo_country_of_op' => $_POST['country_of_operation'] ,
    'ngo_city_of_op' => $_POST['city_of_operation'] ,
    'ngo_hq' => $_POST['hq_location'] ,
    'ngo_page_description' => $_POST['description'] ,
    'sectors_of_action' => $sectors_of_action,
    'additional_info' => $_POST['additional_info'] ,
    'ngo_fb_account' => $_POST['facebook_account_link'] ,
    'ngo_tw_account' => $_POST['twitter_account_link']
  );



  $id = $_SESSION['id'];
  if (dbRowUpdate($con, "ngo", $data, "WHERE user_id='$id'")) {
      echo true;
  } else {
    echo false;
  }
}
 ?>
