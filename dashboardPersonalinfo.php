<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'donor') {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Your Account - Personal Information</title>

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


	<div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>

	<!-- ... Navbar ends here -->


	<!-- Main Header Account -->

	<div class="main-header">
		<div class="content-bg-wrap bg-account"></div>
		<div class="container">
			<div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="main-header-content">
						<h1>Your Account Dashboard</h1>
						<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile information,
							settings,
							<br>see your donation history and make new donations, have fun!</p>
							<p>Welcome to the social network of direct aid to local NGOs</p>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Main Header Account -->

	<div class="container">
		<?php if (isset($_GET['complete_profile'])): ?>
		<div class="alert alert-light" role="alert" style="background-color: #d1ecf1; font-size: 16px; text-align: center;">
			<b>Hi <?php echo $user_data['f_name'] . ' ' . $user_data['l_name']; ?>!</b> Welcome to Linkedaid. Please complete your profile by filling the labels highlighted in red in the left sidebar.
		</div>
	<?php endif; ?>
		<div class="row">
			<!-- Dashboard Menu Starts here -->
			<?php require_once 'template/sidebar.php' ?>

			<!-- Dashboard menu ends here -->

			<!-- Your Account Personal Information -->

			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Personal Information</h6>
					</div>
					<div class="ui-block-content">


						<!-- Personal Information Form  -->

						<form id="donor_profile_form" action="" method="post">
							<div class="row">

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input class="form-control" name="first_name" type="text" value="<?php echo $user_data['f_name']; ?>">
									</div>

									<div class="form-group label-floating">
										<label class="control-label">Your Email</label>
										<input class="form-control" name="email" type="email" value="<?php echo $_SESSION['user_email']; ?>" disabled>
									</div>

									<div class="form-group date-time-picker label-floating">
										<label class="control-label">Your Birthday</label>
										<input name="datetimepicker" value="<?php echo date('d/m/Y', strtotime($user_data['donor_dob'])); ?>" />
										<span class="input-group-addon">
											<svg class="olymp-month-calendar-icon icon">
												<use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use>
											</svg>
										</span>
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input class="form-control" name="last_name" type="text" value="<?php echo $user_data['l_name']; ?>">
									</div>

									<div class="form-group label-floating is-select">
										<label class="control-label">Your Gender</label>
										<select class="selectpicker form-control" name="gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>

									<div class="form-group label-floating ">
										<label class="control-label">Your Phone Number</label>
										<input class="form-control" name="donor_phone" value="<?php echo $user_data['donor_phone']; ?>" type="text">
									</div>


								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">Your Country</label>
										<select class="selectpicker form-control" name="donor_country">
											<option value="<?php echo $user_data['donor_country']; ?>" selected="selected"><?php echo $user_data['donor_country']; ?></option>

											<?php
											 	$sql = mysqli_query($con, "SELECT country FROM countries");
												while ($row = mysqli_fetch_array($sql)) { ?>
													<option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
												<?php }
											 ?>
										</select>
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">Your City</label>
										<input class="form-control" name="donor_city" type="text" value="<?php echo $user_data['donor_city']; ?>">

									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Write a little description about you</label>
										<textarea class="form-control" name="description"><?php echo $user_data['description']; ?></textarea>
									</div>





									<div class="form-group label-floating is-empty">
										<label class="control-label">My competencies (That I could share for humanitarian purposes)</label>
										<input class="form-control" type="text" name="donor_competencies" value="<?php echo $user_data['donor_competencies']; ?>">
									</div>

								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">


									<div class="form-group label-floating">
										<label class="control-label">Your Occupation</label>
										<input class="form-control" name="donor_occupation" type="text" value="<?php echo $user_data['donor_occupation']; ?>">
									</div>

									<div class="form-group label-floating is-select">
										<label class="control-label">Status</label>
										<select class="selectpicker form-control" name="donor_marital_status">
											<option value="Married">Married</option>
											<option value="Single">Single</option>
										</select>
									</div>
									<?php $sector = explode(",", $user_data['p_sectors_of_action']); ?>

									<div class="form-group label-floating is-select">
										<label class="control-label">Preferred sectors of action</label>
										<select class="selectpicker form-control" name="p_sectors_of_action[]" multiple>
											<?php
											if ($sector[0] != "" || $sector[0] != null) {
												foreach ($sector as $key => $value) { ?>
													<option value="<?php echo $value; ?>" selected="selected"><?php echo get_sector_by_id($con, $value); ?></option>
												<?php } }?>
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


									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Facebook Account</label>
										<input class="form-control" type="text" name="donor_fb_account" value="<?php echo $user_data['donor_fb_account']; ?>">
										<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
									</div>
									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Twitter Account</label>
										<input class="form-control" type="text" name="donor_tw_account" value="<?php echo $user_data['donor_tw_account']; ?>">
										<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
									</div>

									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox"> I accept the <a href="terms.html">Terms and Conditions</a>
											</label>
										</div>
									</div>

								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<button type="submit" class="btn btn-blue btn-lg full-width">Save all Changes</button>
								</div>

							</div>
						</form>

						<!-- ... end Personal Information Form  -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->


	<!-- Footer -->

	<?php require_once 'template/footer.inc.php' ?>
<script type="text/javascript">
$(document).ready(function(){

$("#donor_profile_form").submit(function(event){
		event.preventDefault();
		// $("body").addClass("loading");

		var formData = new FormData(this);
		// $('#loading-image').show();

			$.ajax({
				 url: 'xml_http_request/donor_profile_info.php',
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
 });
 })
</script>
</body>

</html>
