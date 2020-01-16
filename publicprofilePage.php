<?php
require_once('core/init.php');
if ($_SESSION['user_type'] != 2) {
	echo "<script>window.location.href='login.php';</script>";
}

if(check_user_data($con, $_SESSION['user_type'], $_SESSION['id']) == 1) {
	echo "<script>window.location.href='dashboardPersonalinfo.php?complete_profile';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Profile Page - About</title>

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
						<div class="top-header ">
								<div class="top-header-thumb">
									<img src="img/top-header-blue.jpg" alt="">
									<div class="content-bg-wrap stunning-header-bg3" style="width:100%;"></div>
									<div class="top-header-author">
										<div class="author-thumb">
											<img src="img/<?php if($user_data['pic_name'] == null) { echo "ngo-default.png"; } else { echo $user_data['pic_name']; }?>" alt="author">
										</div>
										<div class="author-content">
											<a href="#" class="h3 author-name" style="color:#ffffff"><?php echo $user_data['f_name'] . ' ' . $user_data['l_name']; ?> </a>
											<span style="color:gold;" class="h3 author-name" data-toggle="tooltip" data-placement="right" title="This person donates 1% of his/her income to humanitarian projects">1%</span>
										</div>
										<div class="country" style="color:#ffffff"><?php echo $user_data['donor_city']; ?></div>
									</div>
								</div>
							</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Top Header-Profile -->

	<div class="container">
		<div class="row">
			<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-12">

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">NGOs that I support</h6>
						<div class="more">
							<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
							<ul class="more-dropdown">

								<li>
									<a href="">Share with Friends</a>
								</li>

							</ul>
						</div>

					</div>

					<!-- W-Friend-Pages-Added -->

					<ul class="widget w-friend-pages-added notification-list friend-requests">
						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar41-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Green Squad</a>
								<span class="chat-message-item">trees plantation
									<br> Supporting Since :April 2016</span>

							</div>

							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share Again">
								<i class="fa fa-share" style="color:gold"></i>
							</span>

						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar42-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">NTS Tests</a>
								<span class="chat-message-item">Education for all
									<br> Supporting Since :March 2017</span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share with Friends">
								<i class="fa fa-share" style="color:#3498db"></i>
							</span>

						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar43-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
								<span class="chat-message-item">Company
									<br> Supporting Since :March 2017</span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share with Friends">
								<i class="fa fa-share" style="color:#3498db"></i>
							</span>
						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar44-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Thompson’s Custom Clothing Boutique</a>
								<span class="chat-message-item">Clothing for poor
									<br> Supporting Since :March 2017</span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share with Friends">
								<i class="fa fa-share" style="color:#3498db"></i>
							</span>

						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar45-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Crimson Agency</a>
								<span class="chat-message-item">Company
									<br> Supporting Since :March 2017</span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share with Friends">
								<i class="fa fa-share" style="color:#3498db"></i>
							</span>
						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar46-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Mannequin Angel</a>
								<span class="chat-message-item">Clothing for poor
									<br> Supporting Since :March 2017</span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Share with Friends">
								<i class="fa fa-share" style="color:#3498db"></i>
							</span>
						</li>
					</ul>

					<!-- .. end W-Friend-Pages-Added -->
				</div>


				<div class="ui-block">

					<!-- News Feed Form  -->

					<div class="news-feed-form">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

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


											<button type="button" class="btn btn-breez btn-md-2" id="postStatus" onclick="uploadFile()">Post Status</button>
											<p class="file-name"></p>
											<progress id="progressBar" value="0" max="100" style="display:none;"></progress>
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

						$sql = "SELECT * FROM posts WHERE user_id = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 4";
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
									<a class="h6 post__author-name fn" href="#"><?php echo $user_data['f_name'] . $user_data['l_name']; ?></a>
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
							<?php if ($row['pic_name'] != "") { ?>
							<?php if(in_array($file_ext,$extensions)	=== false){ ?>
							<p><center><img src="img/<?php echo $row['pic_name']; ?>" style="width: 100%;"></center></p>
						<?php } else { ?>
							<video width="100%;" height="240" controls>
	<source src="img/<?php echo $row['pic_name']; ?>" type="video/mp4">
	</video>
<?php } } ?>


							<div class="post-additional-info inline-items">

								<a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likePost<?php echo $row['id']; ?>"
									 onclick="likeUnlike(<?php echo $row['id'] ?>)"
										style="<?php if(check_post_liked($con, 'post_id', $row['id'], $_SESSION['id'], 'post_likes') == true) {echo "color:#38a9ff";} ?>">
									<i class="fa fa-thumbs-up" aria-hidden="true"></i>
									<span><?php if(total_likes($con, 'post_id', $row['id'], 'post_likes') > 0) {echo total_likes($con, 'post_id', $row['id'], 'post_likes');} else {echo "";} ?></span>
								</a>

								<div class="comments-shared">
									<a href="javascript:void(0)" class="post-add-icon inline-items">
										<i class="fa fa-comments" aria-hidden="true"></i>
										<span><?php echo total_likes($con, 'post_id', $row['id'], 'post_comments'); ?></span>
									</a>

									<a href="#" class="post-add-icon inline-items" id="postShare<?php echo $row['id']; ?>" onclick="post_share(<?php echo $row['id']; ?>)">
										<i class="fa fa-share" aria-hidden="true"></i>
										<!-- <span><?php echo total_likes($con, 'post_id', $row['id'], 'post_shares'); ?></span> -->
									</a>
								</div>


							</div>



						</article>
						<!-- ... end Post -->


						<!-- Comments -->

						<ul class="comments-list" id="commentsList<?php echo $row['id']; ?>">
							<?php
								$sql = mysqli_query($con, "SELECT * FROM post_comments WHERE post_id = '".$row['id']."' ORDER BY id DESC LIMIT 1");
								if (mysqli_num_rows($sql) > 0) {
									while ($c_row = mysqli_fetch_array($sql)) {
									?>

								<li class="comment-item" id="comment<?php echo $c_row['id']; ?>">
										<div class="post__author author vcard inline-items">
												<img src="img/<?php echo get_image_by_id($con, $c_row['user_id'], $_SESSION['user']); ?>" alt="author">

												<div class="author-date">
														<a class="h6 post__author-name fn" href="#"><?php echo get_name_by_id($con, $c_row['user_id']); ?></a>
														<div class="post__date">
																<time class="published" datetime="2017-03-24T18:18">
																		<?php echo $c_row['publish_date']; ?>
																</time>
														</div>
												</div>
												<?php if ($_SESSION['id'] == $c_row['user_id']): ?>

												<div class="more">
													<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
													<ul class="more-dropdown">

														<li>
															<a href="javascript:void(0)" id="delete_comment" onclick="delete_comment(<?php echo $c_row['id']; ?>, <?php echo $row['id']; ?>)">Delete Comment</a>
														</li>

													</ul>
												</div>

												<?php endif; ?>
										</div>

										<p><?php echo $c_row['comment']; ?></p>

										<a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likeComment<?php echo $c_row['id']; ?>"
											 onclick="likeUnlikeComment(<?php echo $c_row['id']; ?>, <?php echo $row['id']; ?>)"
											 style="<?php if (check_comment_liked($con, $c_row['id'], $_SESSION['id'], 'comment_likes') == true) { echo "color:#38a9ff"; }
											 else {  echo ""; } ?>">
												<i class="fa fa-thumbs-up" aria-hidden="true"></i>
												<span><?php echo total_likes($con, 'comment_id', $c_row['id'], 'comment_likes') ?></span>
										</a>
										<!-- <a href="JavaScript:void(0)" class="reply" id="commentReply">Reply</a><br> -->
										<form class="" action="" method="post" id="commentReplyForm" style="display:none;">
											<input type="text" name="comment_reply" value="">
											<button type="submit" name="submit_reply" class="btn btn-md-2 btn-breez pull-right" value="">Post Reply</button>
										</form>
								</li>
								<?php 	} } else {
													echo "";
												}
								 ?>
								<!-- <li class="">
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

										<p>This is a comment reply!
										</p>

										<a href="#" class="post-add-icon inline-items">
												<i class="fa fa-thumbs-up" aria-hidden="true"></i>
												<span>8</span>
										</a>
										<a href="#" class="reply">Reply</a>
								</li> -->
						</ul>


						<!-- ... end Comments -->

						<a href="javascript:void(0)" class="more-comments" onclick="loadMoreData(<?php echo $row['id']; ?>)">View more comments
								<span>+</span>
						</a>


						<!-- Comment Form  -->

						<div class="comment-form inline-items" id="commentForm<?php echo $row['id']; ?>">

								<div class="post__author author vcard inline-items">
										<img src="img/avatar5-sm.jpg" alt="author">

										<div class="form-group with-icon-right ">
											<input type="hidden" name="post_id" id="post_id<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
												<textarea class="form-control" placeholder="" id="post_comment<?php echo $row['id']; ?>" name="post_comment"></textarea>
												<!-- <div class="add-options-message">
														<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
																<svg class="olymp-camera-icon">
																		<use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
																</svg>
														</a>
												</div> -->
										</div>
								</div>

								<button class="btn btn-md-2 btn-breez" id="post_comment<?php echo $row['id']; ?>" onclick="submitComment(<?php echo $row['id']; ?>)">Post Comment</button>

								<!-- <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button> -->

						</div>

						<!-- ... end Comment Form  -->
					<?php } } ?>
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
						<h6 class="title">Personal Info</h6>
						<a href="dashboardPersonalinfo.php" class="more">
							<button type="button" class="btn btn-blue" data-toggle="tooltip" data-placement="left" title="View Dashboard">
								Dashboard
							</button>
						</a>
					</div>
					<div class="ui-block-content">


						<!-- W-Personal-Info -->

						<ul class="widget w-personal-info item-block">
							<li>
								<span class="title">About Me:</span>
								<span class="text"><?php echo $user_data['description']; ?>
								</span>
							</li>
							<li>
								<span class="title">Birthday:</span>
								<span class="text"><?php echo $user_data['donor_dob']; ?></span>
							</li>
							<li>
								<span class="title">Birthplace:</span>
								<span class="text">Austin, Texas, USA</span>
							</li>
							<li>
								<span class="title">Lives in:</span>
								<span class="text"><?php echo $user_data['donor_city']; ?></span>
							</li>
							<li>
								<span class="title">Occupation:</span>
								<span class="text"><?php echo $user_data['donor_occupation']; ?></span>
							</li>
							<li>
								<span class="title">Joined:</span>
								<span class="text"><?php echo $user_data['donor_dob']; ?></span>
							</li>
							<li>
								<span class="title">Gender:</span>
								<span class="text"><?php echo $user_data['donor_gender']; ?></span>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text"><?php echo $user_data['donor_marital_status']; ?></span>
							</li>
							<li>
								<span class="title">My competencies that I could share for humanitarian purposes </span>
								<span class="text"><?php echo $user_data['donor_competencies']; ?></span>
							</li>

						</ul>

						<!-- ... end W-Personal-Info -->
						<!-- W-Socials -->

						<div class="widget w-socials">
							<h6 class="title">Other Social Networks:</h6>
							<a href="#" class="social-item bg-facebook">
								<i class="fab fa-facebook-f" aria-hidden="true"></i>
								Facebook
							</a>
							<a href="#" class="social-item bg-twitter">
								<i class="fab fa-twitter" aria-hidden="true"></i>
								Twitter
							</a>
						</div>


						<!-- ... end W-Socials -->
					</div>
				</div>
			</div>

			<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

				<div class="ui-block">

					<!-- W-Action -->

					<div class="widget w-action tp2">

						<img src="img/logo-icon.png" alt="LinkedAID" width="50%">
						<div class="content">
							<h4 class="title">LinkedAID</h4>
							<span style="text-transform:none;">Reduce Poverty, Donate to small NGOs </br>that make a difference</span>
							<a href="ngoList.html" class="btn btn-primary btn-md">DONATE NOW!</a>
						</div>
					</div>

					<!-- ... end W-Action -->
				</div>

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Supporters of common Pages</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>



					<!-- W-Action -->

					<ul class="widget w-friend-pages-added notification-list friend-requests">
						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar38-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Francine Smith</a>
								<span class="chat-message-item">Supports NTS Tests and Edhi</span>
							</div>
						</li>

						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/avatar39-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend">Hugh Wilson</a>
								<span class="chat-message-item">Supports Edhi and Green Squad</span>
							</div>
						</li>



					</ul>

					<!-- ... end W-Action -->
				</div>


				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">NGOs that you could support</h6>
						<div class="more">
							<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
							<ul class="more-dropdown">

								<li>
									<a href="ngoList.html">View all</a>
								</li>

							</ul>
						</div>

					</div>

					<!-- W-Friend-Pages-Added -->

					<ul class="widget w-friend-pages-added notification-list friend-requests">
						<?php
							$sql = mysqli_query($con, "SELECT id, ngo_name, sectors_of_action, ngo_active_since, pic_name FROM ngo ORDER BY id DESC LIMIT 6");
							while ($row = mysqli_fetch_array($sql)) {
								 $sectors = explode(",", $row['sectors_of_action']);
								 $sector = $sectors[0];
								?>
						<li class="inline-items">
							<div class="author-thumb">
								<img src="img/<?php echo $row['pic_name']; ?>" alt="author" width="40" height="90">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend"><?php echo $row['ngo_name']; ?></a>
								<span class="chat-message-item"><?php echo get_sector_by_id($con, $sector); ?></span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="View Profile">
								<i class="fa fa-arrow-right"></i>
							</span>

						</li>

					<?php } ?>

					</ul>

					<!-- .. end W-Friend-Pages-Added -->
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->


	<!-- ... end Footer -->


	<?php require('template/footer.inc.php'); ?>

	<!-- JS Scripts -->

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

 $('#post_img').click(function(){
	 $('#post_photo').click();
 })
 })

 function submitComment(id) {
 var post_comment = $('#post_comment'+id).val();
 var post_id = $('#post_id'+id).val()
 // var formData = new FormData(this);
 var comment_type = "post_comments";
 // formData.append("comment_type", comment_type);
 if (post_comment == "") {
	 $('#post_comment'+id).css('border', 'solid 2px #F00');
 } else {
$.ajax({
	url: 'xml_http_request/user_comments.php',
	type: 'POST',
	data: {post_comment:post_comment, comment_type:comment_type, post_id:post_id},
	cache: false,
	success: function(data) {

			$('#commentsList'+id).append(data);


	}
 })



}
}


 function _(el) {
return document.getElementById(el);
}

