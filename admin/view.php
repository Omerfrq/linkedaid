
<?php require 'templates/header.php'; ?>
<?php
 if (isset($_POST['approve'])) {
  if(mysqli_query($con, "UPDATE ngo SET status = 1 WHERE id = '".$_POST['approve_ngo_id']."'")) {
    echo "<script>alert('Ngo Approved Successfully!');</script>";
  }
}

  if (isset($_POST['reject'])) {
    if(mysqli_query($con, "UPDATE ngo SET status = 2 WHERE id = '".$_POST['reject_ngo_id']."'")) {
      echo "<script>alert('Ngo Approved Successfully!');</script>";
    }
  }
?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <?php require 'templates/navbar.php'; ?>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
      <?php require 'templates/sidebar.php'; ?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Donors</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->

          <section class="p-3">
          <?php
                            $id = $_GET['id'];
                            $i = 1;
                        
                            $sql = mysqli_query($con, 
                            "SELECT *
                            FROM donor 
                            where id=$id"
                            );
                            $row = mysqli_fetch_array($sql);
                             { ?>
                    <div class="container-fluid">
                       <div class="row font-sans">
                           <div class="col-md-9">
                             <div class="jumbotron h-100 bg-white shadow text-center ">
                               <h1 class="display-4 font-raleway text-capitalize"><?php echo $row['f_name']?> <?php echo $row['l_name']?></h1>
                               <p class="lead"><?php echo $row['description']?></p>
                              <hr class="my-1">
                              <p class="lead"> 
                              <?php echo $row['donor_occupation'] ?>
                                </p>
                              <p class="font-weight-bold">
                                Social Media</p>
                                <div class="col-md-12">
                                  <div class="row justify-content-around mt-5">
                <a 
                class="mb-2 btn btn-fb col-md-4" 
                target="_blank"
                    href='www.google.com'>
                    <i class="fa fa-facebook-f"></i>
                    Facebook
                  </a>

                <a class=" mb-2 col-md-4 btn btn-info" role="button"
                href="<?php echo $row['donor_tw_account']?>">
                <i class="fa fa-twitter"></i>
                 Twitter
                  </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
        <ul class="list-group shadow ">
            <li class="list-group-item">
            <span class="d-flex justify-content-between align-items-center">
                    <strong class="">Details</strong>
                      <i class="fa fa-user fa-1x"></i>
                             </span>
                </li>
                <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">Gender</strong>
                    <span><?php echo $row['donor_country']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">DOB</strong>
                    <span><?php echo $row['donor_dob']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">M Status</strong>
                    <span><?php echo $row['donor_marital_status']?></span
                    ></span> 
                  </li>
                </ul>


                <ul class="list-group shadow mb-2 mt-2">
            <li class="list-group-item">
            <span class="d-flex justify-content-between align-items-center">
            <strong class="">Contact</strong>
                      <i class="fa fa-phone fa-1x"></i>
                             </span>
             
                             <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">Phone</strong>
                    <span><?php echo $row['donor_phone']?></span
                    ></span> 
                  </li>
                
                </li>
            
                </ul>
      
            <ul class="list-group shadow mb-2">
            <li class="list-group-item">
            <span class="d-flex justify-content-between align-items-center">
                    <strong>Location</strong>
                      <i class="fa fa-map-marker fa-1x"></i>
                             </span>
                </li>
                <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong>County</strong>
                    <span><?php echo $row['donor_country']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong>City</strong>
                    <span><?php echo $row['donor_city']?></span
                    ></span> 
                  </li>
                </ul>

          </div>
          
             
                             <?php } ?>
                      </section>
             
                       
           
          <!-- Projects Section-->

          <!-- Page Footer-->
          <?php require 'templates/footer.php'; ?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <?php require 'templates/footer-scripts.php'; ?>
  </body>
</html>
