<?php 
header('Access-Control-Allow-Origin: *');
require_once 'core.php';
$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
if(isset($userId)){
    $userLogQuery = "Select * from userlog where userid ='$userdId'";
    $result = mysqli_query($connect,$userLogQuery);
    $fetch_result = mysqli_fetch_row($result);

    
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
         if(isset($_SESSION['username'])){
            $deleteQuery = "DELETE FROM userlog where userid = '$userId'";
            mysqli_query($connect,$deleteQuery);

            session_unset($_SESSION['username']);
            
         }
        
     }else{
         echo("No record available");
     }


    }
    else{
        echo("No user found !");
    }




?>