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
 $results = $con->query("SELECT COUNT(*) FROM ngo");
 $get_total_rows = $results->fetch_row(); //hold total records in variable
 //break records into pages
 $total_pages = ceil($get_total_rows[0]/$item_per_page);

 //position of records
 $page_position = (($page_number-1) * $item_per_page);

 //Limit our results within a specified range.
 $results = $con->prepare("SELECT id, ngo_name, ngo_hq, ngo_page_description, pic_name FROM ngo ORDER BY id ASC LIMIT $page_position, $item_per_page");
 $results->execute(); //Execute prepared Query
 $results->bind_result($id, $name, $ngo_hq, $ngo_page_description, $pic); //bind variables to prepared statement

 //Display records fetched from database.
 while($results->fetch()){ //fetch values
 ?>


 <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
     <div class="ui-block">

         <!-- Friend Item -->

         <div class="friend-item">

             <div class="friend-header-thumb">
                 <img src="img/friend-groups-bg.png" alt="friend">
             </div>


             <div class="friend-item friend-groups">

                 <div class="friend-item-content">

                     <div class="friend-avatar">
                         <div class="author-thumb">
                             <img src="img/<?php echo $pic; ?>" alt="author" style="border-radius : 0% !important;">
                         </div>
                         <div class="author-content">
                             <a href="#" class="h5 author-name"><?php echo $name; ?></a>
                             <div class="country"><?php echo $ngo_hq; ?></div>
                         </div>
                     </div>

                     <div class="swiper-container">
                         <div class="swiper-wrapper">
                             <div class="swiper-slide">
                                 <div class="friend-count" data-swiper-parallax="-500">
                                     <p class="country" data-swiper-parallax="-500">
                                        <?php echo $ngo_page_description; ?>

                                     </p>

                                 </div>

                             </div>
                         </div>

                         <!-- If we need pagination -->
                         <div class="">
                           <a href="ngoProfilepublic.php?<?php echo $id;?>" class="btn btn-blue btn-sm">View Profile</a>

                         </div>


                     </div>

                 </div>
             </div>
         </div>

         <!-- ... end Friend Item -->
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
