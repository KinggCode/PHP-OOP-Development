<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Mnagement Systems</title>

     <!-- BootStrap Links -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="custom/css/style.css">
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    
</head>
<body>
<div class="overlay"><div class="loader"></div></div>
<!-- ?php include_once("./templates/header.php"); ? -->
<div class="container" style="margin-top:4rem;">
<div class="card mx-auto" style="width: 25rem;">
<img class="card-img-top mx-auto" src="./images/img1.png" alt="Login Icon" style="width:60%;">
  <div class="card-body">
    <h5 class="card-title mx-auto">Register</h5>


    <form  id="register_form" onsubmit="return false" autocomplete="off">
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
    <small id="u_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Enter email">
    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
    <small id="p1_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Re-enter Password</label>
    <input type="password" class="form-control" name="password2" id="password2" placeholder="Re-enter Password">
    <small id="p2_error" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="usertype">Usertype</label>
    <select name="usertype" id="usertype" class="form-control">
      <option value="">Choose User Type</option>
      <option value="Admin">Admin</option>
      <option value="Other">Other</option>
    </select>
    <small id="t_error" class="form-text text-muted"></small>
  </div>
  <button type="submit" name="user_register" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>  Register</button>
  <span><a href="index.php">Login</a></span>
</form>
  </div>
  
</div>
</div>




<!-- Bootstrap & Jquery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<script src="js/main.js"></script>
</body>
</html>