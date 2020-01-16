<?php
  require 'core/init.php';
  $arrayName = array(
    'No Poverty',
    'Zero Hunger',
    'Good Health And Well Being',
    'Quality Education',
    'Gender Equality',
    'Clean Water and Sanitation',
    'Affordable and Clean Energy',
    'Decent Work and Economic Growth',
    'Industry / Innovation and Infrastucture',
    'Reduced Inequalities',
    'Sustainable cities and Communities',
    'Responsible Consumption and Production',
    'Climate Action',
    'Life below Water',
    'Life on Land',
    'Peace / Justice and Strong Institutions',
    'Partnerships for Goals',
  );

  $total_values = count($arrayName);
  for ($i=0; $i < $total_values; $i++) {
    // echo $arrayName[$i];
    mysqli_query($con, "INSERT INTO sectors_of_action(sector) VALUES('$arrayName[$i]')");
  }
 ?>
