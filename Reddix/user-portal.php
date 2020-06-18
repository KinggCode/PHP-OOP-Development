<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'php_actions/core.php';

$adminId = $_SESSION['user_id'];
$adminName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT user_id,timestamp,username,email,gender FROM users";
$result = mysqli_query($connect,$query);
// $fetch_result = mysqli_fetch_object($result);
// print_r($fetch_result);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No user found!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("user_id"=> $row_result->user_id, "timestamp"=> $row_result->timestamp,"username"=> $row_result->username, "email"=> $row_result->email, "gender"=> $row_result->gender,));
    
}




echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>