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

          <section class="tables">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">NGO'S</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>NGO Name</th>
                              <th>Country</th>
                              <th>City</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $i = 1;
                              $sql = mysqli_query($con, "SELECT 
                              id, ngo_name, ngo_country_of_op, ngo_city_of_op, status 
                              FROM ngo");
                              while ($row = mysqli_fetch_array($sql)) { ?>
                            <tr>
                              <th scope="row"><?php echo $i++; ?></th>
                              <td><?php echo $row['ngo_name']; ?></td>
                              <td><?php echo $row['ngo_country_of_op']; ?></td>
                              <td><?php echo $row['ngo_city_of_op']; ?></td>
                              <td>
                                <?php
                                if ($row['status'] == 0) { echo "Pending"; } elseif($row['status'] == 1) { echo "Approved"; }
                                 elseif ($row['status'] == 2) { echo "Rejected"; }
                                ?>
                              </td>
                              <td>
                          
                              
                                  <a href='ngo.php?id=<?php echo $row['id']?>' 
                                  class="btn btn-default">View</a>
                                  <a href='messages.php?id=<?php echo $row['id']?>' 
                                  class="btn btn-danger">Message</a>
                          
                              </td>
                            </tr>
                        
              

                </div>
              </div>
            </div>
</div>
</div>
</div>
                            <?php } ?>


                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>

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
