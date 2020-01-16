<?php
require_once('core/init.php');
if ($_SESSION['user_type'] != 1) {
	echo "<script>window.location.href='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>NGO- Photos</title>

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
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header top-header-favorit">
                        <div class="top-header-thumb">
                            <img src="img/top-header5.png" alt="nature">
                            <div class="top-header-author">
                                <div class="author-thumb">
																	<img src="img/<?php if($user_data['pic_name'] == null) { echo "ngo-default.png"; } else { echo $user_data['pic_name']; }?>" alt="author">
                                </div>
                                <div class="author-content">
                                    <a href="ngoProfilepublic.html" class="h3 author-name"><?php echo $user_data['ngo_name']; ?></a>
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
                        <div class="h6 title ">NGO's Photos</div>
                        <div class="align-right">
                          <button type="button" id="btn-img-modal" data-toggle="modal" data-target="#img-modal" class="btn btn-md-2 btn-border-think custom-color c-grey">Add New Photo</button>


                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="photo-album-wrapper" id="photos">
                    <?php
										$id = $_SESSION['id'];
                    $sql = "SELECT * FROM ngo_photos WHERE user_id = '$id' ORDER BY id DESC LIMIT 8";
                         $result = mysqli_query($con, $sql);
												 if (mysqli_num_rows($result) > 0) {


                         while($row = mysqli_fetch_array($result)){
                   echo '  <div class="photo-item col-4-width post-id" id="photo-item'.$row['id'].'">
                         <img src="img/'.$row['pic_name'].'" alt="photo">
                         <div class="overlay overlay-dark"></div>


                            <i class="fa fa-trash post-add-icon" style="z-index:999 !important;" onclick="delete_photo('.$row['id'].')"></i>

                         <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1'.$row['id'].'" class="full-block"></a>
                         <div class="content">
                             <a href="#" class="h6 title">'.$row['pic_title'].'</a>
                             <time class="published" datetime="2017-03-24T18:18">'.$row['date_added'].'</time>
                         </div>
                     </div>';

										 ?>
										 <!-- ... image popup ... --->

										 <div class="modal fade" id="open-photo-popup-v1<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v1"
										 aria-hidden="true">
										 <div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">
												 <div class="modal-content">
														 <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
																 <i class="fa fa-times" aria-hidden="true"></i>
														 </a>

														 <div class="modal-body">
																 <div class="open-photo-thumb">
																		 <div class="swiper-container" data-slide="fade">
																				 <div class="swiper-wrapper">

																						 <div class="swiper-slide">
																								 <div class="photo-item">
																										 <img src="img/<?php echo $row['pic_name']; ?>" alt="photo">
																										 <div class="overlay"></div>
																										 <a href="#" class="post-add-icon"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>

																										 <div class="content">
																												 <a href="#" class="h6 title">Photoshoot 2016</a>
																												 <time class="published" datetime="2017-03-24T18:18">2 weeks ago</time>
																										 </div>
																								 </div>
																						 </div>


																				 </div>

																				 <!--Prev Next Arrows-->


																				 <!-- <i class="fas fa-chevron-right btn-next-without olymp-popup-right-arrow"></i>
																				 <i class="fas fa-chevron-left btn-prev-without olymp-popup-right-arrow"></i> -->
																		 </div>
																 </div>

														 </div>
												 </div>
										 </div>
								 </div>

								 <!-- image popup ends here --><?php

                         }

											 } else {
											 	echo "<h3>You have not uploaded any photos!</h3>";
											 }
                     ?>


                </div>
								<?php if (total_rows($con, "ngo_photos") > 4) { ?>
                <center>
                <div class="col-md-4">

                <a href="javascript:void(0)" class="btn btn-default btn-more" onclick="loadMoreData()">
                  More Images
                </a>

                </div>
                </center>
							<?php } ?>
            </div>
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="nomoreimages" style="display:none; text-align: center;">
              <h3>No More Images</h3>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->


<div class="modal fade" id="img-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Photos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="" id="modal_form_id" action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">

              <!-- <input type="text" id="my_file" name="ngo_pic" class="btn btn-md-2 btn-border-think custom-color c-grey"> -->
              <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
							<div class="form-group">
								<label for="" style="font-size: 18px;">Title</label>
							<input type="text" name="pic_title" id="pic_title" value="" style="height: 45px;">
							</div>
              <input type="file" id="my_file" name="ngo_pic" class="btn btn-md-2 btn-border-think custom-color c-grey">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="img-form-submit" name="" class="btn btn-primary">Save changes</button>
      </div>
    </form>

    </div>
  </div>
</div>

    <?php require('template/footer.inc.php'); ?>


    <!-- ... end Footer -->





    <!-- JS Scripts -->
    <!-- <script src="js/jquery-3.2.1.js"></script> -->



    <script type="text/javascript">

    $(document).ready(function() {
    $('#modal_form_id').submit(function(e) {
      e.preventDefault();
			var title = $('#pic_title');
      var file = $('#my_file');
			var pic_title = title.val();
      if (title.val() == "") {
        title.css('border', 'solid 2px #F00');
      } else if (file.val() == "") {
				file.css('border', 'solid 2px #F00');
      } else {
				$('#img-form-submit').html("Uploading! Please Wait..");
      var postData = new FormData($("#modal_form_id")[0]);
			postData.append('pic_title', pic_title)
        $.ajax({
            url: 'xml_http_request/add_ngo_photos.php',
            type:'POST',
            data:postData,
            async: false,
            success:function(data){
              if (data == 3) {
                swal('Format Not Supported!', 'Only JPG, JPEG and PNG images are allowed', 'error');

              } else if (data == 2) {
                swal('Too Large File!', 'File size must be less than 2 MB', 'error');

              } else if(data != null) {
                $('#photos').prepend(data);
              } else if(data == 0) {
                swal('Could Not Upload File!', 'Please try again', 'error');

              } else {
                swal('Something Went Wrong!', 'Please try again', 'error');

              }
            },

            cache:false,
            contentType: false,
            processData: false,
        });
					$("#img-form-submit").html("Save Changes");
          $("#img-modal").modal('hide');
        }
    });
    //
    // $("#ImageBrowse").on("change", function() {
    //     $("#imageUploadForm").submit();
    // });


});



    </script>

    <script type="text/javascript">
    $(document).ready(function() {

      $(window).scroll(function() {
        if( $(window).scrollTop() == $(document).height() - $(window).height()) {
               // ajax call get data from server and append to the div
               //    var last_id = $(".post-id:last").attr("id");
               //
               // loadMoreData(last_id);
        }
    })


      })

      function loadMoreData() {
           var string = $(".post-id:last").attr("id");
					 var last_id = string.match(/\d+/g).map(Number);
					 alert(last_id);

        $.ajax({
          url: 'xml_http_request/add_ngo_photos.php?last_id=' + last_id,
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
              $("#photos").append(data);

            }

          })
          .fail(function(jqXHR, ajaxOptions, thrownError){
              alert('server not responding...');
          })
      }

      function delete_photo(id) {
     	 $.ajax({
     			url: 'xml_http_request/add_ngo_photos.php',
     			type: 'POST',
     			data: {post_id : id},
     			cache: false,
     			success: function(data) {
	     				$('#photo-item'+id).hide();
     			}
     		})
      }
    </script>
</body>

</html>
