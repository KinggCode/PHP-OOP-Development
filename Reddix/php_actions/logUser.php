<?php
header('Access-Control-Allow-Origin: *');
require_once 'core.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userEmail = filter_var($_POST['userEmail'],FILTER_SANITIZE_EMAIL);

      if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}

    if(!empty($userEmail) && !empty($userPassword)){
         $userPassword = md5($userPassword);
    //Creating a query request to check if the user exists
    $userExistQuery = "Select * from users where email='$userEmail' and password='$userPassword'";
   
    $result = mysqli_query($connect,$userExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
    session_start();
    //var_dump($result);
   
    $_SESSION['user_id'] =$fetch_result[1];
    $_SESSION['username'] =$fetch_result[8];
    $_SESSION['password'] =$fetch_result[9];

    $userid = $_SESSION['user_id'];

    $logEntry = "INSERT INTO userlog(userid) values('$userid')";
    $result2 = mysqli_query($connect,$logEntry);
    
    echo("Login Successfully");
     }else{
         echo("Email & Password Invalid");
         
     }
    
    }
}
?>