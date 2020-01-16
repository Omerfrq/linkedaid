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

	<div class="header-spacer--standard">
		<?php require('template/navbar.inc.php'); ?>
	</div>
	<!-- ... Navbar ends here -->


	<!-- Main Header Account -->

	<div class="main-header">
		<div class="content-bg-wrap bg-account"></div>
		<div class="container">
			<div class="row">
				<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
					<div class="main-header-content">
						<h1>Your Account Dashboard</h1>
						<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile information,
							settings,
							<br>see your donation history and make new donations, have fun!</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Main Header Account -->

	<div class="container">
		<div class="row">

			<!-- Dashboard Menu Starts here -->
			<?php require_once 'template/sidebar.php' ?>

			<!-- Dashboard menu ends here -->

			<!-- Your Account Personal Information -->

			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Update Display Picture</h6>
					</div>
					<div class="ui-block-content">


						<!-- Change Password Form -->

						<form id="upload-profile-form" action="" method="post" enctype="multipart/form-data">
							<div class="row">

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group ">
										<label class="control-label">Please select a profile picture of recommended size (200px x 200px )</label>
										<input class="form-control" placeholder="" id="donor_profile_pic" name="donor_profile_pic" type="file">
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<button type="submit" class="btn btn-blue btn-lg full-width" id="updatePic">Update</button>
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

	<?php require('template/footer.inc.php'); ?>


	<script type="text/javascript">
	$(document).ready(function(){
	$('#upload-profile-form').submit(function(e) {
		e.preventDefault();
		var file = $('#donor_profile_pic');
		if (file.val() == "") {
			file.css('border', 'solid 2px #F00');
		} else {
			$('#updatePic').html("Uploading! Please wait..");
				var formData = new FormData($("#upload-profile-form")[0]);
			$.ajax({
					url: 'xml_http_request/update_profile_pic.php',
					type:'POST',
					data:formData,
					async: false,
					success:function(data){
						if (data == 3) {
							swal('Format Not Supported!', 'Only JPG, JPEG and PNG images are allowed', 'error');

						} else if (data == 2) {
							swal('Too Large File!', 'File size must be less than 2 MB', 'error');

						} else if(data == 1) {
							swal('Good Job!', 'Image Uploaded Successfully', 'success');
						} else if(data == 0) {
							swal('Could Not Upload File!', 'Please try again', 'error');

						} else {
							swal('Something Went Wrong!', 'Please try again', 'error');

						}

						$('#updatePic').html("Update");

					},

					cache:false,
					contentType: false,
					processData: false,
			});
			}
	});
	});
	</script>
</body>

</html>
