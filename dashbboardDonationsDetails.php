<?php
require_once('core/init.php');
if ($_SESSION['user'] != 'donor') {
	echo "<script>window.location.href='login.php';</script>";
}

if(!empty($_GET['id'])) {
	$GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

	$id = $GET['id'];
	$sql = mysqli_query($con, "SELECT * FROM donations WHERE id = '$id' AND d_id = '".$_SESSION['id']."'");
	if (mysqli_num_rows($sql) == 1) {
		$row = mysqli_fetch_array($sql);
		$pay_date = $row['pay_date'];
		$n_id = $row['n_id'];
		$donated_amount = $row['donated_amount'];
	} else {
		header("location: dashboardDonations.php");
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Your Account - Dashboard Donations</title>

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


	<!-- ... end navbar -->
	<div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>

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

	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
			<?php require_once 'template/sidebar.php' ?>

			<!-- Dashboard Menu Starts here -->

			<!-- Dashboard menu ends here -->

			<!-- Your Account Personal Information -->

			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Donation Details</h6>
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
										<label class="control-label">NGO Name</label>
										<input class="form-control" placeholder="" type="text" readonly value="<?php echo get_name_by_id($con, $n_id); ?>">
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
									<a href="dashboardDonations.php" class="btn btn-primary btn-lg full-width">My Donations page</a>
								</div>
								<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

									<a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $id; ?>">
										<button class="btn btn-blue btn-lg full-width">Donate Again</button>
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

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Make Donation</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<center><img src="img/stripeLogo.png" width="150"></center><br>
									<form action="php_stripe_paypage-master/charge.php" method="post" id="payment-form">
										<div class="form-row">
											<input type="hidden" name="ngo_u_id" id="ngo_u_id" value="">
											<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
													<div class="form-group label-floating">
														<label class="control-label">Amount To Be Donated (USD)</label>
										<input type="number" name="donation_amount" class="form-control">
									</div>
								</div>
											<div id="card-element" class="form-control">
												<!-- a Stripe Element will be inserted here. -->
											</div>

											<!-- Used to display form errors -->
											<div id="card-errors" role="alert"></div>
										</div>

										<button>Submit Payment</button>
									</form>
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-blue" data-dismiss="modal">Close</button>
							</div>
					</div>

			</div>
	</div>


	<a class="back-to-top" href="#">
		<img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
	</a>

	<script src="https://js.stripe.com/v3/"></script>
	<script src="php_stripe_paypage-master/js/charge.js"></script>

	<!-- JS Scripts -->
	<script type="text/javascript">
	$('#myModal').on('show.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		$('#ngo_u_id').val(id);
		})
	</script>

</body>

</html>
