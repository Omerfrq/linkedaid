<?php
require_once '../core/init.php';
if (isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
$to = "eaglewings909@gmail.com"; // this is your Email address
$from = $_POST['email']; // this is the sender's Email address
$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = "From:" . $from;
if(mail($to,$subject,$message,$headers)) {
  echo 1;
} else {
  echo 0;
}
// You can also use header('Location: thank_you.php'); to redirect to another page.

}
 ?>
