<?php
include 'core/init.php';
if (isset($_SESSION['user']) != 'ngo') {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>NGO Public Profile</title>

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

    <div class="header-spacer--standard">
      	<?php require('template/navbar.inc.php'); ?>
    </div>

    <!-- Top Header-Profile -->

    <div class="container">
        <div class="row ">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header ">
                        <div class="top-header-thumb">
                            <img src="img/top-header-greenwa.jpg" alt="">
                            <div class="content-bg-wrap stunning-header-bg2" style="width:100%;"></div>
                            <div class="top-header-author">
                                <div class="author-thumb">
                                    <img src="img/<?php echo $user_data['pic_name']; ?>" alt="author">
                                </div>
                                <div class="author-content">
                                    <a href="#" class="h3 author-name" style="color:#ffffff"><?php echo $user_data['ngo_name']; ?> </a>
                                </div>
                                <div class="country" style="color:#ffffff">San Francisco, CA</div>
                            </div>
                        </div>
                        <div class="profile-section">
                            <div class="control-block-button">
                                <a href="#" class="btn btn-control bg-primary" data-toggle="tooltip" title="Favorite this NGO">
                                    <i class="fa fa-star"></i>
                                </a>

                                <a href="#" class="btn btn-control bg-purple" data-toggle="tooltip" title="Invite your contacts ">
                                    <i class="fa fa-share"></i>
                                </a>
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
            <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-12">
                <div class="ui-block">

                    <!-- News Feed Form  -->

                    <div class="news-feed-form">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab"
                                    aria-expanded="true">

                                    <i class="fa fa-edit" aria-hidden="true"></i>

                                    <span>Write a Post</span>
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="blog" role="tabpanel" aria-expanded="true">
                                  <form id="upload_form" method="post" enctype="multipart/form-data">
                                    <div class="author-thumb">
                                        <img src="img/avatar5-sm.jpg" alt="author">
                                    </div>

                                    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']; ?>">
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label">Share comething here...</label>
                                        <textarea class="form-control" name="post_description" id="post_description" placeholder="" value=""></textarea>
                                    </div>
                                    <div class="add-options-message">
                                        <a href="javascript:void(0)" class="options-message" data-toggle="tooltip" data-placement="top"
                                            data-original-title="Add Photo / Video" id="post_img">
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                        </a>
                                        <input type="file" name="post_photo" id="post_photo" style="display:none;">
                                        <a href="javascript:void(0)" class="options-message" data-toggle="tooltip" data-placement="top"
                                            data-original-title="ADD LOCATION">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </a>

                                        <button type="button" class="btn btn-breez btn-md-2" onclick="uploadFile()">Post Status</button>
																				<p class="file-name"></p>
                                        <progress id="progressBar" value="0" max="100"></progress>
  																				<h3 id="status"></h3>
																			  <p id="loaded_n_total"></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ... end News Feed Form  -->
                </div>

                <div id="newsfeed-items-grid">
                    <div class="ui-block">

                        <!-- Post -->
                        <div id="recent_post">

                        </div>

                        <?php

                        $sql = "SELECT * FROM ngo_posts WHERE p_id = '".$user_data['id']."' ORDER BY id DESC LIMIT 4";
                             $result = mysqli_query($con, $sql);
                             if (mysqli_num_rows($result) > 0) {

                             while($row = mysqli_fetch_array($result)){
															 $file_name = $row['pic_name'];
															 $explode = explode('.',$file_name);
														   $file_ext = strtolower(end($explode));
														   $extensions= array("mp4","avi","3gp","mov","mpeg");

                         ?>
                         <article class="hentry post" id="post<?php echo $row['id']; ?>">

             							<div class="post__author author vcard inline-items">
             								<div class="author-thumb">
             									<img src="img/<?php echo $user_data['pic_name']; ?>" alt="author">
             									<!-- <div class="label-avatar bg-primary">1</div> -->
             								</div>

             								<div class="author-date">
             									<a class="h6 post__author-name fn" href="#"><?php echo $user_data['ngo_name']; ?></a>
             									<div class="post__date">
             										<time class="published" datetime="2017-03-24T18:18">
             											<?php echo date('d-M-Y', strtotime($row['post_publish_date'])); ?>
             										</time>
             									</div>
             								</div>

             								<div class="more">
             									<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
             									<ul class="more-dropdown">

             										<li>
             											<a href="javascript:void(0)" id="delete_post" onclick="delete_post(<?php echo $row['id']; ?>)">Delete Post</a>
             										</li>

             									</ul>
             								</div>

             							</div>
             							<p><?php echo $row['post_description']; ?></p>
													<?php if(in_array($file_ext,$extensions)	=== false){ ?>
             							<p><center><img src="img/<?php echo $row['pic_name']; ?>" style="width: 100%;"></center></p>
												<?php } else { ?>
													<video width="100%;" height="240" controls>
	  <source src="img/<?php echo $row['pic_name']; ?>" type="video/mp4">
	</video>
												<?php } ?>
             							<div class="post-additional-info inline-items">

             								<a href="#" class="post-add-icon inline-items">
             									<i class="fa fa-thumbs-up" aria-hidden="true"></i>
             									<span>36</span>
             								</a>

             								<div class="comments-shared">
             									<a href="#" class="post-add-icon inline-items">
             										<i class="fa fa-comments" aria-hidden="true"></i>
             										<span>17</span>
             									</a>

             									<a href="#" class="post-add-icon inline-items">
             										<i class="fa fa-share" aria-hidden="true"></i>
             										<span>24</span>
             									</a>
             								</div>


             							</div>



             						</article>
                      <?php } } ?>
                        <!-- ... end Post -->


                        <!-- Comments -->

                        <!-- <ul class="comments-list">
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="img/avatar2-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Nicholas Grissom</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2017-03-24T18:18">
                                                28 mins ago
                                            </time>
                                        </div>
                                    </div>


                                </div>

                                <p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                    sunt
                                    in culpa qui officia deserunt mollit.</p>

                                <a href="#" class="post-add-icon inline-items">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    <span>6</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="img/avatar19-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Jimmy Elricson</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2017-03-24T18:18">
                                                2 hours ago
                                            </time>
                                        </div>
                                    </div>


                                </div>

                                <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem
                                    ipsum
                                    quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure
                                    dolor
                                    in reprehenderit in voluptate velit esse cillum.
                                </p>

                                <a href="#" class="post-add-icon inline-items">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    <span>8</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                        </ul> -->

                        <!-- ... end Comments -->

                        <!-- <a href="#" class="more-comments">View more comments
                            <span>+</span>
                        </a> -->


                        <!-- Comment Form  -->

                        <!-- <form class="comment-form inline-items">

                            <div class="post__author author vcard inline-items">
                                <img src="img/avatar5-sm.jpg" alt="author">

                                <div class="form-group with-icon-right ">
                                    <textarea class="form-control" placeholder=""></textarea>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                            <svg class="olymp-camera-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-md-2 btn-breez">Post Comment</button>

                            <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

                        </form> -->

                        <!-- ... end Comment Form  -->
                    </div>

                </div>
                <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html"
                    data-container="newsfeed-items-grid">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </a>

            </div>

            <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Page Intro</h6>
                        <a href="ngoDBinfo.php" class="more">
                            <button type="button" class="btn btn-breez" data-toggle="tooltip" data-placement="left"
                                title="View Dashboard">
                                Dashboard
                            </button>
                        </a>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Personal-Info -->

                        <ul class="widget w-personal-info item-block">
                            <li>
                                <span class="text"><?php echo $user_data['ngo_page_description']; ?></span>
                            </li>
                            <li>
                                <span class="title">Created:</span>
                                <span class="text"><?php echo $user_data['ngo_active_since']; ?></span>
                            </li>
                            <li>
                                <span class="title">Based in:</span>
                                <span class="text"><?php echo $user_data['ngo_hq']; ?></span>
                            </li>
                            <li>
                                <span class="title">Sectors of action:</span>
                                <span class="text"><?php echo $user_data['sectors_of_action']; ?></span>
                            </li>
                            <li>
                                <span class="title">Contact:</span>
                                <a href="#" class="text"><?php echo $user_data['email']; ?></a>
                            </li>
                            <li>
                                <span class="title">Website:</span>
                                <a href="#" class="text"><?php echo $user_data['ngo_website']; ?></a>
                            </li>
                            <li>
                                <span class="title">Favourites:</span>
                                <a href="#" class="text">5630 </a>
                            </li>
                        </ul>

                        <!-- ... end W-Personal-Info -->
                        <!-- W-Socials -->

                        <div class="widget w-socials">
                            <h6 class="title">Other Social Networks:</h6>
                            <a href="<?php echo $user_data['ngo_fb_account']; ?>" class="social-item bg-facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                Facebook
                            </a>
                            <a href="<?php echo $user_data['ngo_tw_account']; ?>" class="social-item bg-twitter">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                Twitter
                            </a>
                            <a href="#" class="social-item bg-dribbble">
                                <i class="fab fa-dribbble" aria-hidden="true"></i>
                                Dribbble
                            </a>
                        </div>


                        <!-- ... end W-Socials -->
                    </div>
                </div>

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Additional Info</h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Personal-Info -->

                        <ul class="widget w-personal-info item-block">
                            <li>
                                <span class="title">Additional Info:</span>
                                <span class="text"><?php echo $user_data['additional_info']; ?>
                                </span>
                            </li>
                            <li>
                                <span class="title">Since:</span>
                                <span class="text"><?php echo $user_data['ngo_active_since']; ?></span>
                            </li>
                            <li>
                                <span class="title">Phone Number:</span>
                                <span class="text"><?php echo $user_data['ngo_phone']; ?></span>
                            </li>
                        </ul>

                        <!-- ... end W-Personal-Info -->
                    </div>
                </div>

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Location</h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>


                    <!-- Contacts -->

                    <div class="widget w-contacts">
                        <!-- Google map -->

                        <div class="section">
                            <div id="map"></div>
                            <script>
                                var map;

                                function initMap() {

                                    var myLatLng = { lat: -25.363, lng: 131.044 };

                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: myLatLng,
                                        zoom: 14,
                                        scrollwheel: false//set to true to enable mouse scrolling while inside the map area
                                    });

                                    var marker = new google.maps.Marker({
                                        position: myLatLng,
                                        map: map,
                                        icon: {
                                            url: "img/marker-google.png",
                                            scaledSize: new google.maps.Size(50, 50)
                                        }

                                    });
                                }


                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBESxStZOWN9aMvTdR3Nov66v6TXxpRZMM&callback=initMap"
                                async defer></script>
                        </div>

                        <!-- End Google map -->

                        <ul>
                            <li>
                                <span class="title">Address:</span>
                                <span class="text"><?php echo $user_data['ngo_page_description']; ?>
                                </span>
                            </li>
                            <li>
                                <span class="title">Working Hours:</span>
                                <span class="text">Mon-Fri 9:00am to 6:00pm Weekends 10:00am to 8:00pm
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- ... end Contacts -->
                </div>



            </div>

            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

                <div class="ui-block">

                    <!-- W-Action -->

                    <div class="widget w-action tp2">

                        <img src="img/logo-icon.png" alt="LinkedAID" width="50%">
                        <div class="content">
                            <h4 class="title">LinkedAID</h4>
                            <span style="text-transform:none;">Reduce Poverty, Donate to small NGOs </br>that make a
                                difference</span>
                            <a href="ngoList.html" class="btn btn-primary btn-md">DONATE To Edhi!</a>
                        </div>
                    </div>

                    <!-- ... end W-Action -->
                </div>


                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Supporters of Edhi Foundation</h6>
                        <div class="more">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            <ul class="more-dropdown">

                                <li>
                                    <a href="donorsList.html">View all</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Faved-Page -->

                        <ul class="widget w-faved-page">
                            <li>
                                <a href="#">
                                    <img src="img/faved-page1.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page2.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page3.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page4.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page5.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page6.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page8.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page9.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page10.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page11.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page7.jpg" alt="user">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="img/faved-page12.jpg" alt="user">
                                </a>
                            </li>
                            <li class="all-users bg-breez">
                                <a href="#" class="bg-breez">+25</a>
                            </li>
                        </ul>

                        <!-- ... end W-Faved-Page -->
                    </div>
                </div>

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">They give 1% of their income to Edhi Foundation</h6>
                        <div class="more">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            <ul class="more-dropdown">

                                <li>
                                    <a href="donorsList.html">View all</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="ui-block-content">
                        <div class="ui-block-content">

                            <!-- W-Badges -->

                            <ul class="widget w-badges ">
                                <li>
                                    <a href="">
                                        <img src="img/avatar38-sm.jpg" alt="author">
                                        <div class="label-avatara bg-primary">1</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img src="img/avatar39-sm.jpg" alt="author">
                                        <div class="label-avatara bg-primary">1</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img src="img/avatar35-sm.jpg" alt="author">
                                        <div class="label-avatara bg-primary">1</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img src="img/avatar36-sm.jpg" alt="author">
                                        <div class="label-avatara bg-primary">1</div>
                                    </a>
                                </li>

                            </ul>

                            <!--.. end W-Badges -->
                        </div>
                    </div>
                </div>


                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Lastest Photos</h6>
                        <div class="more">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            <ul class="more-dropdown">

                                <li>
                                    <a href="ngoPhotos.php">View all</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Latest-Photo -->
                        <ul class="widget w-last-photo js-zoom-gallery">

                        <?php
                        $sql = "SELECT * FROM ngo_photos WHERE p_id = '".$user_data['id']."' ORDER BY id DESC LIMIT 9";
                             $result = mysqli_query($con, $sql);
                             while($row = mysqli_fetch_array($result)){
                         ?>
                            <li>
                                <a href="img/<?php echo $row['pic_name']; ?>">
                                    <img src="img/<?php echo $row['pic_name']; ?>" alt="photo">
                                </a>
                            </li>

                          <?php } ?>
                            <!-- <li>
                                <a href="img/last-phot11-large.jpg">
                                    <img src="img/last-phot11-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot12-large.jpg">
                                    <img src="img/last-phot12-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot13-large.jpg">
                                    <img src="img/last-phot13-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot14-large.jpg">
                                    <img src="img/last-phot14-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot15-large.jpg">
                                    <img src="img/last-phot15-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot16-large.jpg">
                                    <img src="img/last-phot16-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot17-large.jpg">
                                    <img src="img/last-phot17-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot18-large.jpg">
                                    <img src="img/last-phot18-large.jpg" alt="photo">
                                </a>
                            </li> -->
                        </ul>


                        <!-- .. end W-Latest-Photo -->
                    </div>
                </div>

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Lastest Videos</h6>
                        <div class="more">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            <ul class="more-dropdown">

                                <li>
                                    <a href="ngoVideos.php">View all</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Latest-Video -->

                        <ul class="widget w-last-video">
                            <li>
                                <a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small bg-breez ">
                                    <i class="fa fa-play" style="color:white;"></i>
                                </a>
                                <img src="img/video8.jpg" alt="video">
                                <div class="video-content">
                                    <div class="title">System of a Revenge - Hypnotize...</div>
                                    <time class="published" datetime="2017-03-24T18:18">3:25</time>
                                </div>
                                <div class="overlay"></div>
                            </li>
                            <li>
                                <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                                    <i class="fa fa-play" style="color:white;"></i>
                                </a>
                                <img src="img/video7.jpg" alt="video">
                                <div class="video-content">
                                    <div class="title">Green Goo - Live at Dan’s Arena</div>
                                    <time class="published" datetime="2017-03-24T18:18">5:48</time>
                                </div>
                                <div class="overlay"></div>
                            </li>
                        </ul>

                        <!-- .. end W-Latest-Video -->
                    </div>
                </div>




            </div>
        </div>
    </div>


    <?php require_once 'template/footer.inc.php' ?>


    <!-- ... end Footer -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Stripe api to be integrated</h4>
                </div>
                <div class="modal-body">
                    <img src="img/stripeLogo.png">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-blue" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
			$('#post_photo').change(function() {
	 if ($(this).val()) {
		 error = false;

		 var filename = $(this).val();

		 $(this).closest('.add-options-message').find('.file-name').html(filename);

		 if (error) {
			 parent.addClass('error').prepend.after('<div class="alert alert-error">' + error + '</div>');
		 }
	 }
 });
   //    $("#post-form").submit(function(e){
   //    e.preventDefault();
   //    var description = $('#post_description');
   //  if (description.val() == "") {
   //      swal("Post Field Is Empty", 'Please enter a post to publish', 'error');
   //  } else {
   //  $.ajax({
   //     url: 'xml_http_request/posts.php',
   //     type: 'POST',
   //     data: new FormData(this),
   //     contentType: false,
   //     cache: false,
   //     processData:false,
   //     success: function(data) {
   //       $("#recent_post").fadeOut('fast');
   //       $('#recent_post').prepend(data);
   //       $("#recent_post").fadeIn('slow');
	 //
   //     }
   //   })
   // }
   //   })

     $('#post_img').click(function(){
       $('#post_photo').click();
     })



     })

		 function _(el) {
		return document.getElementById(el);
	}

	function uploadFile() {
		var file = _("post_photo").files[0];
		var post_description = document.getElementById('post_description').value;
		var id = document.getElementById('id').value;
		// alert(file+" | "+post_description+" | "+id);
		var formdata = new FormData();
		formdata.append("id", id);
		formdata.append("post_photo", file);
		formdata.append("post_description", post_description);
    if (post_description == "") {
      swal("Post Field Is Empty", 'Please enter a post to publish', 'error');
    } else {
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandler, false);
		ajax.addEventListener("load", completeHandler, false);
		ajax.addEventListener("error", errorHandler, false);
		ajax.addEventListener("abort", abortHandler, false);
		ajax.open("POST", "xml_http_request/posts.php");
		// http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
		//use file_upload_parser.php from above url
		ajax.send(formdata);
    }
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

	 else if (event.target.responseText == 4) {
		 text = "Something Went Wrong! Please try again later.";
	 }
	 else if (event.target.responseText == 5) {
		 text = "Could Not Move File!";
	 } else {
 		 text = "Video Uploaded!";
     _("recent_post").innerHTML = event.target.responseText;

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



     function delete_post(id) {
       $.ajax({
         url: 'xml_http_request/posts.php',
          type: 'POST',
          data: {post_id : id},
          cache: false,
          success: function(data) {
            $('#post'+id).slideUp();
          }
        })
     }


    </script>




</body>

</html>
