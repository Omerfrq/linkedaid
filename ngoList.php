<?php require 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>LinkedAID- NGOs List</title>

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

<body class="">


  <div class="header-spacer--standard">
      <?php require('template/navbar.inc.php'); ?>
  </div>
    <!-- ... end Header Standard -->

    <!-- Stunning header -->

    <div class="stunning-header bg-primary-opacity">


        <!-- Header Standard Landing  -->

        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title" style="margin-top:50px;">List of NGOs</h1>

        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>

    <!-- End Stunning header -->


    <section class="">
        <!-- ... end Top Header-Profile -->

        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block responsive-flex">
                        <div class="ui-block-title">
                            <div class="h6 title">NGOs on LinkedAID</div>
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Sort by Country</label>
                                <select class="selectpicker form-control">
                                    <option value="">France</option>
                                    <option value="">United States</option>
                                </select>
                            </div>
                            <form class="w-search">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Sort by Sectors of action</label>
                                    <select class="selectpicker form-control">
                                        <option value="">No Poverty</option>
                                        <option value="">Zero Hunger</option>
                                        <option value="">Good Health and Well Being</option>
                                        <option value="">Quality Education</option>
                                        <option value="">Gender Equality</option>
                                        <option value="">Clean Water and Sanitation</option>
                                        <option value="">Affordable and Clean Energy</option>
                                        <option value="">Decent Work and Economic Growth</option>
                                        <option value="">Industry , Innovation and Infrastucture</option>
                                        <option value="">Reduced Inequalities</option>
                                        <option value="">Sustainable cities and Communities</option>
                                        <option value="">Resposible Consumption and Production</option>
                                        <option value="">Climate Action</option>
                                        <option value="">Life below Water</option>
                                        <option value="">Life on Land</option>
                                        <option value="">Peace , Justice and Strong Institutions</option>
                                        <option value="">Partnerships for Goals</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Friends -->

        <div class="container">
            <div class="row" id="results">

            </div>



        </div>

        <!-- ... end Friends -->

    </section>

    <!-- Footer -->



    </div>

    <!-- ... end Footer -->

    <?php require('template/footer.inc.php'); ?>



<script type="text/javascript">
$(document).ready(function() {
$("#results" ).load( "xml_http_request/fetch_pages.php"); //load initial records

//executes code below when user click on pagination links
$("#results").on( "click", ".pagination a", function (e){
  e.preventDefault();
  // $(".loading-div").show(); //show loading element
  var page = $(this).attr("data-page"); //get page number from link
  $("#results").load("xml_http_request/fetch_pages.php",{"page":page}, function(){ //get content from PHP page
    // $(".loading-div").hide(); //once done, hide loading element
  });

});
});
</script>

</body>

</html>
