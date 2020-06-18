<?php 
	session_start();
	include('controller/processing.php');


	?>

	<?php

	$obj = new Processing();
	?>

<div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 " role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="text-white mb-0">Drive Search</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="listings.php">Ads</a></li>
                <li class="has-children">
                  <a href="about.php">About</a>
                  <ul class="dropdown">
                    <li><a href="#">The Company</a></li>
                    <li><a href="#">The Leadership</a></li>
                    <li><a href="#">Philosophy</a></li>
                    <li><a href="#">Careers</a></li>
                  </ul>
                </li>
                <li><a href="blog.PHP">Blog</a></li>
                <li class="mr-5"><a href="contact.php">Contact</a></li>

                <?php   
                if(isset($_SESSION["customer_id"])){
                  echo('<li class="has-children">'.
                  '<a href="profile.php">'.$_SESSION["customer_fullname"].'</a>'.
                  '<ul class="dropdown">'.
                    '<li><a href="updates.php">Updates</a></li>'.
                    '<li><a href="settings.php">Settings</a></li>'.
                    '<li><a href="saves.php">Saves</a></li>'.
                    '<li><a href="logout.php">Log Out</a></>'.
                  '</ul>'.
                '</li>');
                }
                else{
                  echo('<li class="ml-xl-3 login"><a href="login.php"><span class="border-left pl-xl-4"></span>Log In</a></li>'.
                  '<li><a href="register.php" class="cta"><span class="bg-primary text-white rounded">Register</span></a></li>');
                }
                
                ?>

                

                
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>