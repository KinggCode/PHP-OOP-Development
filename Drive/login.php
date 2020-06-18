<?php include('layers/header.php'); ?>



<?php include('layers/navbar.php'); ?>

  
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(image/drivecover.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Drivee Log In</h1>
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
          <div class="col-md-7 mb-5"  data-aos="fade" >

            <h2 class="mb-5 text-black">Log In</h2>

            <!-- Login Form  -->
            <form action="http://localhost/drive/controller/process.php" class="p-5 bg-white" >
             
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="log_mail" name="log_email" class="form-control" placeholder="User Email">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Password</label> 
                  <input type="password" id="log_pass" name="log_password" class="form-control" placeholder="User Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-12">
                  <p>No account yet? <a href="register.php">Register</a></p>
                </div>
              </div>

            
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="user_log" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
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


    
    <?php include('layers/footer.php'); ?>
  </div>

  
  <?php include('layers/script.php'); ?>

  
  </body>
</html>