var postStatus = document.getElementById('postStatus');

function uploadFile() {
postStatus.disabled = true;
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
	postStatus.disabled = false;

} else {
_("progressBar").style.display="block";
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
 text = "Post Published!";
 _("recent_post").innerHTML = event.target.responseText;
 document.getElementById('post_description').value="";

}
_("status").innerHTML = text;
_("progressBar").value = 0; //wil clear progress bar after successful upload
postStatus.disabled = false;


}

function errorHandler(event) {
_("status").innerHTML = "Upload Failed";
postStatus.disabled = false;

}

function abortHandler(event) {
_("status").innerHTML = "Upload Aborted";
postStatus.disabled = false;

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

 function delete_comment(id, post_id) {
	 $.ajax({
		 url: 'xml_http_request/user_comments.php',
			type: 'POST',
			data: {comment_id : id},
			cache: false,
			success: function(data) {
				$('#commentsList'+post_id+' #comment'+id).slideUp();
			}
		})
 }

 var user_id = <?php echo $_SESSION['id'] ?>;


 function likeUnlike(id) {
	 var post_id = "";
	 var userId = "";
	 var likeForTable = "post_likes";

	$.ajax({
	 url: 'xml_http_request/like_unlike.php',
	 type: 'POST',
	 data: {post_id:id, userId:user_id, tbl_name:likeForTable},
	 cache: false,
	 success: function(data) {
			if (data == 'l1') {
				$('#likePost'+id).animate({
					color: "#38a9ff"
				});
			} else if (data == 'd1') {
				$('#likePost'+id).animate({
					color: "#c2c5d9"
				});
			}
			 }
			 })
 }

 function likeUnlikeComment(c_id, p_id) {
	 var elementId = "";
	 var userId = "";
	 var post_id = "";
 $.ajax({
	url: 'xml_http_request/like_unlike.php',
	type: 'POST',
	data: {elementId:c_id, userId:user_id, post_id:p_id, tbl_name:"comment_likes"},
	cache: false,
	success: function(data) {
		 if (data == 'l1') {
			 $('#likeComment'+c_id).animate({
				 color: "#38a9ff"
			 });
		 } else if (data == 'd1') {
			 $('#likeComment'+c_id).animate({
				 color: "#c2c5d9"
			 });
		 }
			}
			})
}

function loadMoreData(post_id) {

		 var last_id = $("#commentsList"+post_id+" .comment-item:last").attr("id");
	var	myArray = last_id.split(/([0-9]+)/)
	var id = myArray[1];

	$.ajax({
		url: 'xml_http_request/user_comments.php?last_id=' + id+'&post_id='+post_id,
						 type: "get",
						 // beforeSend: function()
						 // {
						 //     $('.ajax-load').show();
						 // }

		})
		.done(function(data) {
			if (data == 1) {
				$("#nomoreimages").fadeIn(2000);
			} else {
				$("#commentsList"+post_id).append(data);
			}

		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
				alert('server not responding...');
		})
}

$('#commentReply').click(function(){
	$('#commentReplyForm').show();
})

function post_share(id) {
	var user_id = <?php echo $_SESSION['id']; ?>;
	$.ajax({
	 url: 'xml_http_request/share_post.php',
	 type: 'POST',
	 data: {post_id:id, userId:user_id},
	 cache: false,
	 success: function(data) {
		 if (data == 1) {
			 swal('Good Job!', 'Post successfully posted to your profile!', 'success');
		 } else {
			 swal('Something Went Wrong!', 'Please try again!', 'error');
		 }
	 }
	 })
}
</script>
</body>

</html>
