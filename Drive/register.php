
   <?php include('layers/header.php'); ?>

<?php include('layers/navbar.php'); ?>
     
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(image/drivecover.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Drivee Sign Up</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  


    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5"  data-aos="fade">

            <h2 class="mb-5 text-black">Register</h2>

            <!-- Register form  -->
            <form action="http://localhost/drive/controller/process.php" class="p-5 bg-white" autocomplete="off" required>
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="name" >Fullname</label> 
                  <input type="text" id="name" name="user_rname" class="form-control" placeholder="User Fullname" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email" >Email</label> 
                  <input type="email" id="email" name="user_remail" class="form-control" placeholder="User email" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Password</label> 
                  <input type="password" id="user_rpassword"   name="user_rpassword" class="form-control" placeholder="User password " required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Re-type Password</label> 
                  <input type="password" id="user_rpassword2" name="user_rpassword2" class="form-control" placeholder="User re-type password" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-12">
                  <p>Have an account? <a href="login.php">Log In</a></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

              <p>
                <?php if(isset($_GET["msg"])){
                echo('<p style="color:red";>'.
                $_GET["msg"]
                .'</p>');
              } ?>
              
            </p>

  
            </form>
          </div>
          
        </div>
      </div>
    </div>

    
    <div class="newsletter bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Newsletter</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="col-md-6">
            
            <form class="d-flex">
              <input type="text" class="form-control" placeholder="Email">
              <input type="submit" value="Subscribe" class="btn btn-white"> 
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include('layers/footer.php'); ?>
  </div>

  
  <?php include('layers/script.php'); ?>
    
    
  </body>
</html>