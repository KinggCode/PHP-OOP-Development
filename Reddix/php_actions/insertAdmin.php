<?php 
header('Access-Control-Allow-Origin: *');
require_once 'core.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminFirstname = $_POST['firstname'];
    $adminSurname = $_POST['surname'];
    $adminEmail = $_POST['email'];
    $adminPassword = $_POST['adminPassword'];
    $adminPassword2 = $_POST['adminPassword2'];
    $adminUsername = $_POST['firstname'].".".$_POST['surname'];
    $adminSecurityCode = $_POST['adminCode'];
    $adminEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT * FROM admin ";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    $data = mysqli_num_rows($result);

if(($data)<2){
    if($adminPassword == $adminPassword2){
        $adminPassword = md5($adminPassword);
        $sql = "INSERT INTO admin(firstname,surname,email,username,password,securityCode) values('$adminFirstname','$adminSurname','$adminEmail ','$adminUsername','$adminPassword','$adminSecurityCode')";
        mysqli_query($connect,$sql);

    }else{
        echo("Password mismatch");
    }
    
    if($query1){
        echo("Welcome Admin");
        
     
     }else{

    echo("Error Login");
     }
   
    }else{
        echo("An adminstrator exists");
    }

    }
  
}







?>