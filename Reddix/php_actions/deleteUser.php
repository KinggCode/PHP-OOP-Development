<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reddix Admin</title>

     <!-- BootStrap Link -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="custom/css/style.css">
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>
    <a href="http://localhost/Reddix/admin-portal.html" class="btn btn-danger ">Go Back</a>

    <!-- Bootstrap & Jquery Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Custom Js Script -->
    <!-- <script src="custom/js/validate.js"></script> -->
    <!-- <script src="custom/js/script.js"></script> -->
</body>
</html>



<?php 
header('Access-Control-Allow-Origin: *');
require_once 'core.php';
$username = $_GET['username'];
$admin_name = $_GET['admin_name'];

if(isset($username) && isset($admin_name)){
    $userExistQuery = "Select * from users where username ='$username'";
    $result = mysqli_query($connect,$userExistQuery);
    $fetch_result = mysqli_fetch_row($result);

    
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
        $adminHistory = "INSERT INTO DeleteHistory(admin_name,username) values('$admin_name','$username')";
        mysqli_query($connect,$adminHistory);

        $deleteQuery = "DELETE FROM users where username = '$username'";
        mysqli_query($connect,$deleteQuery);
     }else{
         echo("No record available");
     }


    }
    else{
        echo("No user found !");
    }




?>