<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12">
    <div class="ui-block">

      <div class="your-profile">
        <div class="ui-block-title ui-block-title-small">
          <h6 class="title">Your PROFILE</h6>
        </div>

        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Profile Settings
                  <i class="fa fa-arrow-down" aria-hidden="true"></i>
                </a>
              </h6>
            </div>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
              <ul class="your-profile-menu">
                <li>
                  <a href="<?php if ($_SESSION['user_type'] == 1) {echo 'ngoDBinfo.php';} elseif ($_SESSION['user_type'] == 2) {echo 'dashboardPersonalinfo.php';} ?>"  style="<?php if(check_user_data($con, $_SESSION['user_type'], $_SESSION['id']) == 1) { ?> color: #F00;
                  <?php } ?>">Profile Information</a>
                </li>
                <li>
                  <a href="<?php if ($_SESSION['user_type'] == 1) {echo 'ngoDBchangepass.php';} elseif ($_SESSION['user_type'] == 2) {echo 'dashbboardChangepass.php';} ?>">Change Password</a>
                </li>
                <li>
                  <a href="<?php if ($_SESSION['user_type'] == 1) {echo 'ngoDBupdatedp.php';}
                   elseif ($_SESSION['user'] == 'donor') {echo 'dashboardUpdatedp.php';} ?>" style="<?php if($user_data['pic_name'] == null) { ?> color: #F00;
                    <?php } ?>">
                  Update Display Picture </a>
                </li>
                <?php if ($_SESSION['user_type'] == 1) { ?>
                <li>
                  <a href="ngoDBaddmap.php" style="<?php if($user_data['longitude'] == null || $user_data['latitute'] == null || $user_data['ngo_address'] == null) { ?> color: #F00;
                   <?php } ?>">Update Map</a>
                </li>
                 <?php } ?>
              </ul>
            </div>

          </div>
        </div>

        <?php if ($_SESSION['user_type'] == 1) { ?>

        <div class="ui-block-title">
          <a href="ngoDBdonations.php" class="h6 title">Donations History</a>
        </div>

        <div class="ui-block-title">
          <a href="ngoDBdonors.php" class="h6 title">Your Supporters</a>
        </div>

      <?php } ?>

      <?php if ($_SESSION['user_type'] == 2) { ?>

        <div class="ui-block-title">
          <a href="dashboardDonations.php" class="h6 title">My Donations History</a>
        </div>

        <div class="ui-block-title">
          <a href="dashboardMakeDonation.php" class="h6 title">Make Donations</a>
        </div>

      <?php } ?>

      </div>

    </div>
</div>
