<?php
require_once('core/init.php');
if (!isset($_SESSION['user_type'])) {
	echo "<script>window.location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Newsfeed</title>
	<?php require_once ('template/head.inc.php'); ?>
</head>

<body>

	<?php require('template/navbar.inc.php'); ?>
	<div class="container" style="margin-top:40px;">
		<div class="row">

			<!-- Main Content -->

			<!-- Right Sidebar -->

			<?php require('template/rightbar.inc.php'); ?>

			<!-- ... end Right Sidebar -->

			<aside class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">



				<div class="page-description">
					<div class="icon">
						<i class="fa fa-star" style="color: #fff"></i>
					</div>
					<span>Here you’ll see the recent newsfeed updates </span>
				</div>

				<div id="newsfeed-items-grid">



					<div class="ui-block">





						<?php

						$sql = "SELECT * FROM posts ORDER BY id DESC";
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
									<img src="img/<?php echo get_user_img($con, $row['id']); ?>" alt="author">
									<!-- <div class="label-avatar bg-primary">1</div> -->
								</div>

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#"><?php echo get_name_by_id($con, $row['user_id']); ?></a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											<?php echo date('d-M-Y', strtotime($row['post_publish_date'])); ?>
										</time>
									</div>
								</div>
								<?php if ($_SESSION['id'] == $row['user_id']): ?>
								<div class="more">
									<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
									<ul class="more-dropdown">

										<li>
											<a href="javascript:void(0)" id="delete_post" onclick="delete_post(<?php echo $row['id']; ?>)">Delete Post</a>
										</li>

									</ul>
								</div>
							<?php endif; ?>


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
						<a href="javascript:void(0)" class="more-comments" onclick="loadMoreData(<?php echo $row['id']; ?>)">View more comments
								<span>+</span>
						</a>

						<!-- Comment Form  -->

						<div class="comment-form inline-items" id="commentForm<?php echo $row['id']; ?>">

								<div class="post__author author vcard inline-items">
										<img src="img/<?php echo $user_data['pic_name']; ?>" alt="author">

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

								<button class="btn btn-md-2 btn-blue" id="post_comment<?php echo $row['id']; ?>" onclick="submitComment(<?php echo $row['id']; ?>)">Post Comment</button>

								<!-- <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button> -->

						</div>

						<!-- ... end Comments -->
					<?php }} ?>
					</div>

					<div class="ui-block">


					</div>



				</div>

				<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html"
				 data-container="newsfeed-items-grid">
					<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
				</a>

			</aside>

			<!-- ... end Main Content -->


			<!-- Left Sidebar -->

			<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">NGOs on LinkedAID</h6>
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
							<div class="post__author">
								<img class="arsi" src="img/<?php echo $row['pic_name'] ?>" alt="author" >
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

					<!-- .. end W-Friend-Pages-Added -->
				</div>

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">About LINKEDAID</h6>
						<div class="more">
							<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
							<ul class="more-dropdown">

								<li>
									<a href="aboutus.html">Find out more</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="ui-block-content">
						<a href="aboutus.html" class="logo">
							<div class="img-wrap">
								<img src="img/logo-final-small.png" alt="Olympus">
							</div>
						</a>
						<ul class="widget w-personal-info item-block">
							<li>
								<span class="title">Who are we:</span>
								<span class="text">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore
									et
									lorem.
								</span>
							</li>
							<li>
								<span class="title">What we do:</span>
								<span class="text">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore
									et
									lorem.
								</span>
							</li>
							<li>
								<span class="title">Why us:</span>
								<span class="text">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore
									et
									lorem. </span>
							</li>
							<li>
								<span class="title">Follow us:</span>
							</li>

						</ul>
						<ul class="socials">

							<li>
								<a href="#">
									<i class="fab fa-facebook-square" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-youtube" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-google-plus-g" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</aside>

			<!-- ... end Left Sidebar -->




		</div>
	</div>

	<?php require_once ('template/footer.inc.php'); ?>
	<script type="text/javascript">
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
