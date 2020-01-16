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

          <section class="tables">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Donors</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Country</th>
                              <th>City</th>
                              <th>Actions</th>
                              <th>Details</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $i = 1;
                              $sql = mysqli_query($con, "SELECT id, f_name, l_name, donor_country, donor_city,donor_gender FROM donor");
                              while ($row = mysqli_fetch_array($sql)) { ?>
                            <tr>
                              <th scope="row"><?php echo $i++; ?></th>
                              <td><?php echo $row['id']; ?></td>
                              <td><?php echo $row['f_name']; ?></td>
                              <td><?php echo $row['l_name']; ?></td>
                              <td><?php echo $row['donor_country']; ?></td>
                              <td><?php echo $row['donor_city']; ?></td>
                              
                              <td>
                                <a href='view.php?id=<?php echo $row['id']?>' class="btn btn-default">View</a>
                              </td>
                              <td>

                              </td>
                            </tr>
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
