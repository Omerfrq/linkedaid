<?php
require_once('../core/init.php');
  require_once('../vendor/autoload.php');
  // require_once('config/db.php');
  // require_once('lib/pdo_db.php');
  // require_once('models/Customer.php');
  // require_once('models/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_6fXmqQUTJC0nq7OeKZ7qofea');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $first_name = $user_data['f_name'];
  $last_name = $user_data['l_name'];
  $email = $_SESSION['user_email'];
  $donor_u_id = $_SESSION['id'];
  $ngo_u_id = $_POST['ngo_u_id'];
  $amount = $_POST['donation_amount'] . '00';
  $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $amount,
  "currency" => "usd",
  "customer" => $customer->id
));



  $pay_date = date('Y-m-d');
  mysqli_query($con, "INSERT INTO donations(n_id, d_id, donated_amount, pay_date) VALUES('$ngo_u_id', '$donor_u_id', '".$_POST['donation_amount']."', '$pay_date')");


// Redirect to success
  header('Location: ../dashboardDonations.php?donation_success');
