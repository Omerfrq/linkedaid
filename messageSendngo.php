<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "safehao1_linkedaid";

$con = mysqli_connect($host, $username, $password, $db);


$message = $_POST['message'];
$receiverId = $_POST['recieverId'];
$status = $_POST['status'];


$sql="INSERT INTO 
messages (text,receiverId,status) 
VALUES ('$message','$receiverId','$status')";

if ($con->query($sql) === TRUE) {
    header('Content-type: application/json');
    echo json_encode($_POST['message']);
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>