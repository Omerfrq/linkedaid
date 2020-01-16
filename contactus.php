<?php require 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>LinkedAID- Contactus</title>

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

<body class="body-bg-white">



    <!-- Stunning header -->

    <div class="stunning-header bg-primary-opacity">


        <!-- Header Standard Landing  -->

        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Contact Us</h1>

        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>

    <!-- End Stunning header -->


    <section class="mt-0">
        <div class="section">
            <div id="map" style="height: 480px"></div>
            <script>
                var map;

                function initMap() {

                    var myLatLng = { lat: -38.483, lng: 146.25 };

                    map = new google.maps.Map(document.getElementById('map'), {
                        center: myLatLng,
                        zoom: 10,

                        styles: [
                            { "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }] },
                            { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] },
                            { "elementType": "labels.text.fill", "stylers": [{ "color": "#616161" }] },
                            { "elementType": "labels.text.stroke", "stylers": [{ "color": "#f5f5f5" }] },
                            { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{ "color": "#bdbdbd" }] },
                            { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#eeeeee" }] },
                            { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#757575" }] },
                            { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#e5e5e5" }] },
                            { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] },
                            { "featureType": "road", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }] },
                            { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [{ "color": "#757575" }] },
                            { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#dadada" }] },
                            { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{ "color": "#616161" }] },
                            { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] },
                            { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "color": "#e5e5e5" }] },
                            { "featureType": "transit.station", "elementType": "geometry", "stylers": [{ "color": "#eeeeee" }] },
                            { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#c9c9c9" }] },
                            { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] }
                        ],

                        scrollwheel: false//set to true to enable mouse scrolling while inside the map area
                    });

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: {
                            url: "img/map-marker.png",
                            scaledSize: new google.maps.Size(36, 54)
                        }

                    });

                }


            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBESxStZOWN9aMvTdR3Nov66v6TXxpRZMM&callback=initMap"
                async defer>
                </script>
        </div>
    </section>


    <section class="medium-padding120">
        <div class="container">
            <div class="row">
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">


                    <!-- Contact Item -->

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">LinkedAID Head Office</h3>
                        <div class="contact-item">
                            <a href="#">254 W58th St, New York NY 10001, USA</a>
                        </div>
                        <div class="contact-item">
                            <h6 class="sub-title">General Inquiries:</h6>
                            <a href="mailto:">hqinquiries@olympus.com</a>
                        </div>
                    </div>

                    <!-- ... end Contact Item -->
                </div>

                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">


                    <!-- Contact Item -->

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">Press and Media</h3>
                        <div class="contact-item">
                            <h6 class="sub-title">Jenny Stevens:</h6>
                            <a href="mailto:">jennymedia@olympus.com</a>
                        </div>
                        <div class="contact-item">
                            <h6 class="sub-title">Skype:</h6>
                            <a href="#">Stevens Press</a>
                        </div>
                    </div>

                    <!-- ... end Contact Item -->

                </div>
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">


                    <!-- Contact Item -->

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">Business Chat</h3>
                        <div class="contact-item">
                            <h6 class="sub-title">Marc Jackson:</h6>
                            <a href="mailto:">jacksonbusiness@olympus.com</a>
                        </div>
                        <div class="contact-item">
                            <h6 class="sub-title">Skype:</h6>
                            <a href="#">Jackson Business</a>
                        </div>
                    </div>

                    <!-- ... end Contact Item -->

                </div>
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">


                    <!-- Contact Item -->

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">Social Media</h3>
                        <div class="contact-item">
                            <h6 class="sub-title">Facebook</h6>
                            <a href="">www.facebook.com/LinkedAID</a>
                        </div>
                        <div class="contact-item">
                            <h6 class="sub-title">Twitter</h6>
                            <a href="#">www.twitter.com/LinkedAID</a>
                        </div>
                    </div>

                    <!-- ... end Contact Item -->

                </div>
            </div>
        </div>
    </section>



    <section class="medium-padding120 bg-body contact-form-animation scrollme">
        <div class="container">
            <div class="row">
                <div class="col col-xl-10 col-lg-10 col-md-12 col-sm-12  m-auto">


                    <!-- Contacts Form -->

                    <div class="contact-form-wrap">
                        <div class="contact-form-thumb">
                            <h2 class="title">Send us a message

                            </h2>
                            <p>Do you have general questions about Olympus Social Network? Send us a raven and we’ll
                                answer
                                you as fast as we can!</p>
                            <img src="img/crew.png" alt="crew" class="crew">
                        </div>
                        <form class="contact-form" id="contact-form" action="" method="post">
                            <div class="row">
                                <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">First Name</label>
                                        <input class="form-control" name="f_name" id="f_name" placeholder="" type="text" value="">
                                    </div>
                                </div>
                                <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Name</label>
                                        <input class="form-control" name="l_name" id="l_name" placeholder="" type="text" value="">
                                    </div>
                                </div>
                                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Email</label>
                                        <input class="form-control" name="email" id="email" placeholder="" type="email" value="">
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Subject</label>
                                        <input class="form-control" name="subject" id="subject" placeholder="" type="text" value="">
                                    </div>

                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Your Message</label>
                                        <textarea class="form-control" name="message" id="message" placeholder=""></textarea>
                                    </div>

                                    <button class="btn btn-purple btn-lg full-width" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ... end Contacts Form -->

                </div>
            </div>
        </div>

        <div class="half-height-bg bg-white"></div>
    </section>

    <!-- Footer -->

    <?php require_once 'template/footer.inc.php' ?>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#contact-form').submit(function(e) {
    	e.preventDefault();
    	var f_name = $('#f_name');
    	var l_name = $('#l_name');
    	var email = $('#email');
    	var subject = $('#subject');
    	var message = $('#message');
    	if (f_name.val() == "") {
    		f_name.css('border', 'solid 2px #F00');
    	} else if (l_name.val() == "") {
    		l_name.css('border', 'solid 2px #F00');
    	} else if (email.val() == "") {
    		email.css('border', 'solid 2px #F00');
    	} else if (subject.val() == "") {
    		subject.css('border', 'solid 2px #F00');
    	} else if (message.val() == "") {
    		message.css('border', 'solid 2px #F00');
    	} else {
    $.ajax({
       url: 'xml_http_request/contact_us.php',
       type: 'POST',
       data: new FormData(this),
       contentType: false,
       cache: false,
       processData:false,
       success: function(data) {
         if (data == 1) {
           swal('Good Job!', 'Your Inquiry Has Been Submitted', 'success');
         } else {
           swal('Something Went Wrong!', 'Could Not Submit Your Inquiry. Please Try Again Later.', 'error');
         }

       }
     })
   }
   })
   })
    </script>

</body>

</html>
