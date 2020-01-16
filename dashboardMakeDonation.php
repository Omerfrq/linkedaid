<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'donor') {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Your Account - Change Password</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.min.css">

    <!-- Main Font -->
    <script src="js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

</head>


<body>

    
    <!-- ... Navbar ends here -->
    <div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>

    <!-- Main Header Account -->

    <div class="main-header">
        <div class="content-bg-wrap bg-account"></div>
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>Your Account Dashboard</h1>
                        <p>Welcome to your account dashboard! Here you’ll find everything you need to change your
                            profile information,
                            settings,
                            <br>see your donation history and make new donations, have fun!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Main Header Account -->

    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">

            <!-- Dashboard Menu Starts here -->
            <?php require_once 'template/sidebar.php' ?>

            <!-- Dashboard menu ends here -->

            <!-- Your Account Personal Information -->

            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">NGOs looking for Donations</h6>

                    </div>

                    <!-- Notification List Frien Requests -->

                    <ul class="notification-list friend-requests">
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM ngo ORDER BY id DESC LIMIT 4");
                        while ($row = mysqli_fetch_array($sql))
                        { ?>

                        <li>
                            <div class="author-thumb">
                                <img src="img/forum6.png" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend"><?php echo $row['ngo_name']; ?></a>
                                <span class="chat-message-item"><?php echo $row['ngo_city_of_op'] . ', ' . $row['ngo_country_of_op']; ?></span>
                            </div>
                            <span class="notification-icon">
                                <a href="" class="accept-request">
                                    View Profile
                                </a>

                                <a href="#" class="accept-request request-del" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['user_id']; ?>">
                                    Make a Donation
                                </a>

                            </span>


                        </li>

                                                <?php }
                                               ?>



                    </ul>

                    <!-- ... end Notification List Frien Requests -->
                </div>

            </div>
        </div>
    </div>

    <!-- ... end Your Account Personal Information -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Make Donation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center><img src="img/stripeLogo.png" width="150"></center><br>
                    <form action="php_stripe_paypage-master/charge.php" method="post" id="payment-form">
                      <div class="form-row">
												<input type="hidden" name="ngo_u_id" id="ngo_u_id" value="">
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group label-floating">
                              <label class="control-label">Amount To Be Donated (USD)</label>
                      <input type="number" name="donation_amount" class="form-control">
                    </div>
                  </div>
                        <div id="card-element" class="form-control">
                          <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                      </div>

                      <button>Submit Payment</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-blue" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->

    <?php require('template/footer.inc.php'); ?>


    <!-- ... end Footer -->

    <a class="back-to-top" href="#">
        <img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>



    <!-- JS Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="php_stripe_paypage-master/js/charge.js"></script>


<script type="text/javascript">
$('#myModal').on('show.bs.modal', function (e) {
	var id = $(e.relatedTarget).data('id');
	$('#ngo_u_id').val(id);
	})
</script>
</body>

</html>
