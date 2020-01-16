<?php
require_once '../core/init.php';
if (isset($_FILES['ngo_pic']) && isset($_POST['id']) && isset($_POST['pic_title'])) {

  $img = $_FILES['ngo_pic'];
  $img_name = $_FILES['ngo_pic']['name'];
  $img_type = $_FILES['ngo_pic']['type'];
  $img_size = $_FILES['ngo_pic']['size'];
  $file_tmp = $_FILES['ngo_pic']['tmp_name'];
  $explode = explode('.',$img_name);
  $file_ext = strtolower(end($explode));
  $extensions= array("jpeg","jpg","png");

  if(in_array($file_ext,$extensions)=== false){
         echo 3;
      } elseif ($img_size > 2097152) {
        echo 2;
      } else {
        if(move_uploaded_file($file_tmp,"../img/".$img_name)) {
        $data = array(
          'user_id' => $_POST['id'],
          'pic_title' => $_POST['pic_title'],
          'pic_name' => $img_name,
          'pic_type' => $img_type,
          'date_added' => date('Y-m-d'),
          'pic_size' => $img_size
         );

        if(dbRowInsert($con, 'ngo_photos', $data)) {
          $sql = "SELECT * FROM ngo_photos
               WHERE user_id = '".$_SESSION['id']."'ORDER BY id DESC LIMIT 1";
               $result = mysqli_query($con, $sql);
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
                   </div>'; ?>

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
                                                                                                  <div class="more">
                                                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                                                        <ul class="more-dropdown">

                                                                                          <li>
                                                                                            <a href="javascript:void(0)" id="delete_post" onclick="delete_photo(<?php echo $row['id']; ?>)">Delete Photo</a>
                                                                                          </li>

                                                                                        </ul>
                                                                                      </div>
                                                                                                                           <div class="content">
                                               <a href="#" class="h6 title">Photoshoot 2016</a>
                                               <time class="published" datetime="2017-03-24T18:18">2 weeks ago</time>
                                           </div>
                                       </div>
                                   </div>


                               </div>

                               <!--Prev Next Arrows-->


                               <i class="fas fa-chevron-right btn-next-without olymp-popup-right-arrow"></i>
                               <i class="fas fa-chevron-left btn-prev-without olymp-popup-right-arrow"></i>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
       </div>

       <?php


               }
      } else {
        echo 0;
      }
      }
}
}

if (isset($_GET['last_id'])) {

  $sql = "SELECT * FROM ngo_photos
       WHERE user_id = '".$_SESSION['id']."' AND id < '".$_GET['last_id']."' ORDER BY id DESC LIMIT 4";


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
          

     }

   } else {
     echo 1;
   }
 // $json = include('data.php');


}



  if (isset($_POST['post_id']))
  {
    if (mysqli_query($con, "DELETE FROM ngo_photos WHERE id = '".$_POST['post_id']."'")) {
      echo 1;
    }
  }



 ?>
