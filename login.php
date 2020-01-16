<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LinkedAID Login / Signup</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/multiple-select.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	<style media="screen">
	.field-icon {
float: right;
margin-left: -25px;
margin-top: -28px;
position: relative;
z-index: 2;
}
	</style>
</head>

<body>

	<!-- Top content -->
	<div class="top-content">
		<div class="container">

			<div class="row">
				<div class="col-sm-12 col-sm-offset text">
					<img src="assets/img/logo-final-md.png">
					<div class="description">
						<h1>
							Welcome to the Largest Humanitarian Social Network
						</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-10 col-sm-offset-4 show-forms">

					<span class="show-login-form active">Login</span>
					<span class="show-forms-divider">/</span>
					<span class="show-register-form ">Register as Supporter</span>
					<span class="show-forms-divider">/</span>
					<span class="show-register-form2 ">as NGO</span>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-6">
					<div id="success" class="alert alert-success" role="alert" style="display:none;">
					</div>
          <div id="error" class="alert alert-danger" role="alert" style="display:none;">
          </div>
				</div>
			</div>

			<div class="row login-form">
				<div class="col-sm-4 col-sm-offset-4">
					<div>
            <div class="form-group">
                  <select class="form-control" name="l-form-type" id="l-form-user">
                    <option value="">Login As</option>
                    <option value="donor">Donor</option>
                    <option value="ngo">NGO</option>
                  </select>
                </div>
						<div class="form-group">
							<label class="sr-only" for="l-form-username">Email address</label>
							<input type="text" name="l-form-username" placeholder="Email address" class="l-form-username form-control" id="l-form-username" autocomplete="on">
						</div>
						<div class="form-group">
							<label class="sr-only" for="l-form-password">Password</label>
								<input type="password" name="l-form-password" placeholder="Password" class="l-form-password form-control" id="l-form-password">
              <span toggle="#l-form-password" class="fa fa-fw fa-eye field-icon toggle-l-form-password"></span>

                        </div>



                            <div class="col-sm-12">
                                <small class="pull-right"><a href="#" style="color:#fff;" data-toggle="modal" data-target="#forgot_password_modal">Forgot Password? </a></small>
                            </div>
                        </div>
                        <br>
						<button type="submit" class="btn" id="signin">Sign in!</button>
                    </div>

				</div>

			</div>

			<div class="row register-form">
				<div class="col-sm-4 col-sm-offset-4">

					<div>
						<div class="form-group">
							<label class="sr-only" for="r-form-first-name">First name</label>
							<input type="text" name="r-form-first-name" placeholder="First name" class="r-form-first-name form-control" id="r-form-first-name" required>
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-last-name">Last name</label>
							<input type="text" name="r-form-last-name" placeholder="Last name" class="r-form-last-name form-control" id="r-form-last-name" required>
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-email">Email address</label>
							<input type="email" name="r-form-email" placeholder="Email address" class="r-form-email form-control" id="r-form-email" required>
						</div>
						<div class="form-group">
							<label class="sr-only" for="l-form-password">Password</label>
							<input type="password" name="l-form-password" placeholder="Password" class="l-form-password form-control" id="r-form-password" required>
							<span toggle="#r-form-password" class="fa fa-fw fa-eye field-icon toggle-l-form-password"></span>

						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-about-yourself">About yourself </label>
							<textarea name="r-form-about-yourself" placeholder="About yourself (optional)" class="r-form-about-yourself form-control" id="r-form-about-yourself"></textarea>
						</div>

						<button type="submit" class="btn" id="signupuser">Sign me up!</button>
                    </div>

				</div>
			</div>

			<div class="row register-form2">
				<div class="col-sm-4 col-sm-offset-4">

					<div>
						<div class="form-group">
							<label class="sr-only" for="r-form-first-name">NGO Name</label>
							<input type="text" name="r-form-first-name" placeholder="NGO Name" class="r-form-first-name form-control" id="n-ngo-name">
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-first-name">Country of operations</label>
							<select class="r-form-first-name form-control"  id="ms" multiple="multiple" style="border:none !important;" >
								<option value="AF">Afghanistan</option>
								<option value="AX">Åland Islands</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
								<option value="BY">Belarus</option>
								<option value="BE">Belgium</option>
								<option value="BZ">Belize</option>
								<option value="BJ">Benin</option>
								<option value="BM">Bermuda</option>
								<option value="BT">Bhutan</option>
								<option value="BO">Bolivia, Plurinational State of</option>
								<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
								<option value="BA">Bosnia and Herzegovina</option>
								<option value="BW">Botswana</option>
								<option value="BV">Bouvet Island</option>
								<option value="BR">Brazil</option>
								<option value="IO">British Indian Ocean Territory</option>
								<option value="BN">Brunei Darussalam</option>
								<option value="BG">Bulgaria</option>
								<option value="BF">Burkina Faso</option>
								<option value="BI">Burundi</option>
								<option value="KH">Cambodia</option>
								<option value="CM">Cameroon</option>
								<option value="CA">Canada</option>
								<option value="CV">Cape Verde</option>
								<option value="KY">Cayman Islands</option>
								<option value="CF">Central African Republic</option>
								<option value="TD">Chad</option>
								<option value="CL">Chile</option>
								<option value="CN">China</option>
								<option value="CX">Christmas Island</option>
								<option value="CC">Cocos (Keeling) Islands</option>
								<option value="CO">Colombia</option>
								<option value="KM">Comoros</option>
								<option value="CG">Congo</option>
								<option value="CD">Congo, the Democratic Republic of the</option>
								<option value="CK">Cook Islands</option>
								<option value="CR">Costa Rica</option>
								<option value="CI">Côte d'Ivoire</option>
								<option value="HR">Croatia</option>
								<option value="CU">Cuba</option>
								<option value="CW">Curaçao</option>
								<option value="CY">Cyprus</option>
								<option value="CZ">Czech Republic</option>
								<option value="DK">Denmark</option>
								<option value="DJ">Djibouti</option>
								<option value="DM">Dominica</option>
								<option value="DO">Dominican Republic</option>
								<option value="EC">Ecuador</option>
								<option value="EG">Egypt</option>
								<option value="SV">El Salvador</option>
								<option value="GQ">Equatorial Guinea</option>
								<option value="ER">Eritrea</option>
								<option value="EE">Estonia</option>
								<option value="ET">Ethiopia</option>
								<option value="FK">Falkland Islands (Malvinas)</option>
								<option value="FO">Faroe Islands</option>
								<option value="FJ">Fiji</option>
								<option value="FI">Finland</option>
								<option value="FR">France</option>
								<option value="GF">French Guiana</option>
								<option value="PF">French Polynesia</option>
								<option value="TF">French Southern Territories</option>
								<option value="GA">Gabon</option>
								<option value="GM">Gambia</option>
								<option value="GE">Georgia</option>
								<option value="DE">Germany</option>
								<option value="GH">Ghana</option>
								<option value="GI">Gibraltar</option>
								<option value="GR">Greece</option>
								<option value="GL">Greenland</option>
								<option value="GD">Grenada</option>
								<option value="GP">Guadeloupe</option>
								<option value="GU">Guam</option>
								<option value="GT">Guatemala</option>
								<option value="GG">Guernsey</option>
								<option value="GN">Guinea</option>
								<option value="GW">Guinea-Bissau</option>
								<option value="GY">Guyana</option>
								<option value="HT">Haiti</option>
								<option value="HM">Heard Island and McDonald Islands</option>
								<option value="VA">Holy See (Vatican City State)</option>
								<option value="HN">Honduras</option>
								<option value="HK">Hong Kong</option>
								<option value="HU">Hungary</option>
								<option value="IS">Iceland</option>
								<option value="IN">India</option>
								<option value="ID">Indonesia</option>
								<option value="IR">Iran, Islamic Republic of</option>
								<option value="IQ">Iraq</option>
								<option value="IE">Ireland</option>
								<option value="IM">Isle of Man</option>
								<option value="IL">Israel</option>
								<option value="IT">Italy</option>
								<option value="JM">Jamaica</option>
								<option value="JP">Japan</option>
								<option value="JE">Jersey</option>
								<option value="JO">Jordan</option>
								<option value="KZ">Kazakhstan</option>
								<option value="KE">Kenya</option>
								<option value="KI">Kiribati</option>
								<option value="KP">Korea, Democratic People's Republic of</option>
								<option value="KR">Korea, Republic of</option>
								<option value="KW">Kuwait</option>
								<option value="KG">Kyrgyzstan</option>
								<option value="LA">Lao People's Democratic Republic</option>
								<option value="LV">Latvia</option>
								<option value="LB">Lebanon</option>
								<option value="LS">Lesotho</option>
								<option value="LR">Liberia</option>
								<option value="LY">Libya</option>
								<option value="LI">Liechtenstein</option>
								<option value="LT">Lithuania</option>
								<option value="LU">Luxembourg</option>
								<option value="MO">Macao</option>
								<option value="MK">Macedonia, the former Yugoslav Republic of</option>
								<option value="MG">Madagascar</option>
								<option value="MW">Malawi</option>
								<option value="MY">Malaysia</option>
								<option value="MV">Maldives</option>
								<option value="ML">Mali</option>
								<option value="MT">Malta</option>
								<option value="MH">Marshall Islands</option>
								<option value="MQ">Martinique</option>
								<option value="MR">Mauritania</option>
								<option value="MU">Mauritius</option>
								<option value="YT">Mayotte</option>
								<option value="MX">Mexico</option>
								<option value="FM">Micronesia, Federated States of</option>
								<option value="MD">Moldova, Republic of</option>
								<option value="MC">Monaco</option>
								<option value="MN">Mongolia</option>
								<option value="ME">Montenegro</option>
								<option value="MS">Montserrat</option>
								<option value="MA">Morocco</option>
								<option value="MZ">Mozambique</option>
								<option value="MM">Myanmar</option>
								<option value="NA">Namibia</option>
								<option value="NR">Nauru</option>
								<option value="NP">Nepal</option>
								<option value="NL">Netherlands</option>
								<option value="NC">New Caledonia</option>
								<option value="NZ">New Zealand</option>
								<option value="NI">Nicaragua</option>
								<option value="NE">Niger</option>
								<option value="NG">Nigeria</option>
								<option value="NU">Niue</option>
								<option value="NF">Norfolk Island</option>
								<option value="MP">Northern Mariana Islands</option>
								<option value="NO">Norway</option>
								<option value="OM">Oman</option>
								<option value="PK">Pakistan</option>
								<option value="PW">Palau</option>
								<option value="PS">Palestinian Territory, Occupied</option>
								<option value="PA">Panama</option>
								<option value="PG">Papua New Guinea</option>
								<option value="PY">Paraguay</option>
								<option value="PE">Peru</option>
								<option value="PH">Philippines</option>
								<option value="PN">Pitcairn</option>
								<option value="PL">Poland</option>
								<option value="PT">Portugal</option>
								<option value="PR">Puerto Rico</option>
								<option value="QA">Qatar</option>
								<option value="RE">Réunion</option>
								<option value="RO">Romania</option>
								<option value="RU">Russian Federation</option>
								<option value="RW">Rwanda</option>
								<option value="BL">Saint Barthélemy</option>
								<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
								<option value="KN">Saint Kitts and Nevis</option>
								<option value="LC">Saint Lucia</option>
								<option value="MF">Saint Martin (French part)</option>
								<option value="PM">Saint Pierre and Miquelon</option>
								<option value="VC">Saint Vincent and the Grenadines</option>
								<option value="WS">Samoa</option>
								<option value="SM">San Marino</option>
								<option value="ST">Sao Tome and Principe</option>
								<option value="SA">Saudi Arabia</option>
								<option value="SN">Senegal</option>
								<option value="RS">Serbia</option>
								<option value="SC">Seychelles</option>
								<option value="SL">Sierra Leone</option>
								<option value="SG">Singapore</option>
								<option value="SX">Sint Maarten (Dutch part)</option>
								<option value="SK">Slovakia</option>
								<option value="SI">Slovenia</option>
								<option value="SB">Solomon Islands</option>
								<option value="SO">Somalia</option>
								<option value="ZA">South Africa</option>
								<option value="GS">South Georgia and the South Sandwich Islands</option>
								<option value="SS">South Sudan</option>
								<option value="ES">Spain</option>
								<option value="LK">Sri Lanka</option>
								<option value="SD">Sudan</option>
								<option value="SR">Suriname</option>
								<option value="SJ">Svalbard and Jan Mayen</option>
								<option value="SZ">Swaziland</option>
								<option value="SE">Sweden</option>
								<option value="CH">Switzerland</option>
								<option value="SY">Syrian Arab Republic</option>
								<option value="TW">Taiwan, Province of China</option>
								<option value="TJ">Tajikistan</option>
								<option value="TZ">Tanzania, United Republic of</option>
								<option value="TH">Thailand</option>
								<option value="TL">Timor-Leste</option>
								<option value="TG">Togo</option>
								<option value="TK">Tokelau</option>
								<option value="TO">Tonga</option>
								<option value="TT">Trinidad and Tobago</option>
								<option value="TN">Tunisia</option>
								<option value="TR">Turkey</option>
								<option value="TM">Turkmenistan</option>
								<option value="TC">Turks and Caicos Islands</option>
								<option value="TV">Tuvalu</option>
								<option value="UG">Uganda</option>
								<option value="UA">Ukraine</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">United Kingdom</option>
								<option value="US">United States</option>
								<option value="UM">United States Minor Outlying Islands</option>
								<option value="UY">Uruguay</option>
								<option value="UZ">Uzbekistan</option>
								<option value="VU">Vanuatu</option>
								<option value="VE">Venezuela, Bolivarian Republic of</option>
								<option value="VN">Viet Nam</option>
								<option value="VG">Virgin Islands, British</option>
								<option value="VI">Virgin Islands, U.S.</option>
								<option value="WF">Wallis and Futuna</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
							</select>
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-first-name">Contact person first name</label>
							<input type="text" name="r-form-first-name" placeholder="Contact person first name..." class="r-form-first-name form-control" id="n-form-first-name">
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-last-name">Contact person last name</label>
							<input type="text" name="r-form-last-name" placeholder="Contact person last name..." class="r-form-last-name form-control" id="n-form-last-name">
						</div>
						<div class="form-group">
							<label class="sr-only" for="r-form-email">Email address</label>
							<input type="text" name="r-form-email" placeholder="Email address" class="r-form-email form-control" id="n-form-email">
						</div>

						<div class="form-group">
							<label class="sr-only" for="l-form-password">Password</label>
							<input type="password" name="l-form-password" placeholder="Password" class="l-form-password form-control" id="n-form-password">
							<span toggle="#n-form-password" class="fa fa-fw fa-eye field-icon toggle-l-form-password"></span>
						</div>

						<div class="form-group">
							<label class="" for="l-form-password">Documents</label>
							<input type="file" name="l-form-password" placeholder="Password" class="l-form-password form-control" id="n-form-password">
							<span toggle="#n-form-password" class="fa fa-fw fa-eye field-icon toggle-l-form-password"></span>
						</div>


						<button type="submit" class="btn" id="signupngo">Sign up!</button>
                    </div>
				</div>
			</div>



		</div>
	</div>

  <div class="modal fade" id="forgot_password_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="" id="form-reset-password" action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">

              <select class="form-control" name="user_role">
                <option value="">--Select--</option>
                <option value="donor">Donor</option>
                <option value="ngo">NGO</option>
              </select>
            </div>
              <div class="form-group">
                <input type="email" id="password_reset" name="email" class="form-control" placeholder="Enter Your Email">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="reset-password-submit" name="" class="btn btn-primary">Save changes</button>
        </div>
      </form>

      </div>
    </div>
  </div>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<p class="centerwa mt">It is free, and will always be!</p>
				<div class="col-sm-8 col-sm-offset-2">
					<div class="footer-border"></div>
					<p>All rights reserved by
						<a href="" target="_blank">LinkedAID</a>.</p>
				</div>

			</div>
		</div>
	</footer>

	<!-- Javascript -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.backstretch.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/multiple-select.js"></script>
	<script>
		$(function() {
			$("#error").hide();
      $("#success").hide();

			$('#ms').change(function() {
				console.log($(this).val());
			}).multipleSelect({
				width: '100%'
            });
            $('#signin').click(function() {
				let username = $('#l-form-username').val();
				let password = $('#l-form-password').val();
				let type = $('#l-form-user').val();
				if (username == "" || password == "" || type == "") {
						$('#error').show();
						$('#error').text('Please fill out all fields!');
				} else {
					$('#signin').text('Checking...');
					$('#signin').attr('disabled', 'disabled');
					$('#error').hide();
				$.ajax({
					type: "POST",
					url: 'core/init.php',
					data: {type: 'login', usertype: type, email: username, password: password},
					success: function(data) {
						if (data == 1 && type == 'ngo') {
							$('#error').show();
							$('#error').text('Your account is not yet approved. Please await approval');
							$('#signin').text('Sign in!');
							$('#signin').removeAttr("disabled");
						} else if (data == 2 && type == 'ngo') {
							$('#error').show();
							$('#error').text('Your account has been rejected.');
							$('#signin').text('Sign in!');
							$('#signin').removeAttr("disabled");
						}
						else if(data == 'Authenticated' && type == 'ngo') {
							window.location.href = "ngoProfilepublic.php";
						} else if (data == 'Authenticated' && type == 'donor') {
              window.location.href = "publicprofilePage.php";
            }
             else if(data == "Incorrect Password") {
							$('#error').show();
							$('#error').text('Wrong username / password. Try again.');
							$('#signin').text('Sign in!');
							$('#signin').removeAttr("disabled");

					}
        },
        cache: false
				});
			}
            });

            $('#signupuser').click(function(){
							let firstname = $('#r-form-first-name').val();
							let lastname = $('#r-form-last-name').val();
							let email = $('#r-form-email').val();
							let password = $('#r-form-password').val();
							let description = $('#r-form-about-yourself').val();
							var strength = 0;
							var pass_err;
							// validate all fields here
							if (firstname == "" || lastname == "" || email == "" || password == "") {
								$('#error').show();
								$('#error').text('Please fill out all required fields!');
							} else if (password.length <= 6) {
								pass_err = "Your Password is too short. Password length must be upto 6 digits and should include letters, numbers and special characters!";
								$('#error').show();
								$('#error').text(pass_err);
							} else if (password.length > 7) {
								if (password.length >= 7) strength += 1
										if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
										if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
										if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
										if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
										if (strength < 2) {
											pass_err = "Your password strength is weak. It must include letters, numbers and special characters!";
											$('#error').show();
											$('#error').text(pass_err);
											return;
										} else if (strength == 2) {
											pass_err = "Your password strength is normal. It must include letters, numbers and special characters!";
											$('#error').show();
											$('#error').text(pass_err);
											return;
										} else {
											pass_err = "Nice! Strong Password";
											$('#error').hide();
											$('#success').show();
											$('#success').text(pass_err);
										}
					// register now
							$('#error').hide();


							$('#signupuser').text('Checking...');
							$('#signupuser').attr('disabled', 'disabled');
							$('#error').hide();
							$.ajax({
								type: "POST",
								url: 'xml_http_request/register_user.php',
								data: {type: 'registeruser', firstname: firstname, lastname: lastname, email: email, password: password, description: description},
								success: result => {
									if(result === 'logged_in') {
										$('#success').show();
										window.location.href='publicprofilePage.php'
										// $('#success').text('Supporter Registration Successful! Please login and complete your profile');
									}else if(result == 1){
										$('#error').show();
										$('#error').text('User with this email already exists! Use some other email address.');
										$('#signupuser').text('Sign me up!');
										$('#signupuser').removeAttr("disabled");
									} else {
										$('#error').show();
										$('#error').text('Some error occured. Try again later!');
										$('#signupuser').text('Sign me up!');
										$('#signupuser').removeAttr("disabled");
									}
								}
							});
						}


            });
            $('#signupngo').click(function(){
                // validate all fields here
					// register now
					$('#error').hide();
					let firstname = $('#n-form-first-name').val();
					let lastname = $('#n-form-last-name').val();
					let email = $('#n-form-email').val();
					let password = $('#n-form-password').val();
					let countries = $('#ms').val();
					let name = $('#n-ngo-name').val();
					var strength = 0;
					var pass_err;
					// validate all fields here
					if (firstname == "" || lastname == "" || email == "" || password == "" || countries == "" || name == "") {
						$('#error').show();
						$('#error').text('Please fill out all fields!');
					} else if (password.length <= 6) {
						pass_err = "Your Password is too short. Password length must be upto 6 digits and should include letters, numbers and special characters!";
						$('#error').show();
						$('#error').text(pass_err);
					} else if (password.length > 7) {
						if (password.length >= 7) strength += 1
								if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
								if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
								if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
								if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
								if (strength < 2) {
									pass_err = "Your password strength is weak. It must include letters, numbers and special characters!";
									$('#error').show();
									$('#error').text(pass_err);
									return;
								} else if (strength == 2) {
									pass_err = "Your password strength is normal. It must include letters, numbers and special characters!";
									$('#error').show();
									$('#error').text(pass_err);
									return;
								} else {
									pass_err = "Nice! Strong Password";
									$('#error').hide();
									$('#success').show();
									$('#success').text(pass_err);
								}
					// $('#signupngo').text('Checking...');
					// $('#signupngo').attr('disabled', 'disabled');
					$('#error').hide();
					$.ajax({
						type: "POST",
						url: 'xml_http_request/register_ngo.php',
						data: {type: 'registerngo', firstname: firstname, lastname: lastname, email: email, password: password, name: name, countries: countries},
						success: function(result) {
							if(result == true) {
                $('#success').show();
								// $('#success').text('Ngo Registration Successful! Please login and complete your profile');
								window.location.href='ngoProfilepublic.php';
							}else if(result == 1){
								$('#error').show();
								$('#error').text('Email already exists! Use some other email address.');
								$('#signupngo').text('Sign me up!');
								$('#signupngo').removeAttr("disabled");
							}else {
								$('#error').show();
								$('#error').text('Some error occured. Try again later!');
								$('#signupngo').text('Sign up!');
								$('#signupngo').removeAttr("disabled");
							}
						}
					});
				}
            });

            $('#form-reset-password').submit(function(e) {
              e.preventDefault();
              $.ajax({
                 url: 'xml_http_request/password_reset.php',
                 type: 'POST',
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData:false,
                 success: function(data) {
                   if (data == 0) {
                     $('#error').show();
                     $('#error').text('No Such User Exists!');
                   } else if (data == 1) {
                     $('#error').hide();
                     $('#success').show();
                     $('#success').text('Password Reset Successfully! Please check your email');
                   } else {
                     $('#error').show();
                     $('#error').text('Something Went Wrong! Please try again later');
                   }

                   $("#forgot_password_modal").modal('hide');

               }
		});
		});

		$(".toggle-l-form-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
		});
	</script>

	<!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
