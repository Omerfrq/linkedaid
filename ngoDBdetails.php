<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'ngo') {
	echo "<script>window.location.href='login.php';</script>";
}

if(!empty($_GET['id'])) {
	$GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

	$id = $GET['id'];
	$sql = mysqli_query($con, "SELECT * FROM donations INNER JOIN donor ON donations.d_id = donor.user_id WHERE donations.id = '$id' AND donations.n_id = '".$_SESSION['id']."'");
	if (mysqli_num_rows($sql) == 1) {
		$row = mysqli_fetch_array($sql);
		$donor_name = $row['f_name'] . ' ' . $row['l_name'];
		$pay_date = $row['pay_date'];
		$d_id = $row['d_id'];
		$donated_amount = $row['donated_amount'];
		$country = $row['donor_country'];
		$city = $row['donor_city'];
	} else {
		header("location: index.php");
	}
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
        <div class="row">

            <!-- Dashboard Menu -->

            <?php require_once 'template/sidebar.php' ?>

            <!-- Dashboard Menu Ends Here-->

            <!-- Your Account Personal Information -->

            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title"><?php echo $user_data['ngo_name']; ?>- Donation Details</h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>

                    <div class="ui-block-content">
                        <form>
                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Donor Name</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="<?php echo $row['f_name'] . ' ' . $row['l_name']; ?>">
                                    </div>

                                </div>

                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Donation Amount</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="<?php echo $donated_amount; ?>$">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Date</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="<?php echo $pay_date; ?>">
                                    </div>

                                </div>

                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Time</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="10:00pm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="<?php echo $country; ?>">
                                    </div>

                                </div>

                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">City</label>
                                        <input class="form-control" placeholder="" type="text" readonly value="<?php echo $city; ?>">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <a href="ngoDBdonations.php" class="btn btn-primary btn-lg full-width">Back to
                                        Donations
                                        History page</a>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <a href="publicprofilePage.html" class="btn btn-breez btn-lg full-width">View
                                        Donor's
                                        Profile
                                    </a>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ... end Your Account Personal Information -->

    <!-- Footer -->

    <?php require('template/footer.inc.php'); ?>


    <!-- ... end Footer -->

    <a class="back-to-top bg-breez" href="#">
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
