<?php
                                $id = $_GET['id'];
                              $i = 1;
                              $sql = mysqli_query($con, "SELECT 
                                    *
                              FROM ngo
                              where id=$id
                              ");
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
                                <?php
                                if ($row['status'] == 0) { ?>
                                   <a href='ngo.php?id=<?php echo $row['id']?>' class="btn btn-default">View</a>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approveModal<?php echo $row['id']; ?>">Approve</button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal<?php echo $row['id']; ?>">Reject</button>
                                  
                                <?php } else { ?>
                                  --
                                <?php } ?>
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