<?php
header('Access-Control-Allow-Origin: *');
require_once 'core.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];
    $adminCode = $_POST['adminCode'];
    $adminEmail = filter_var($_POST['adminEmail'],FILTER_SANITIZE_EMAIL);

      if(!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}

    if(!empty($adminEmail) && !empty($adminPassword) && !empty($adminCode)){
         $adminPassword = md5($adminPassword);
    //Creating a query request to check if the user exists
    $adminExistQuery = "Select * from admin where email='$adminEmail' and password='$adminPassword' and securityCode='$adminCode'";
   
    $result = mysqli_query($connect,$adminExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
    session_start();
    //var_dump($result);
   
    $_SESSION['admin_id'] =$fetch_result[1];
    $_SESSION['username'] =$fetch_result[5];
    $_SESSION['password'] =$fetch_result[6];

    $adminUser = $_SESSION['username'];
    
    echo("Login Successfully");
     }else{
         echo("Email & Password Invalid");
         
     }
    
    }
}
?>