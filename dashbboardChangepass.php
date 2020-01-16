<?php
require_once('core/init.php');
if ($_SESSION['user_type'] != 2) {
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

	<div class="header-spacer--standard">
		<?php require('template/navbar.inc.php'); ?>
	</div>
	<!-- ... end navbar -->

	<!-- Main Header Account -->

	<div class="main-header">
		<div class="content-bg-wrap bg-account"></div>
		<div class="container">
			<div class="row">
				<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
					<div class="main-header-content">
						<h1>Your Account Dashboard</h1>
						<p >Welcome to your account dashboard! Here you’ll find everything you need to change your profile information, settings,
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
						<h6 class="title">Change Password</h6>
					</div>
					<div class="ui-block-content">


						<!-- Change Password Form -->

						<form id="form-change-password" action="" method="post">
							<div class="row">

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Confirm Current Password</label>
										<input class="form-control" placeholder="" name="confirm_current_password" id="confirm_current_password" type="password">
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your New Password</label>
										<input class="form-control" name="new_password" id="new_password"  placeholder="" type="password">
									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Confirm New Password</label>
										<input class="form-control" placeholder="" name="confirm_new_password" id="confirm_new_password" type="password">
									</div>
								</div>

								<div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
									<div class="remember">

										<!-- <div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox"> Remember Me
											</label>
										</div> -->

										<a href="ngoDBforgetpass.html" class="forgot">Forgot my Password</a>
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<button type="submit" class="btn btn-breez btn-lg full-width">Change Password Now!</button>
								</div>

							</div>
						</form>

						<!-- ... end Change Password Form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->

	<!-- Footer -->

	<?php require_once 'template/footer.inc.php' ?>


	<!-- ... end Footer -->


	<script type="text/javascript">
	$(document).ready(function() {

	$("#form-change-password").submit(function(e){
			e.preventDefault();
			// $("body").addClass("loading");
			var current = $('#confirm_current_password');
			var newPassword = $('#new_password');
			var confirmNewPassword = $('#confirm_new_password');
			if (current.val() == "") {
				current.css('border', 'solid 2px #F00');
			} else if ( newPassword.val() == "") {
				newPassword.css('border', 'solid 2px #F00');

			} else if ( confirmNewPassword.val() == "") {
				confirmNewPassword.css('border', 'solid 2px #F00');

			} else if ( newPassword.val() != confirmNewPassword.val()) {
				swal('Password Mismatch', 'Passwords Do not Match. Please try again', 'error');

			} else {
			var formData = $('#form-change-password').serialize();
			$.ajax({
				 url: 'xml_http_request/change_password.php',
				 type: 'POST',
				 data: formData,
				 success: function(data) {
					 // alert(data);
					 // $('#loading-image').show();
					 if (data == 'Wrong Password') {
						 swal('Wrong Password!', 'Your current password is not correct', 'error');
					 } else if (data == true) {
						 swal('Good Job!', 'Password has been successfully updated', 'success');
					 } else {
						 swal('Error!', 'Something went wrong. Please try again later', 'error');

					 }
				 },
					 cache: false,
				 });
			 }

				 });
				 });

	</script>

</body>

</html>
