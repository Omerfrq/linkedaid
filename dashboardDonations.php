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


	<!-- ... end Header Standard -->
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


	<div class="container">

		<!-- Donation Stats starts here-->

		<div class="row">

			<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-content">
						<ul class="statistics-list-count">
							<li>
								<div class="points">
									<span>
										Last Month Donation
									</span>
								</div>
								<div class="count-stat">0$
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-content">
						<ul class="statistics-list-count">
							<li>
								<div class="points">
									<span>
										This Month Donation
									</span>
								</div>
								<div class="count-stat">0$
									<span class="indicator positive"> +25%</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-content">
						<ul class="statistics-list-count">
							<li>
								<div class="points">
									<span>
										Total Donation since [Joined Date]
									</span>
								</div>
								<div class="count-stat">0$
									<span class="indicator "> </span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-content">
						<ul class="statistics-list-count">
							<li>
								<div class="points">
									<span>
										Number of NGOs i supported
									</span>
								</div>
								<div class="count-stat">0
									<span class="indicator positive"> + 50%</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<!-- Donation Stats ends here-->

		<div class="row">

			<!-- Dashboard Menu Starts here -->
			<?php require_once 'template/sidebar.php' ?>

			<!-- Dashboard menu ends here -->

			<!-- Your Account Personal Information -->

			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
				<?php
				if (isset($_GET['donation_success'])) { ?>
					<div class="alert alert-light" role="alert" style="background-color: #d1ecf1; font-size: 16px; text-align: center;">
						Amount Donated!
					</div>
				<?php } ?>
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">My Donations</h6>
					</div>


					<!-- Notification List Frien Requests -->

					<ul class="notification-list friend-requests">
						<?php
						 	$sql = mysqli_query($con, "SELECT *, donations.id as `donation_id` FROM donations INNER JOIN ngo ON ngo.user_id = donations.n_id WHERE donations.d_id = '".$_SESSION['id']."'");
							while ($row = mysqli_fetch_array($sql)) { ?>
						<li>
							<div class="author-thumb">
								<img src="img/avatar18-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend"><?php echo $row['ngo_name']; ?></a>
								<span class="chat-message-item"><?php echo $row['ngo_city_of_op'] . ', ' . $row['ngo_country_of_op']; ?></span><br>
								<span style="color:#1abc9c">$<?php echo $row['donated_amount']; ?></span>
								<span style="color:#00a8ff">[ <?php echo $row['pay_date']; ?> ]</span>
							</div>
							<span class="notification-icon">
								<a href="dashbboardDonationsDetails.php?id=<?php echo $row['donation_id']; ?>" class="accept-request">
									View Details
								</a>

								<a href="#" class="accept-request request-del" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>">
									Donate Again
								</a>

							</span>


						</li>
					<?php } ?>



					</ul>

					<!-- ... end Notification List Frien Requests -->
				</div>

			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->



	<!-- ... end Footer -->

	<!-- Modal -->


	<a class="back-to-top" href="#">
		<img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
	</a>
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



	<!-- JS Scripts -->
	<?php require('template/footer.inc.php'); ?>
	<script src="https://js.stripe.com/v3/"></script>
	<script src="php_stripe_paypage-master/js/charge.js"></script>
		<script type="text/javascript">
		$('#myModal').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
			$('#ngo_u_id').val(id);
			})
		</script>

</body>

</html>
