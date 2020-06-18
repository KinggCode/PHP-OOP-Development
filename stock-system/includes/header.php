<?php require_once 'php_action/core.php'; ?>

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
    <!-- <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

    <!-- Customs Css -->
    <link rel="stylesheet" href="custom/css/custom.css">

    <!--- File Input-->

    <!---DataTables-->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <!-- Jquery -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>

    <!-- Jquery-ui -->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>

     <!-- Bootstrap js -->
     <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

    <title>SMS - Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <a class="navbar-brand" href="#">InventoryHub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collect the nav links,forms and other content for toggling -->
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto" id="navSetting">
        <li class="nav-item" id="navDashboard"><a class="nav-link" href="index.php" ><i class="fas fa-list-ul"></i> Dashboard</a></li>
        <li class="nav-item" id="navBrand"><a class="nav-link" href="brand.php"><i class="fab fa-btc"></i> Brands</a></li>
        <li class="nav-item" id="navCategory"><a class="nav-link" href="category.php"><i class="fas fa-th"></i> Category</a></li>
        
        <li class="nav-item dropdown" id="navOrder">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cart-plus"></i> Orders</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="orders.php?o=add" id="topNavAddOrder"><i class="fas fa-plus"></i> Add Orders</a>
            <a class="dropdown-item" href="orders.php?o=manord" id="topNavManageOrder"><i class="fas fa-edit"></i> Manage Orders</a>
          </div>
        </li>
        <li class="nav-item" id="navReport"><a class="nav-link" href="report.php"><i class="fas fa-check-square"></i> Report</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-expanded="false">
          <i class="fas fa-users-cog"></i>    Accounts                           </a>
        <div class="dropdown-menu " >
          <a class="dropdown-item" href="settings.php" id="topNavSettings"><i class="fas fa-cog"></i> Settings</a>
          <a class="dropdown-item" href="logout.php" id="topNavLogout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>



<!---Footer -->
<div class="container">

