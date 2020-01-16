<?php
require_once '../core/init.php';
if (isset($_POST['post_comment']) && isset($_POST['post_id']) && isset($_POST['comment_type'])) {
  $comment = $_POST['post_comment'];
  $post_id = $_POST['post_id'];
  $comment_type = $_POST['comment_type'];
  $user_id = $_SESSION['id'];
  $publish_date = date('Y-m-d');

  if (mysqli_query($con, "INSERT INTO $comment_type(post_id, user_id, comment, publish_date)
   VALUES('$post_id', '$user_id', '$comment', '$publish_date')")) {
     $last_id = mysqli_insert_id($con);
     $sql = mysqli_query($con, "SELECT * FROM post_comments WHERE id = '$last_id'");
     $row = mysqli_fetch_array($sql);
     if ($_SESSION['user_type'] == 1) {
       $fl_name = $user_data['ngo_name'];
     } elseif ($_SESSION['user_type'] == 2) {
       $fl_name = $user_data['f_name'] . ' ' . $user_data['l_name'];
     }
    echo '  <li class="comment-item" id="comment'.$row['id'].'">
          <div class="post__author author vcard inline-items">
              <img src="img/'.get_image_by_id($con, $row['user_id'], $_SESSION['user']).'" alt="author">

              <div class="author-date">
                  <a class="h6 post__author-name fn" href="#">'.$fl_name.'</a>
                  <div class="post__date">
                      <time class="published" datetime="2017-03-24T18:18">
                          '.$row['publish_date'].'
                      </time>
                  </div>
              </div>

              <div class="more">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                <ul class="more-dropdown">

                  <li>
                    <a href="javascript:void(0)" id="delete_comment" onclick="delete_comment('.$row['id'].', '.$post_id.')">Delete Comment</a>
                  </li>

                </ul>
              </div>
          </div>

          <p>'.$row['comment'].'</p>

          <a href="javascript:void(0)" class="post-add-icon inline-items" id="likeComment'.$row['id'].'" onclick="likeUnlikeComment('.$row['id'].', '.$post_id.')">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
              <span></span>
          </a>
      </li>';
  } else {
    echo 0;
  }
}

if (isset($_GET['last_id']) && isset($_GET['post_id'])) {
  $sql = "SELECT * FROM post_comments
       WHERE post_id = '".$_GET['post_id']."' AND id < '".$_GET['last_id']."' ORDER BY id DESC LIMIT 1";

 $result = mysqli_query($con, $sql);
 if (mysqli_num_rows($result) > 0) {

     while($row = mysqli_fetch_array($result)){
       if (check_comment_liked($con, $row['id'], $_SESSION['id'], 'comment_likes') == true) { $i_color = "#38a9ff"; } else {  $i_color = ""; }
echo '    <li class="comment-item" id="comment'.$row['id'].'">
      <div class="post__author author vcard inline-items">
          <img src="img/'.get_image_by_id($con, $row['user_id'], $_SESSION['user']).'" alt="author">

          <div class="author-date">
              <a class="h6 post__author-name fn" href="#">'.get_name_by_id($con, $row['user_id']).'</a>
              <div class="post__date">
                  <time class="published" datetime="2017-03-24T18:18">
                      '.$row['publish_date'].'
                  </time>
              </div>
          </div>

          <div class="more">
            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
            <ul class="more-dropdown">

              <li>
                <a href="javascript:void(0)" id="delete_comment" onclick="delete_comment('.$row['id'].', '.$_GET['post_id'].')">Delete Comment</a>
              </li>

            </ul>
          </div>
      </div>

      <p>'.$row['comment'].'</p>

      <a href="JavaScript:void(0)" class="post-add-icon inline-items" id="likeComment'.$row['id'].'" onclick="likeUnlikeComment('.$row['id'].', '.$_GET['post_id'].')" style="color:'.$i_color.'">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          <span>'.total_likes($con, 'comment_id', $row['id'], 'comment_likes').'</span>
      </a>
  </li>';

     }

   } else {
     echo 1;
   }
}

if (isset($_POST['comment_id'])) {
  $id = $_POST['comment_id'];
  dbRowDelete($con, 'post_comments', 'id', $id);
}
 ?>
