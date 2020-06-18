<?php
include_once("./databse/constants.php");
session_start();
if(isset($_SESSION["user_id"])){
  header("Location:".DOMAIN."/dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management Systems</title>

     <!-- BootStrap Links -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    
    
</head>
<body>
<div class="overlay"><div class="loader"></div></div>
<!-- ?php include_once("./templates/header.php"); ?-->

<div class="container" style="margin-top:10rem;">

<!-- Alert Section  -->
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"])){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?php echo($_GET["msg"]);?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
}
?>
<!-- End of alert section -->

<div class="card mx-auto" style="width: 25rem;">
<img class="card-img-top mx-auto" src="./images/img1.png" alt="Login Icon" style="width:60%;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <form id="login_form" onsubmit="return false">
  <div class="form-group">
    <label for="log_email">Email address</label>
    <input type="email" class="form-control" name="log_email" id="log_email"  placeholder="Enter email">
    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="log_pass">Password</label>
    <input type="password" class="form-control" name="log_pass" id="log_pass" placeholder="Password">
    <small id="p_error" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary" id><i class="fa fa-lock">&nbsp;</i>  Login</button>
  <span><a href="register.php">Register</a></span>
</form>
  </div>
  <div class="card-footer">
    <a href="">Forget Password ?</a>
  </div>
</div>
</div>




<!-- Bootstrap & Jquery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<script src="js/main.js"></script>
</body>
</html>