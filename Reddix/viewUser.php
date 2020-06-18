<?php 
header('Access-Control-Allow-Origin: *');
require_once 'core.php';

$adminId = $_SESSION['admin_id'];
$username = $_GET['username'];

if(isset($username)){
    $userExistQuery = "Select * from users where username ='$username'";
    $result = mysqli_query($connect,$userExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
       echo("User Found");
     }else{
         echo("No record available");
     }


    }
    else{
        echo("No user found !");
    }

    $data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("admin_id"=> $adminId,"adminName"=> $adminName,"user_id"=> $row_result->user_id, "timestamp"=> $row_result->timestamp,"username"=> $row_result->username, "email"=> $row_result->email, "gender"=> $row_result->gender,));
    
}

echo(json_encode($data));




?>