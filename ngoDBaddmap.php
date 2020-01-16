<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'ngo') {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Your Account - Update Map</title>

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

    <div class="header-spacer--standard">		<?php require('template/navbar.inc.php'); ?>
</div>

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
                            <br>see your supporters, and donations history!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Main Header Account -->


    <div class="container">
        <div class="row">

            <!-- Dashboard Menu -->

            <?php require 'template/sidebar.php'; ?>


            <!-- Dashboard Menu Ends Here-->

            <!-- Your Account Personal Information -->

            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">NGO NAME - Update map coordinates</h6>
                    </div>
                    <div class="ui-block-content">

                        <!--  Form -->

                        <form id="form-update-map" action="" method="post">
													<div id="locationField">
		<input id="autocomplete"
					 placeholder="Enter your address"
					 onFocus="geolocate()"
					 type="text" name="ngo_address" autocomplete="off" value="<?php echo $user_data['ngo_address']; ?>"/>
	</div><br><br>
	<input type="hidden" name="ngo_latitude" id="latitude" value="">
	<input type="hidden" name="ngo_longitude" id="longitude" value="">
	<table id="address">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field" id="street_number" disabled="true"/></td>
        <td class="wideField" colspan="4"><input class="field" id="route" disabled="true"/></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="4"><input class="field" id="locality" disabled="true"/></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"/></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code" disabled="true"/></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"/></td>
      </tr>
    </table><br><br>
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		    <button class="btn btn-breez btn-lg full-width">Update map now !</button>
		</div>
                        </form>

                        <!-- ... end  Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Your Account Personal Information -->

    <!-- Footer -->

    <?php require_once 'template/footer.inc.php' ?>


    <script type="text/javascript">
    $(document).ready(function(e){
      $("#form-update-map").submit(function(e){

      e.preventDefault();
    var formData = $('#form-update-map').serialize();
    // var longitude = $('#ngo_longitude');
    // var latitute = $('#ngo_latitude');
    var address = $('#ngo_address');
    // if (longitude.val() == "") {
    //   longitude.css('border', 'solid 2px #F00');
    // } else if (longitude.val() == "") {
    //   latitute.css('border', 'solid 2px #F00');
    // } else
		if (address.val() == "") {
			address.css('border', 'solid 2px #F00');
    } else {
    $.ajax({
       url: 'xml_http_request/update_map.php',
       type: 'POST',
       data: formData,
       success: function(data) {
         if (data == 1) {
           swal('Good Job!', 'Map coordinates Updated Successfully', 'success');
         } else {
           swal('Something Went Wrong!', 'Please check back later', 'error');
         }
       }
     });
     }
     });
     });

    </script>
		<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};



function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component', 'geometry']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {

  // Get the place details from the autocomplete object.
   place = autocomplete.getPlace();
	 document.getElementById('latitude').value = place.geometry.location.lat();
 	document.getElementById('longitude').value = place.geometry.location.lng();
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }


}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }


}

    </script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmGe5Q4HjVqecjJKIrQeBA3I2bnU3kxms&libraries=places&callback=initAutocomplete"
        async defer></script>



</body>

</html>
