<?php
function check_login($con, $email, $password, $usertype){
    $sql = "SELECT * FROM `users` WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $sql);
      if(mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $user_type = $row['user_type_id'];
      $db_email = $row['email'];
      $db_password = $row['password'];
      $data = array(
        $id,
        $user_type,
        $db_email,
       );

    $password = trim($password);

    if (password_verify($password, $db_password)) {
      if ($user_type == 1) {
        $sql2 = mysqli_fetch_array(mysqli_query($con, "SELECT status FROM ngo WHERE user_id = '$id'"));
        if ($sql2['status'] == 0) {
          return 1;
        } elseif ($sql2['status'] == 2) {
          return 2;
        }  else {
          return $data;
        }
      } else {
      return $data;
      }
    } else {
      return 0;
    }
    }
  }


function check_if_exists($con, $table_name, $email) {
  $SQL = "SELECT email FROM `$table_name` WHERE email = '$email'";
  $result = mysqli_query($con, $SQL);
  $rowsnum = mysqli_num_rows($result);
  if($rowsnum > 0) {
      return true;
  }
}





function resetpassword($con, $email) {

}

  function get_user_by_id($con, $table, $id) {
    if ($table == 1) {
      $table = "ngo";
    } elseif ($table == 2) {
      $table = "donor";
    }
    $sql = mysqli_query($con, "SELECT * FROM $table WHERE user_id='$id'");
    if (mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_array($sql);
        $data = $row;
        return $data;
    }
  }

  function dbRowInsert($con, $table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    // run and return the query result resource
    return mysqli_query($con, $sql);

}

function dbRowDelete($con, $table_name, $column, $value)
{
  // check for optional where clause


  // run and return the query result resource
  return mysqli_query($con, "DELETE FROM $table_name WHERE $column = $value");
}

