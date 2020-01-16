<?php
require_once('core/init.php');
if (isset($_SESSION['user_type']) != 1) {
	echo "<script>window.location.href='login.php';</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>NGO - Information</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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


		<div class="header-spacer--standard">		<?php require('template/navbar.inc.php'); ?>

</div>

	<!-- Main Header Account -->
<!-- <img src="45.gif" id="loading-image" alt="" style="display:none;"> -->
	<div class="main-header">
		<div class="content-bg-wrap bg-account-ngo"></div>
		<div class="container">
			<div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="main-header-content">
						<h1>Your Account Dashboard</h1>
						<!-- <p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile information,
							settings,
							<br>see your supporters, and donations history!</p> -->
							<p>Welcome to the social network of direct aid to local NGOs</p>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Main Header Account -->

	<!-- Your Account Personal Information -->

	<div class="container">
		<?php if (isset($_GET['complete_profile'])): ?>
		<div class="alert alert-light" role="alert" style="background-color: #d1ecf1; font-size: 16px; text-align: center;">
			<b>Hi <?php echo $user_data['ngo_name']; ?>!</b> Welcome to Linkedaid. Please complete your profile by filling the labels highlighted in red in the left sidebar.
		</div>
	<?php endif; ?>
		<div class="row">
			<!-- Dashboard menu yeh wala use mar baqiyo k liye -->
	<?php require_once 'template/sidebar.php' ?>
			<!-- Dashboard menu ends here-->

			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">



				<div class="ui-block">
					<div class="ui-block-title">
											<h6 class="title">[NGO Name ] - Profile Information</h6>
					</div>
					<div class="ui-block-content">

						<div id="form-messages"></div>

						<!-- Form Favorite Page Information -->

						<form id="ngo_profile_form" method="post" action="">
							<div class="row">
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Contact Person First Name</label>
										<input class="form-control" name="contact_person_first_name" id="contact_person_first_name" placeholder="" type="text" value="<?php echo $user_data['cp_fname']; ?>">
									</div>

									<div class="form-group label-floating">
										<label class="control-label">Contact Person Email</label>
										<input class="form-control" name="contact_person_email" placeholder="" id="contact_person_email" type="email" value="<?php echo $_SESSION['user_email']; ?>" disabled>
									</div>

									<div class="form-group date-time-picker label-floating">
										<label class="control-label">NGO Active since</label>
										<input type="text" name="active_since_date" class="datepicker" id="active_since_date" autocomplete="off" value="<?php echo $user_data['ngo_active_since']; ?>" />
										<span class="input-group-addon">
											<svg class="olymp-calendar-icon icon">
												<use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
											</svg>
										</span>
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Contact Person Last Name</label>
										<input class="form-control" name="contact_person_last_name"id="contact_person_last_name" placeholder="" type="text" value="<?php echo $user_data['cp_lname']; ?>">
									</div>

									<div class="form-group label-floating">
										<label class="control-label">NGO Website</label>
										<input class="form-control" name="website" id="website" placeholder="" type="text" value="<?php echo $user_data['ngo_website']; ?>">
									</div>


									<div class="form-group label-floating">
										<label class="control-label">NGO Phone Number</label>
										<input class="form-control" name="phone_no" id="phone_no" placeholder="" type="text" value="<?php echo $user_data['ngo_phone']; ?>">
									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">NGO Country of Operation</label>
										<select class="selectpicker form-control" name="country_of_operation" id="country_of_operation">
											<?php $country = $user_data['ngo_country_of_op']; ?>
											<option value="<?php echo $user_data['ngo_country_of_op']; ?>"><?php if($country != null) {echo $user_data['ngo_country_of_op'];} ?></option>
											<?php
											 	$sql = mysqli_query($con, "SELECT * FROM countries WHERE country != '$country'");
												while ($row = mysqli_fetch_array($sql)) { ?>
													<option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
												<?php }
											 ?>
										</select>
									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">NGO areas(s) of Operation</label>
										<input class="form-control" name="city_of_operation" id="city_of_operation" placeholder="" type="text" value="<?php echo $user_data['ngo_city_of_op']; ?>">

									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Write a little description about the NGO</label>
										<textarea class="form-control" placeholder="" name="description" id="description" value=""><?php echo $user_data['ngo_page_description']; ?></textarea>
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

									<div class="form-group label-floating">
										<label class="control-label">HQ Based In</label>
										<input class="form-control" placeholder="" name="hq_location" id="hq_location" type="text" value="<?php echo $user_data['ngo_hq']; ?>">
									</div>
									<?php $sector = explode(",", $user_data['sectors_of_action']);?>
									<div class="form-group label-floating is-select">
										<label class="control-label">Sector of action</label>
										<select class="selectpicker form-control" multiple name="sectors_of_action[]" id="sectors_of_action">
											<?php
                      if ($sector[0] != "" || $sector[0] != null) {
												foreach ($sector as $sectors) { ?>
													<option value="<?php echo $sectors; ?>" selected="selected"><?php echo get_sector_by_id($con, $sectors); ?></option>
												<?php }
												}?>
												<?php
												if(count($sector) > 1) {
													$sql = mysqli_query($con, "SELECT * FROM sectors_of_action WHERE id NOT IN (".implode(',',$sector).")");
												} else {
													$sql = mysqli_query($con, "SELECT * FROM sectors_of_action");
												}
													while ($row = mysqli_fetch_array($sql)) { ?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['sector']; ?></option>
													<?php } ?>
																				</select>
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Additional Info</label>
										<textarea class="form-control" name="additional_info" id="additional_info" placeholder=""<?php echo $user_data['additional_info']; ?>>We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com</textarea>
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox"> <strong>I accept the <a href="terms.html">Terms and Conditions</a></strong>
											</label>
										</div>
									</div>
									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Facebook Account</label>
										<input class="form-control" type="text" name="facebook_account_link" id="facebook_account_link" value="<?php echo $user_data['ngo_fb_account']; ?>">
										<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
									</div>
									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Twitter Account</label>
										<input class="form-control" type="text" name="twitter_account_link" id="twitter_account_link" value="<?php echo $user_data['ngo_tw_account']; ?>">
										<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
									</div>

								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<a href="ngoProfilepublic.php" class="btn btn-secondary btn-lg full-width">View Public Profile</a>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<button type="submit" class="btn btn-breez btn-lg full-width">Submit</button>
								</div>
							</div>
						</form>

						<!-- ... end Form Favorite Page Information -->


					</div>
				</div>
			</div>


		</div>
	</div>

	<!-- ... end Your Account Personal Information -->

	<!-- Footer -->

<?php require_once 'template/footer.inc.php' ?>

	<!-- ... end Footer -->




	<!-- JS Scripts -->
	<script>
		function multipleFunc() {
			document.getElementById("mySelect").multiple = true;
		}
	</script>

	<script type="text/javascript">
	$(document).ready(function(){
	$("#ngo_profile_form").submit(function(event){
			event.preventDefault();
			// $("body").addClass("loading");

			var formData = new FormData(this);
			// $('#loading-image').show();
			var sFieldValid = "";
			var fbAccountLink = $('#facebook_account_link').val();
			var twAccountLink = $('#twitter_account_link').val();
			if (fbAccountLink != "" && !validURL(fbAccountLink)) {
					sFieldValid = 0;
					swal("Invalid Url!", "Please enter a valid url of facebook account!", "error");
	      } else if (twAccountLink != "" && !validURL(twAccountLink)) {
						sFieldValid = 0;
						swal("Invalid Url!", "Please enter a valid url of twitter account!", "error");
		      } else {
						sFieldValid = 1;
		      }


				if (sFieldValid == 1) {

				$.ajax({
					 url: 'xml_http_request/add_ngo_profile_info.php',
					 type: 'POST',
					 data: formData,
					 async: false,
					 success: function(data) {
						 // alert(data);
						 // $('#loading-image').show();
						 if (data == true) {
							 swal ( "Good Job!" ,  "Profile Updated Successfully!" ,  "success" );
						 } else {
							 swal ( "Something Went Wrong!" ,  "Could Not Update Profile!" ,  "error" );

						 }
					},
					cache: false,
					contentType: false,
					processData: false
			});
		}
	 });

	    $( ".datepicker" ).datepicker();

});

	// function check() {
	// 	var element = document.getElementById('sectors_of_action');
	// 	var value = element.options[element.selectedIndex].value
	// 	alert(value);
	// }
	</script>

	<script>
	    WebFont.load({
	        google: {
	            families: ['Roboto:300,400,500,700:latin']
	        }
	    });

      function validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
          '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
      }
	</script>
</body>

</html>
