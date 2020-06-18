<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

$adminId = $_SESSION['admin_id'];
// $userName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT user_id,timestamp,user_firstname,user_lastname,username,email,user_gender,user_age FROM users";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No user found!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("user_id"=> $row_result->user_id, "timestamp"=> $row_result->timestamp,"user_firstname"=> $row_result->user_firstname,"user_lastname"=> $row_result->user_lastname,"username"=> $row_result->username, "email"=> $row_result->email, "user_gender"=> $row_result->user_gender, "user_age"=> $row_result->user_age,));
    
}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>