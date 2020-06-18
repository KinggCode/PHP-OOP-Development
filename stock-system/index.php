<?php
require_once 'php_action/db_connect.php';

//Start Admin Session
session_start();

if(isset($_SESSION['userId'])){
    header('location: http://localhost/stock-system/dashboard.php');
}

$errors = array();

if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password)){
    if($username == ""){
        $errors[] = "Username is required";
    }
    if($password == ""){
        $errors[] = "Password is required";
       }
    }else{
        $sql = "SELECT * FROM Users WHERE username = '$username'";
        $result = $connect->query($sql);

        if($result->num_rows == 1){
            // $password = md5($password);

            //exists
            $mainSql = "SELECT * FROM Users WHERE username = '$username' AND password ='$password'";
            $mainResult = $connect ->query($mainSql);

            if($mainResult->num_rows == 1){
                $value = $mainResult->fetch_assoc();
                $user_id = $value['user_id'];

                //set Session 
                $_SESSION['userId'] = $user_id;
                $errors[] ="Succesfully! Accounts Ready";
                header('location: http://localhost/stock-system/dashboard.php');
            }else{
                $errors[] = "Incorrect Username & Password";
            }
        }else{
            $errors[] = "Username does not exists";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Project Links -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    
    <!-- Bootstrap Theme Css -->
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css"> -->
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css">

    <!-- Customs Css -->
    <link rel="stylesheet" href="custom/css/custom.css">

    <!-- Jquery -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>

    <!-- Jquery-ui -->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>

     <!-- Bootstrap js -->
     <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Title -->
    <title>Stock Management System</title>
</head>
<body>
   
<div class="container">
    <div class="row vertical">
        <div class="col-md-5 offset-4">
            <form class="form-signin" action="<?php echo($_SERVER['PHP_SELF'])?>" method="POST" id="loginForm">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" name="username" >
                
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" >

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login"> Sign in</button>
                <p class="mt-5 mb-3 text-muted">KingCode® </p>

                 <div class="messages">
                     <?php
                        if($errors){
                            foreach ($errors as $key => $value){
                                echo('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'.$value.'
                                        </strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>');
                            }
                        }
                     ?>
                 </div>
            </form>
        </div><!--- End of col-md-5-->
    </div><!-- End of Row--->
</div> <!-- End of Container--->

</body>
</html>
