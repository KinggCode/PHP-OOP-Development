<?php 
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

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
    // $userProfile = $_POST['userProfile'];
    $userEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT * FROM users WHERE email = '$userEmail'";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    // var_dump($fetch_result);
    $data = mysqli_num_rows($result);

if(($data)==0){
    if($userFirstname !== "" ||$userSurname !== "" || $userEmail !== "" || $userAddress !=="" || $userAge !== "" || $userGender !== "" || $userUsername !== "" || $userPassword !== "" || $userPassword2 !== ""){
        if($userPassword === $userPassword2){
            $userPassword = md5($userPassword);
            $sql = "INSERT INTO users(user_firstname,user_lastname,user_age,user_gender,username,user_address,email,password) values('$userFirstname','$userSurname','$userAge','$userGender','$userUsername','$userAddress','$userEmail','$userPassword')";
        //    var_dump($sql);
            $result1 = mysqli_query($connect,$sql);
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

    echo("Registration Error");
     }
   
    }else{
        echo("This email is already regsitered, Please try another email");
    }

    }
  
}







?>