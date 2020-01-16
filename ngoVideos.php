<?php
require_once('core/init.php');
if ($_SESSION['user_type'] != 1) {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<style media="screen">

.progress
{
			text-align: left;
	    margin-top: 20px;
	    display: none;
	    position: relative;
	    width: 400px;
	    border: 1px solid #ddd;
	    padding: 1px;
	    border-radius: 3px;
}
.bar
{
background-color: #B4F5B4;
width:0%;
height: 30px;
border-radius: 3px;
}
.percent
{
position:absolute;
display:inline-block;
top:8px;
left:48%;
}
</style>
    <title>NGO- Videos</title>

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo-final-sm.png" width="150" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarResponsive">

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a href="newsfeed.html" class="nav-link waddaFont active"> Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profiles</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item " href="ngoProfilepublic.html">My Page</a>
                            <a class="dropdown-item " href="publicprofilePage.html">My Profile</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'> LinkedAID</a>
                        <div class="dropdown-menu ">
                            <a class="dropdown-item" href="aboutus.html">About us</a>
                            <a class="dropdown-item" href="travelAid.html">TravelAID</a>
                            <a class="dropdown-item" href="faqs.html">FAQs</a>
                            <a class="dropdown-item" href="privacyPolicy.html">Privacy Policy</a>
                            <a class="dropdown-item" href="terms.html">Terms & Conditions</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="contactus.html" class="nav-link waddaFont"> Contact us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>
                            <i class="fa fa-language" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item " href="ngoProfilepublic.html">
                                <img src="img/us.png"> en</a>
                            <a class="dropdown-item " href="publicprofilePage.html">
                                <img src="img/fr.png"> fr</a>
                            <a class="dropdown-item " href="publicprofilePage.html">
                                <img src="img/spi.png"> sp</a>
                        </div>
                    </li>

                    <li class="close-responsive-menu js-close-responsive-menu">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ... end Header Standard -->

    <div class="header-spacer--standard"><?php require('template/navbar.inc.php'); ?></div>

    <!-- Top Header-Profile -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header top-header-favorit">
                        <div class="top-header-thumb">
                            <img src="img/top-header5.png" alt="nature">
                            <div class="top-header-author">
                                <div class="author-thumb">
                                    <img src="img/<?php echo $user_data['pic_name']; ?>" alt="author">
                                </div>
                                <div class="author-content">
                                    <a href="ngoProfilepublic.php" class="h3 author-name"><?php echo $user_data['ngo_name']; ?></a>
                                    <div class="country"><?php echo $user_data['ngo_hq'] . ', ' . $user_data['ngo_country_of_op']; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main Content-->

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title ">NGO's Video</div>
                        <div class="align-right">
                            <button type="button" id="btn-img-modal" data-toggle="modal" data-target="#img-modal" class="btn btn-md-2 btn-border-think custom-color c-grey">Add New Video</a>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row" id="videoAppend">

					<?php
						$sql = mysqli_query($con, "SELECT * FROM ngo_videos WHERE user_id = '".$_SESSION['id']."'");
						if (mysqli_num_rows($sql) > 0) {
						while ($row = mysqli_fetch_array($sql)) { ?>

            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

                <div class="ui-block video-item">
                    <!-- <div class="video-player"> -->
                        <!-- <img src="videos/<?php echo $row['v_name']; ?>" alt="photo"> -->
												<video width="293" height="240" controls>
  <source src="videos/<?php echo $row['v_name']; ?>" type="video/mp4">
</video>
                        <!-- <a href="" class="play-video">
                            <i class="fa fa-play" style="color:#fff;"></i>
                        </a> -->
                        <!-- <div class="overlay overlay-dark"></div> -->

                        <!-- <div class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg></div> -->
                    <!-- </div> -->

                    <div class="ui-block-content video-content">
                        <a href="#" class="h6 title"><?php echo $row['v_name']; ?></a>
                        <time class="published" datetime="2017-03-24T18:18">18:44</time>
                    </div>
                </div>

            </div>
					<?php }
				} else {
					echo "<h3>You have not uploaded any Videos!</h3>";
				}
				 ?>

        </div>
    </div>
>

    <!-- ... end Footer -->
    <div class="modal fade" id="img-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Video</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
					<form id="upload_form" enctype="multipart/form-data" method="post">

					<div class="modal-body">
						<div class="form-group">
							<label for="" style="font-size: 18px;">Title</label>
						<input type="text" name="v_title" id="v_title" style="height: 45px;">
						</div>
  <input type="file" name="file1" id="file1"><br>
  <center><progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p></center>
</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" id="img-form-submit" name="" class="btn btn-primary" onclick="uploadFile()">Save changes</button>
	</div>
	</form>

          </div>


      </div>
    </div>
    <?php require('template/footer.inc.php'); ?>


    <!-- JS Scripts -->
    <script type="text/javascript">
		function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
	var v_title = document.getElementById('v_title').value;
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  formdata.append("v_title", v_title);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php");
	 // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
	var text;
	if(event.target.responseText == 1) {
		text = "Invalid Format! Only mp4, avi, 3gp, mov and mpeg videos are allowed!";
	} else if (event.target.responseText == 2) {
		text = "Your Video is too large!";
	}
	else if (event.target.responseText == 3) {
		text = "Video Uploaded!";
	}
	else if (event.target.responseText == 4) {
		text = "Something Went Wrong! Please try again later.";
	}
	else if (event.target.responseText == 5) {
		text = "Could Not Move File!";
	}
  _("status").innerHTML = text;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}



    </script>
</body>

</html>
