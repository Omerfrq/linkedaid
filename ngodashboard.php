<?php require_once('core/init.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>NGO - Information</title>

	<?php require_once ('template/head.inc.php'); ?>


</head>

<body>

    <?php

    require('template/navbar.inc.php');
    require('template/ngoheader.inc.php');
    require('api/getCurrentNgo.php');

    ?>



	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
            <?php require('template/ngonavbar.inc.php'); ?>
			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title"><?php echo $data['name']; ?> - Profile Information</h6>
					</div>
					<div class="ui-block-content">


						<!-- Form Favorite Page Information -->

						<form>
							<div class="row">
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Contact Person First Name</label>
										<input class="form-control" placeholder="" type="text" value="<?php echo $data['first_name']; ?>">
									</div>

									<div class="form-group label-floating">
										<label class="control-label">Contact Person Email</label>
										<input class="form-control" placeholder="" type="email" value="<?php echo $data['email']; ?>">
									</div>

									<div class="form-group date-time-picker label-floating">
										<label class="control-label">Active since</label>
										<input name="datetimepicker" value="<?php echo $data['activedate']; ?>" />
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
										<input class="form-control" placeholder="" type="text" value="<?php echo $data['last_name']; ?>">
									</div>

									<div class="form-group label-floating">
										<label class="control-label">NGO Website</label>
										<input class="form-control" placeholder="" type="email" value="<?php echo $data['website']; ?>">
									</div>


									<div class="form-group label-floating">
										<label class="control-label">Your Phone Number</label>
										<input class="form-control" placeholder="" type="text" value="<?php echo $data['phone']; ?>">
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">NGO Country of Operation</label>
										<select class="selectpicker form-control">
                                            <?php
                                                $countries = explode(" ", $data['countries']);
                                                foreach($countries as $country) {
                                                    echo "<option value='$country'>'$country'</option>";
                                                }
                                            ?>
										</select>
									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating is-select">
										<label class="control-label">NGO City of Operation</label>
										<input class="form-control" placeholder="" type="text" value="<?php echo $data['city']; ?>">

									</div>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Write a little description about the page</label>
										<textarea class="form-control" placeholder=""><?php echo $data['description']; ?></textarea>
									</div>
								</div>

								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

									<div class="form-group label-floating is-empty">
										<label class="control-label">HQ Based In</label>
										<input class="form-control" placeholder="" type="text" value="<?php echo $data['hq']; ?>">
									</div>

									<div class="form-group label-floating is-select">
										<label class="control-label">Sector of action</label>
										<select class="selectpicker form-control" multiple>
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
											<option value="">Responsible Consumption and Production</option>
											<option value="">Climate Action</option>
											<option value="">Life below Water</option>
											<option value="">Life on Land</option>
											<option value="">Peace , Justice and Strong Institutions</option>
											<option value="">Partnerships for Goals</option>
										</select>
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">Additional Info</label>
										<textarea class="form-control" placeholder=""><?php echo $data['additionalinfo']; ?></textarea>
									</div>
								</div>

								<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox" checked="<?php echo $data['committopost']; ?>"> <strong>I commit to post information and pictures
													regularly
													to update sponsors on the progress of our projects.</strong>
											</label>
										</div>
									</div>
									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Facebook Account</label>
										<input class="form-control" type="text" value="<?php echo $data['facebook']; ?>">
										<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
									</div>
									<div class="form-group with-icon label-floating">
										<label class="control-label">Your Twitter Account</label>
										<input class="form-control" type="text" value="<?php echo $data['twitter']; ?>">
										<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
									</div>

								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<a href="ngoprofile.php?id=<?php echo $data['id']; ?>" class="btn btn-secondary btn-lg full-width">View Public Profile</a>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									<a href="#" class="btn btn-breez btn-lg full-width">Update Changes</a>
								</div>
							</div>
						</form>

						<!-- ... end Form Favorite Page Information -->


					</div>
				</div>
			</div>


		</div>
	</div>
    <!-- JS Scripts -->
	<script>
		function multipleFunc() {
			document.getElementById("mySelect").multiple = true;
		}
	</script>
	<!-- ... end Your Account Personal Information -->

	<?php require_once ('template/footer.inc.php'); ?>





</body>

</html>