function dbRowUpdate($con, $table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;
        // run and return the query result
    return mysqli_query($con, $sql);
}


  function get_user_images($con, $table_name, $id) {
    $sql = "SELECT *, count(`pic_name`) as total FROM `$table_name` WHERE p_id = '$id' ORDER BY id DESC LIMIT 2";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
      $data = array();
      while($row = mysqli_fetch_assoc($result)) {
        echo $row['pic_name'];
      }




    }
  }

  function check_current_password($con, $current, $id) {
    $sql = mysqli_query($con, "SELECT password FROM users WHERE id = '$id'");
    if (mysqli_num_rows($sql) == 1) {
      $row = mysqli_fetch_array($sql);
      if (password_verify($current, $row['password'])) {
        return true;
      } else {
        return false;
      }
    }

  }

  function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '
        <ul class="pagination justify-content-center">';

        $right_links    = $current_page + 3;
        $previous       = $current_page - 3; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link

        if($current_page > 1){
			$previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="page-item first"><a href="#" data-page="1" title="First" class="page-link">«</a></li>'; //first link
            $pagination .= '<li class="page-item"><a href="#" data-page="'.$previous_link.'" title="Previous" class="page-link">Previous</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li class="page-item"><a href="#" data-page="'.$i.'" title="Page'.$i.'" class="page-link">'.$i.'</a></li>';
                    }
                }
            $first_link = false; //set first link to false
        }

        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active page-item"><a href="#" class="page-link">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active page-item"><a href="#" class="page-link">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active page-item"><a href="#" class="page-link">'.$current_page.'</a></li>';
        }

        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li class="page-item"><a href="#" data-page="'.$i.'" title="Page '.$i.'" class="page-link">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
				$next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li class="page-item"><a href="#" data-page="'.$next_link.'" title="Next" class="page-link">Next</a></li>'; //next link
                $pagination .= '<li class="last page-item"><a href="#" data-page="'.$total_pages.'" title="Last" class="page-link">»</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}

  function total_rows($con, $table_name) {
    $sql = mysqli_query($con, "SELECT * FROM $table_name");
    $total_rows = mysqli_num_rows($sql);
    return $total_rows;
  }

  function check_user_info($con, $id, $table_name) {
    if ($table_name == "ngo") {
      // $sql = mysqli_query($con, "SELECT IF(ngo_name IS NULL OR ngo_name = '', 'empty', ngo_name) IF(cp_fname IS NULL OR cp_fname = '', 'empty', cp_fname) FROM $table_name WHERE id = '$id'");
      $sql = mysqli_query($con, "SELECT case when ngo_name IS NULL or ngo_name = ''
            then 'empty'
            else ngo_name case when cp_fname IS NULL or cp_fname = ''
                  then 'empty'
                  else cp_fname end as cp_fname
from $table_name WHERE id = '$id'");
      if (mysqli_num_rows($sql) > 0) {
        echo "<script>alert('Profile Incomplete!');</script>";
      } else {
        echo "<script>alert('Profile Completed!');</script>";
      }
    }
  }

  function check_user_data($con, $user, $id) {
    $user_data = get_user_by_id($con, $user, $id);
    if ($user == 1) {
    $data = array(
      'ngo_website' => $user_data['ngo_website'],
      'ngo_active_since' => $user_data['ngo_active_since'],
      'ngo_phone' => $user_data['ngo_phone'],
      'ngo_country_of_op' => $user_data['ngo_country_of_op'],
      'ngo_city_of_op' => $user_data['ngo_city_of_op'],
      'ngo_page_description' => $user_data['ngo_page_description'],
      'sectors_of_action' => $user_data['sectors_of_action'],
      'additional_info' => $user_data['additional_info'],
      'longitude' => $user_data['longitude'],
      'latitute' => $user_data['latitute'],
      'ngo_address' => $user_data['ngo_address'],
    );
  } elseif($user == 2) {
    $data = array(
      'f_name' => $user_data['f_name'],
      'l_name' => $user_data['l_name'],
      'description' => $user_data['description'],
      'donor_dob' => $user_data['donor_dob'],
      'donor_phone' => $user_data['donor_phone'],
      'donor_occupation' => $user_data['donor_occupation'],
      'donor_marital_status' => $user_data['donor_marital_status'],
      'donor_competencies' => $user_data['donor_competencies'],
      'p_sectors_of_action' => $user_data['p_sectors_of_action'],
    );
    }
    if(array_keys($data, null)) {
      return 1;
    }
  }

  function check_post_liked($con, $field, $post_id, $user_id, $table_name) {
    $sql = mysqli_query($con, "SELECT * FROM $table_name WHERE $field = '$post_id' AND user_id = '$user_id'");
    if (mysqli_num_rows($sql) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function check_comment_liked($con, $c_id, $user_id, $table_name) {
    $sql = mysqli_query($con, "SELECT * FROM $table_name WHERE comment_id = '$c_id' AND user_id = '$user_id'");
    if (mysqli_num_rows($sql) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function total_likes($con, $field, $id, $tbl_name) {
    $sql = mysqli_query($con, "SELECT $field FROM $tbl_name WHERE $field = '$id'");
    $total_rows = mysqli_num_rows($sql);
    return $total_rows;
  }

  function get_name_by_id($con, $user_id) {
    $user_type = mysqli_fetch_array(mysqli_query($con, "SELECT user_type_id FROM users WHERE id = '$user_id'"));
    $type = $user_type['user_type_id'];
    if ($type == 1) {
      $sql = mysqli_fetch_array(mysqli_query($con, "SELECT ngo_name FROM ngo WHERE user_id = '$user_id'"));
      $name_by_id = $sql['ngo_name'];
    } elseif ($type == 2) {
      $sql = mysqli_fetch_array(mysqli_query($con, "SELECT f_name, l_name FROM donor WHERE user_id = '$user_id'"));
      $name_by_id = $sql['f_name'] . ' ' . $sql['l_name'];
    }
    return $name_by_id;
  }

  function get_image_by_id($con, $user_id, $table_name) {
    $pic_name = mysqli_fetch_array(mysqli_query($con, "SELECT pic_name FROM $table_name WHERE user_id = '$user_id'"));
    return $pic_name['pic_name'];
  }

  function get_country_id($con, $country) {
    $id = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM countries WHERE country = '$country'"));
    return $id['id'];
  }

  function get_sector_by_id($con, $id)
  {
    $row = mysqli_fetch_array(mysqli_query($con, "SELECT sector FROM sectors_of_action WHERE id = '$id'"));
    return $row['sector'];
  }

  function get_user_img($con, $id)
  {
    $user_id = mysqli_fetch_array(mysqli_query($con, "SELECT user_id FROM posts WHERE id = '$id'"));
    $user_type_id = mysqli_fetch_array(mysqli_query($con, "SELECT user_type_id FROM users WHERE id = '".$user_id['user_id']."'"));
    if ($user_type_id['user_type_id'] == 1) {
      $table_name = "ngo";
    } elseif ($user_type_id['user_type_id'] == 2) {
      $table_name = "donor";
    }
    $row = mysqli_fetch_array(mysqli_query($con, "SELECT pic_name FROM $table_name WHERE user_id = '".$user_id['user_id']."'"));
    return $row['pic_name'];
  }

  function total_ngo_donor($con, $n_id)
  {
    $total_donors = mysqli_num_rows(mysqli_query($con, "SELECT DISTINCT d_id FROM donations WHERE n_id = '$n_id'"));
    return $total_donors;
  }

  function total_donation($con, $n_id)
  {
    $sql = mysqli_query($con, "SELECT SUM(donated_amount) as `total_amount` FROM donations WHERE n_id = '$n_id'");
    $row = mysqli_fetch_array($sql);
    echo $row['total_amount'];
  }









 ?>
