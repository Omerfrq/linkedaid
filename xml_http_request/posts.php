  <?php
require_once '../core/init.php';
if (isset($_POST['id']) && isset($_POST['post_description'])) {
  $id = $_POST['id'];
  if(isset($_FILES['post_photo'])) {

    // Script With Image

  $img = $_FILES['post_photo'];
  $img_name = $_FILES['post_photo']['name'];
  $img_type = $_FILES['post_photo']['type'];
  $img_size = $_FILES['post_photo']['size'];
  $file_tmp = $_FILES['post_photo']['tmp_name'];

  $explode = explode('.',$img_name);
  $file_ext = strtolower(end($explode));
  $extensions= array("jpeg","jpg","png","pdf","mp4","avi","3gp","mov","mpeg");
  $img_extensions = array("jpeg","jpg","png","pdf");
  $video_extensions = array("mp4","avi","3gp","mov","mpeg");
  if (in_array($file_ext, $img_extensions) === true ) {
   $max_file_size = 2097152;
 } if (in_array($file_ext, $video_extensions) === true) {
   $max_file_size = 4836239;
 }
         if(in_array($file_ext,$extensions) === false){
            echo 1;
         } elseif ($img_size > $max_file_size) {
           echo 2;
         } else {
              if(move_uploaded_file($file_tmp,"../img/".$img_name)) {


  $data = array(
    'user_id' => $_POST['id'],
    'post_description' => $_POST['post_description'],
    'pic_name' => $img_name,
    'pic_type' => $img_type,
    'pic_size' => $img_size,
    'post_publish_date' => date('Y-m-d')
   );
   $user = $_SESSION['user'];
   // $user_posts = $_SESSION['user'].'_posts';
   $id = $_SESSION['id'];
   dbRowInsert($con, 'posts', $data);

$sql = "SELECT * FROM $user INNER JOIN posts ON $user.user_id = posts.user_id WHERE $user.user_id = '$id' ORDER BY posts.id DESC LIMIT 1  ";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_array($result)){
   $db_date = $row['post_publish_date'];
   $current_date = date('Y-m-d');
   $file_name = $row['pic_name'];
   $explode = explode('.',$file_name);
   $file_ext = strtolower(end($explode));
   $extensions= array("mp4","avi","3gp","mov","mpeg");
   if (in_array($file_ext,$extensions)	=== false) {
     $string = '  <p>'.$row['post_description'].'</p>
       <p><center><img src="img/'.$row['pic_name'].'" alt="Post Image" style="width: 100%;"></center></p>
       </p>';
   } else {
     $string = ' <p>'.$row['post_description'].'</p>	<video width="100%;" height="240" controls>
<source src="img/'.$row['pic_name'].'" type="video/mp4">
</video>';
   }
   if(check_post_liked($con, 'post_id', $row['id'], $_SESSION['id'], 'post_likes') == true) { $i_color = "#38a9ff";}  else { $i_color = ""; }
   if ($user == 'ngo') {

   echo '    <article class="hentry post" id="post'.$row['id'].'">

    <div class="post__author author vcard inline-items">
        <img src="img/'.$user_data['pic_name'].'" alt="author">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="#">'.$row['ngo_name'].'</a>
            <div class="post__date">
                <time class="published" datetime="2017-03-24T18:18">
                    '.date('d-M-Y', strtotime($row['post_publish_date'])).'
                </time>
            </div>
        </div>

        <div class="more">
            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
            <ul class="more-dropdown">

                <li>
                <a href="javascript:void(0)" id="delete_post" onclick="delete_post('.$row['id'].')">Delete Post</a>
                </li>

            </ul>
        </div>

    </div>

    '.$string.'

    <div class="post-additional-info inline-items">

        <a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likePost'.$row['id'].'"
           onclick="likeUnlike('.$row['id'].')" style="'.$i_color.'">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <span>'.total_likes($con, 'post_id', $row['id'], 'post_likes').'</span>
        </a>

        <div class="comments-shared">
            <a href="JavaScript:void(0)" class="post-add-icon inline-items">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <span>'.total_likes($con, 'post_id', $row['id'], 'post_comments').'</span>
            </a>

            <a href="#" class="post-add-icon inline-items">
                <i class="fa fa-share" aria-hidden="true"></i>
            </a>
        </div>


    </div>



</article>
<ul class="comments-list" id="commentsList'.$row['id'].'">

</ul>

<a href="javascript:void(0)" class="more-comments" onclick="loadMoreData('.$row['id'].')">View more comments
    <span>+</span>
</a>


<div class="comment-form inline-items" id="commentForm'.$row['id'].'">

    <div class="post__author author vcard inline-items">
        <img src="img/avatar5-sm.jpg" alt="author">

        <div class="form-group with-icon-right ">
          <input type="hidden" name="post_id" id="post_id'.$row['id'].'" value="'.$row['id'].'">
            <textarea class="form-control" placeholder="" id="post_comment'.$row['id'].'" name="post_comment"></textarea>

        </div>
    </div>

    <button class="btn btn-md-2 btn-breez" id="post_comment'.$row['id'].'" onclick="submitComment('.$row['id'].')">Post Comment</button>

</div>
';
} else {
echo '    <article class="hentry post" id="post'.$row['id'].'">

 <div class="post__author author vcard inline-items">
 <img src="img/'.$user_data['pic_name'].'" alt="author">

     <div class="author-date">
         <a class="h6 post__author-name fn" href="#">'.$row['f_name'].'</a>
         <div class="post__date">
             <time class="published" datetime="2017-03-24T18:18">
                 4 hours ago
             </time>
         </div>
     </div>

     <div class="more">
         <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
         <ul class="more-dropdown">

             <li>
             <a href="javascript:void(0)" id="delete_post" onclick="delete_post('.$row['id'].')">Delete Post</a>
             </li>

         </ul>
     </div>

 </div>


 '.$string.'

 <div class="post-additional-info inline-items">

 <a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likePost'.$row['id'].'"
    onclick="likeUnlike('.$row['id'].')" style="'.$i_color.'">
     <i class="fa fa-thumbs-up" aria-hidden="true"></i>
     <span>'.total_likes($con, 'post_id', $row['id'], 'post_likes').'</span>
 </a>

 <div class="comments-shared">
     <a href="JavaScript:void(0)" class="post-add-icon inline-items">
         <i class="fa fa-comments" aria-hidden="true"></i>
         <span>'.total_likes($con, 'post_id', $row['id'], 'post_comments').'</span>
     </a>

     <a href="#" class="post-add-icon inline-items">
         <i class="fa fa-share" aria-hidden="true"></i>
     </a>
     </div>


 </div>



</article><ul class="comments-list" id="commentsList'.$row['id'].'">

</ul>

<a href="javascript:void(0)" class="more-comments" onclick="loadMoreData('.$row['id'].')">View more comments
    <span>+</span>
</a>


<div class="comment-form inline-items" id="commentForm'.$row['id'].'">

    <div class="post__author author vcard inline-items">
        <img src="img/avatar5-sm.jpg" alt="author">

        <div class="form-group with-icon-right ">
          <input type="hidden" name="post_id" id="post_id'.$row['id'].'" value="'.$row['id'].'">
            <textarea class="form-control" placeholder="" id="post_comment'.$row['id'].'" name="post_comment"></textarea>

        </div>
    </div>

    <button class="btn btn-md-2 btn-breez" id="post_comment'.$row['id'].'" onclick="submitComment('.$row['id'].')">Post Comment</button>

</div>';
}
 }

}
} else {
 echo 1;
}
}
} else {

  // Script Without Image



    $data = array(
      'user_id' => $_POST['id'],
      'post_description' => $_POST['post_description'],
      'post_publish_date' => date('Y-m-d')
     );
     $user = $_SESSION['user'];
     // $user_posts = $_SESSION['user'].'_posts';
     $id = $_SESSION['id'];
     dbRowInsert($con, 'posts', $data);

  $sql = "SELECT * FROM $user INNER JOIN posts ON $user.user_id = posts.user_id WHERE posts.user_id = '$id' ORDER BY posts.id DESC LIMIT 1";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)){
     $db_date = $row['post_publish_date'];
     $current_date = date('Y-m-d');
     if ($user == 'ngo') {

     echo '    <article class="hentry post" id="post'.$row['id'].'">

      <div class="post__author author vcard inline-items">
          <img src="img/'.$user_data['pic_name'].'" alt="author">

          <div class="author-date">
              <a class="h6 post__author-name fn" href="#">'.$row['ngo_name'].'</a>
              <div class="post__date">
                  <time class="published" datetime="2017-03-24T18:18">
                      '.date('d-M-Y', strtotime($row['post_publish_date'])).'
                  </time>
              </div>
          </div>

          <div class="more">
              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              <ul class="more-dropdown">

                  <li>
                  <a href="javascript:void(0)" id="delete_post" onclick="delete_post('.$row['id'].')">Delete Post</a>
                  </li>

              </ul>
          </div>

      </div>

      <p>'.$row['post_description'].'


      <div class="post-additional-info inline-items">

      <a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likePost'.$row['id'].'"
         onclick="likeUnlike('.$row['id'].')" style="'.$i_color.'">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          <span>'.total_likes($con, 'post_id', $row['id'], 'post_likes').'</span>
      </a>

      <div class="comments-shared">
          <a href="JavaScript:void(0)" class="post-add-icon inline-items">
              <i class="fa fa-comments" aria-hidden="true"></i>
              <span>'.total_likes($con, 'post_id', $row['id'], 'post_comments').'</span>
          </a>

          <a href="#" class="post-add-icon inline-items">
              <i class="fa fa-share" aria-hidden="true"></i>
          </a>
          </div>


      </div>



  </article><ul class="comments-list" id="commentsList'.$row['id'].'">

  </ul>

  <a href="javascript:void(0)" class="more-comments" onclick="loadMoreData('.$row['id'].')">View more comments
      <span>+</span>
  </a>


  <div class="comment-form inline-items" id="commentForm'.$row['id'].'">

      <div class="post__author author vcard inline-items">
          <img src="img/avatar5-sm.jpg" alt="author">

          <div class="form-group with-icon-right ">
            <input type="hidden" name="post_id" id="post_id'.$row['id'].'" value="'.$row['id'].'">
              <textarea class="form-control" placeholder="" id="post_comment'.$row['id'].'" name="post_comment"></textarea>

          </div>
      </div>

      <button class="btn btn-md-2 btn-breez" id="post_comment'.$row['id'].'" onclick="submitComment('.$row['id'].')">Post Comment</button>

  </div>';
  } else {
  echo '    <article class="hentry post" id="post'.$row['id'].'">

   <div class="post__author author vcard inline-items">
       <img src="img/'.$user_data['pic_name'].'" alt="author">

       <div class="author-date">
           <a class="h6 post__author-name fn" href="#">'.$row['f_name'].'</a>
           <div class="post__date">
               <time class="published" datetime="2017-03-24T18:18">
                   4 hours ago
               </time>
           </div>
       </div>

       <div class="more">
           <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
           <ul class="more-dropdown">

               <li>
               <a href="javascript:void(0)" id="delete_post" onclick="delete_post('.$row['id'].')">Delete Post</a>
               </li>

           </ul>
       </div>

   </div>

   <p>'.$row['post_description'].'
   </p>

   <div class="post-additional-info inline-items">

   <a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likePost'.$row['id'].'"
      onclick="likeUnlike('.$row['id'].')">
       <i class="fa fa-thumbs-up" aria-hidden="true"></i>
       <span>'.total_likes($con, 'post_id', $row['id'], 'post_likes').'</span>
   </a>

   <div class="comments-shared">
       <a href="JavaScript:void(0)" class="post-add-icon inline-items">
           <i class="fa fa-comments" aria-hidden="true"></i>
           <span>'.total_likes($con, 'post_id', $row['id'], 'post_comments').'</span>
       </a>

       <a href="#" class="post-add-icon inline-items">
           <i class="fa fa-share" aria-hidden="true"></i>
       </a>
       </div>


   </div>



  </article><ul class="comments-list" id="commentsList'.$row['id'].'">

  </ul>

  <a href="javascript:void(0)" class="more-comments" onclick="loadMoreData('.$row['id'].')">View more comments
      <span>+</span>
  </a>


  <div class="comment-form inline-items" id="commentForm'.$row['id'].'">

      <div class="post__author author vcard inline-items">
          <img src="img/avatar5-sm.jpg" alt="author">

          <div class="form-group with-icon-right ">
            <input type="hidden" name="post_id" id="post_id'.$row['id'].'" value="'.$row['id'].'">
              <textarea class="form-control" placeholder="" id="post_comment'.$row['id'].'" name="post_comment"></textarea>

          </div>
      </div>

      <button class="btn btn-md-2 btn-breez" id="post_comment'.$row['id'].'" onclick="submitComment('.$row['id'].')">Post Comment</button>

  </div>
  ';
  }
   }

  }
}




}

if (isset($_POST['post_id'])) {
  $id = $_POST['post_id'];
  dbRowDelete($con, 'posts', 'id', $id);
}
 ?>
