<?php 
header('Access-Control-Allow-Origin: *');
require_once 'core.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userFirstname = $_POST['firstname'];
    $userSurname = $_POST['surname'];
    $userEmail = $_POST['email'];
    $userAddress = $_POST['userAddress'];
    $userAge = $_POST['age'];
    $userGender = $_POST['userGender'];
    $userUsername = $_POST['userUsername'];
    $userPassword = $_POST['userPassword'];
    $userPassword2 = $_POST['userPassword2'];
    $userEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT * FROM users WHERE email = '$userEmail'";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    $data = mysqli_num_rows($result);

if(($data)==0){
    if($userFirstname !== "" ||$userSurname !== "" || $userEmail !== "" || $userAddress !=="" || $userAge !== "" || $userGender !== "" || $userUsername !== "" || $userPassword !== "" || $userPassword2 !== ""){
        if($userPassword === $userPassword2){
            $userPassword = md5($userPassword);
            $sql = "INSERT INTO users(firstname,surname,email,address,age,gender,username,password) values('$userFirstname','$userSurname','$userEmail ','$userAddress','$userAge','$userGender','$userUsername','$userPassword')";
            mysqli_query($connect,$sql);
        }
        else{
            echo("Password mismatch");
        }

    }else{
        echo("Please fill all fields");
    }
    

    if($query1){
        echo("You have Successfully Registered");
     
     }else{

    echo("Error Login");
     }
   
    }else{
        echo("This email is already regsitered, Please try another email");
    }

    }
  
}







?>