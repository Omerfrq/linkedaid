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

    <!-- ... end nav  -->

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

                <div class="row">
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="ui-block responsive-flex">
                            <div class="ui-block-title">
                                <div class="h6 title"><?php echo $user_data['ngo_name']; ?> - Your Supporters</div>
                                <!-- <form class="w-search">
                                    <div class="form-group with-button">
                                        <input class="form-control" type="text" placeholder="Search Donor...">
                                        <button>
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form> -->

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" id="results">
                        </div>
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
        <img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon ">
    </a>



    <!-- JS Scripts -->
    <script type="text/javascript">
    $(document).ready(function() {
    $("#results" ).load( "xml_http_request/fetch_donors.php"); //load initial records

    //executes code below when user click on pagination links
    $("#results").on( "click", ".pagination a", function (e){
      e.preventDefault();
      // $(".loading-div").show(); //show loading element
      var page = $(this).attr("data-page"); //get page number from link
      $("#results").load("xml_http_request/fetch_donors.php",{"page":page}, function(){ //get content from PHP page
        // $(".loading-div").hide(); //once done, hide loading element
      });

    });
    });
    </script>


</body>

</html>
