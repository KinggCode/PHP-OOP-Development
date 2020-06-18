<?php include('layers/header.php'); ?>



<?php include('layers/navbar.php'); ?>
  

    <div class="site-blocks-cover overlay" style="background-image: url(image/drivecover.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">
            
            
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1 class="" data-aos="fade-up">Drive Search Engine</h1>
                <p data-aos="fade-up" data-aos-delay="100">Let the fingers do the talking .. </p>
              </div>
            </div>

            <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">


              <form method="GET">
                <div class="row align-items-center">
                   <!-- Search BAR  -->
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-10">
                    <input type="text" name="search_query" id="seary_qry" class="form-control rounded" placeholder="What are you looking for?">
                  </div>

              


                   <!-- Search Button -->
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                  </div>
                  
                  
                </div>
              </form>
            </div>

           
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="row">
                <?php 
                
                if(isset($_GET["search_query"]) && $_GET["search_query"]!="" ){
                    echo($obj->searchCardDisplay($_GET["search_query"]));
                }
                else if(isset($_GET["search_query"]) && isset($_GET["categories"])){
                    echo($obj->catseaCardDisplay($_GET["search_query"],$_GET["categories"]));
                }
                else{
                    echo("<p style='color:red'>Search for  something</p>");
                }
                ?>
             
              

            </div>

           

          </div>
          

        </div>
      </div>
    </div>



       
  


   
     
        
        
          
       
      </div>

      
   
    
    
          



    

    
 
    
   <?php include('layers/footer.php'); ?>
  </div>

  
  <?php include('layers/script.php'); ?>
  </body>
</html>