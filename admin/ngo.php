<?php require 'templates/header.php'; ?>
<?php
 if (isset($_POST['approve'])) {
  if(mysqli_query($con, "UPDATE ngo SET status = 1 WHERE id = '".$_POST['approve_ngo_id']."'")) {
    echo "<script>alert('Ngo Approved Successfully!');</script>";
  }
}

  if (isset($_POST['reject'])) {
    if(mysqli_query($con, "UPDATE ngo SET status = 2 WHERE id = '".$_POST['reject_ngo_id']."'")) {
      echo "<script>alert('Ngo Rejected Successfully!');</script>";
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
              <h2 class="no-margin-bottom">NGO's</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->

          <section class="p-3">
          <?php
                                $id = $_GET['id'];
                              $i = 1;
                              $sql = mysqli_query($con, "SELECT 
                                    *
                              FROM ngo
                              where id=$id
                              ");
                              while ($row = mysqli_fetch_array($sql)) { ?>
                      <div class="container-fluid">
                       <div class="row font-sans">
                           <div class="col-md-9">
                             <div class="jumbotron  bg-white shadow text-center ">
                               <h1 class=" font-raleway text-capitalize">
                               <?php echo $row['ngo_name']?></h1>
                               <p class="lead"><?php echo $row['ngo_page_description']?></p>
                              <hr class="my-1">
                              <p class="lead"> 
                              <?php echo $row['ngo_address'] ?>
                                </p>
                                <?php
                                if ($row['status'] == 0) { ?>
                                  <div class="col-md-12">
                                  <div class="row justify-content-around mt-5">
                                  <button type="button" 
                                  class="col-md-4 mb-2 btn btn-primary"
                                   data-toggle="modal"
                                    data-target="#approveModal<?php echo $row['id']; ?>">Approve
                                    </button>
                                  <button type="button" class="col-md-4 mb-2 btn btn-danger" data-toggle="modal" data-target="#rejectModal<?php echo $row['id']; ?>">Reject</button>
                                  </div>
                                  </div>
                                <?php } else { ?>
                                  
                                <?php } ?>
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
                    <span><?php echo $row['cp_fname']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">Active</strong>
                    <span><?php echo $row['ngo_active_since']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong class="">M Status</strong>
                    <span><?php
                                if ($row['status'] == 0) { echo "Pending"; } elseif($row['status'] == 1) { echo "Approved"; }
                                 elseif ($row['status'] == 2) { echo "Rejected"; }
                                ?></span
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
                    <span><?php echo $row['ngo_phone']?></span
                    ></span> 

                    <span class="d-flex justify-content-between">
                    <strong class="">Web</strong>
                    <span><?php echo $row['ngo_website']?></span
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
                    <strong>Country</strong>
                    <span><?php echo $row['ngo_country_of_op']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong>City</strong>
                    <span><?php echo $row['ngo_city_of_op']?></span
                    ></span> 
                  </li>
                  <li class="list-group-item text-right">
                  <span class="d-flex justify-content-between">
                    <strong>HQ</strong>
                    <span><?php echo $row['ngo_hq']?></span
                    ></span> 
                  </li>
                </ul>

          </div>
          
            <div class="modal fade" id="approveModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Ngo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h3>Are you sure you want to approve this NGO?</h3>
                    <form class="" action="" method="post">
                    <input type="hidden" name="approve_ngo_id" value="<?php echo $row['id']; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="approve" class="btn btn-primary">Yes</button>
                  </div>
                </form>

                </div>
              </div>
            </div>

            <div class="modal fade" id="rejectModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Reject Ngo</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <h3>Are you sure you want to reject this NGO?</h3>
    <form class="" action="" method="post">
    <input type="hidden" name="reject_ngo_id" value="<?php echo $row['id']; ?>">
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    <button type="submit" name="reject" class="btn btn-primary">Yes</button>
  </div>
</form>

</div>
</div>
</div>
                            <?php } ?>


                      </section>
     

          <!-- Page Footer-->
          <?php require 'templates/footer.php'; ?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <?php require 'templates/footer-scripts.php'; ?>
  </body>
</html>
