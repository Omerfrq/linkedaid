<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'ngo') {
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


    <!-- ... end Header Standard -->

    <div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>

    <!-- Main Header Account -->

    <div class="main-header">
        <div class="content-bg-wrap bg-account-ngo"></div>
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>Your Account Dashboard</h1>
                        <p>Welcome to your account dashboard! Here you’ll find everything you need to change your
                            profile
                            information, settings,
                            <br>see your supporters, and donations history!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Main Header Account -->



    <div class="container">

        <!-- Donation stats-->

        <div class="row">

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
                                    <span>
                                        Last Month Donation
                                    </span>
                                </div>
                                <div class="count-stat">3,000$
                                    <span class="indicator positive"> + 4.207</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
                                    <span>
                                        This Month Donation
                                    </span>
                                </div>
                                <div class="count-stat">4,000$
                                    <span class="indicator positive"> +25%</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
                                    <span>
                                        Total Donation since <?php echo $user_data['ngo_active_since']; ?>
                                    </span>
                                </div>
                                <div class="count-stat"><?php echo total_donation($con, $_SESSION['id']); ?>$
                                    <span class="indicator "> </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
                                    <span>
                                        Total number of Donors
                                    </span>
                                </div>
	                                <div class="count-stat"><?php echo total_ngo_donor($con, $_SESSION['id']); ?>
                                    <!-- <span class="indicator positive"> + 10%</span> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!--Donations Stats ends here-->

        <div class="row">

            <!-- Dashboard Menu -->

            <?php require_once 'template/sidebar.php' ?>


            <!-- Dashboard Menu Ends Here-->

            <!-- Your Account Personal Information -->

            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title"><?php echo $user_data['ngo_name']; ?> - Donations History</h6>

                    </div>


                    <!-- Notification List -->

                    <ul class="notification-list">
                      <?php
                      $sql = mysqli_query($con, "SELECT *, donations.id as `donation_id` FROM donations INNER JOIN donor ON donor.user_id = donations.d_id WHERE donations.n_id = '".$_SESSION['id']."'");
                      while ($row = mysqli_fetch_array($sql)) { ?>
                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar1-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend"><?php echo $row['f_name'] . ' ' . $row['l_name']; ?></a> donated
                                <a href="#" class="notification-link"><?php echo $row['donated_amount']; ?>$</a>
                                <span class="notification-date">
                                    <time class="entry-date updated" datetime="2004-07-24T18:18"><?php echo date('M d Y', strtotime($row['pay_date'])); ?></time>
                                </span>
                            </div>
                            <span class="notification-icon">
                                <a href="ngoDBdetails.php?id=<?php echo $row['donation_id']; ?>" class="accept-request bg-breez">
                                    View Details
                                </a>
                            </span>
                        </li>

                      <?php } ?>


                    </ul>

                    <!-- ... end Notification List -->

                </div>


                <!-- Pagination -->



            </div>

            <!-- ... end Your Account Personal Information -->


        </div>
    </div>



    <!-- Footer -->

    <?php require('template/footer.inc.php'); ?>

    </div>

    <!-- ... end Footer -->

    <a class="back-to-top" href="#">
        <img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>

    <!-- JS Scripts -->
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/perfect-scrollbar.js"></script>
    <script src="js/jquery.matchHeight.js"></script>
    <script src="js/svgxuse.js"></script>
    <script src="js/imagesloaded.pkgd.js"></script>
    <script src="js/Headroom.js"></script>
    <script src="js/velocity.js"></script>
    <script src="js/ScrollMagic.js"></script>
    <script src="js/jquery.waypoints.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/selectize.js"></script>

    <script src="js/base-init.js"></script>
    <script defer src="fonts/fontawesome-all.js"></script>

    <script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>
