<?php
 require '../core/init.php';
 $item_per_page = 4;

 //Get page number from Ajax
 if(isset($_POST["page"])){
 $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
 }else{
 $page_number = 1; //if there's no page number, set it to 1
 }

 //get total number of records from database
 $results = $con->query("SELECT COUNT(d_id) FROM donations WHERE n_id = '".$_SESSION['id']."'");
 $get_total_rows = $results->fetch_row(); //hold total records in variable
 //break records into pages
 $total_pages = ceil($get_total_rows[0]/$item_per_page);

 //position of records
 $page_position = (($page_number-1) * $item_per_page);

 //Limit our results within a specified range.


 $results = $con->prepare("SELECT DISTINCT donations.d_id, donor.id, donor.f_name, donor.l_name, donor.pic_name, donor.donor_city, donor.donor_country
  FROM donations INNER JOIN donor ON donations.d_id = donor.user_id WHERE donations.n_id = '".$_SESSION['id']."' ORDER BY donations.id ASC LIMIT $page_position, $item_per_page");
 $results->execute(); //Execute prepared Query
 $results->bind_result($id, $donor_id, $f_name, $l_name, $pic_name, $city, $country); //bind variables to prepared statement

 //Display records fetched from database.
 while($results->fetch()){ //fetch values
 ?>
 <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
     <div class="ui-block">

         <!-- Friend Item -->
         <div class="friend-item friend-groups">

             <div class="friend-item-content">

                 <div class="friend-avatar">
                     <div class="author-thumb">
                         <img src="img/friend-group1.png" alt="LindedAID">
                     </div>
                     <div class="author-content">
                         <a href="javascript:void(0)" class="h5 author-name"><?php echo $f_name . ' ' . $l_name; ?></a>
                         <div class="country"><?php echo $city ?>, <?php echo $country; ?></div>
                     </div>
                 </div>

                 <p class="country" data-swiper-parallax="-500">
                     <a href="publicprofilePage.php?id=<?php echo $donor_id; ?>" class="btn btn-breez btn-sm">View Profile</a>
                 </p>

             </div>
         </div>
       </div>
       </div>

 <?php
 }
?>
<div class="col-md-12">

<nav aria-label="Page navigation">
  <?php
 echo '<div align="center">';
 // To generate links, we call the pagination function here.
 echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
 echo '</div>';
 ?>
 </nav>
</div>
