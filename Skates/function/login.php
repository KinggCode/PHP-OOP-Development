<?php
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

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
    $adminExistQuery = "SELECT * FROM users WHERE email='$userEmail' and password='$userPassword'";
   
    $result = mysqli_query($connect,$adminExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
    session_start();
    // var_dump($fetch_result);
   
    $_SESSION['user_id'] =$fetch_result[1];
    $_SESSION['user_firstname'] =$fetch_result[2];
    $_SESSION['user_lastname'] =$fetch_result[3];
    $_SESSION['user_age'] =$fetch_result[4];
    $_SESSION['user_gender'] =$fetch_result[5];
    $_SESSION['username'] =$fetch_result[6];

    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['username'];  
    
    echo("Login Successfully");
     }else{
         echo("Email & Password Invalid");
         
         
     }
    
    }
    
}
?>