<?php
include_once("./databse/constants.php");
?>

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


<?php include_once("./templates/header.php"); ?>

<div class="container" style="margin-top:5rem;">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 20rem; ">
                <img src="./images/img3.png" class="card-img-top mx-auto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Profile Info</h5>
                     <p class="card-text"><i class="fa fa-user"></i> Eugene Parker</p>
                     <p class="card-text"><i class="fa fa-user"></i> Admin</p>
                     <p class="card-text">Last Login :xxxx-xx-xx</p>
                    <a href="#" class="btn btn-primary"><i class="fa fa-edit"> &nbsp;</i> Edit Profile</a>
  </div>
</div>
        </div>
<div class="col-md-8">
    <div class="jumbotron" style="width:100%; height:100%;">
    <h1>Welcome Admin</h1>
    <div class="row">
        <div class="col-sm-6">
        <iframe src="http://free.timeanddate.com/clock/i6zr984m/n4/szw210/szh210/cf100/hnce1ead6/mqc00f/mhc90f/mmc900" frameborder="0" width="210" height="210"></iframe>
        </div>

        <div class="col-sm-6">
        <div class="card">
      <div class="card-body">
        <h5 class="card-title">New Orders </h5>
        <p class="card-text"> Here you can make invoices and create new orders</p>
        <a href="#" class="btn btn-primary">New Orders</a>
      </div>
    </div>
        </div>

    </div>

    </div>
</div>

    </div>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <p class="card-text">Here you can manage you categories and you add new parent and sub categories</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_category">Add </a>
                <a href="#" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-body" >
                <h5 class="card-title">Brands</h5>
                <p class="card-text">Here you can manage you brand and you add new brand</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_brand">Add </a>
                <a href="#" class="btn btn-primary">Manage</a>
      </div>
    </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-body" >
                <h5 class="card-title">Products</h5>
                <p class="card-text">Here you can manage you products and you add new products</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_product">Add </a>
                <a href="#" class="btn btn-primary">Manage</a>
        </div>
    </div>
        </div>
    </div>
</div>

<?php 
// Category Form
include_once("./templates/category.php");
?>
<?php 
// Category Form
include_once("./templates/brand.php");
?>
<?php 
// Category Form
include_once("./templates/product.php");
?>


<!-- Bootstrap & Jquery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<script src="js/main.js"></script>
</body>
</html>