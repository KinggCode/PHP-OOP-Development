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


              <form method="GET" action="search.php">
                <div class="row align-items-center">
                   <!-- Search BAR  -->
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-4">
                    <input type="text" name="search_query" id="seary_qry" class="form-control rounded" placeholder="What are you looking for?">
                  </div>

              

                <!-- Category Dropdown  -->
                  <div class="col-lg-12 mb-4 mb-xl-0 col-xl-6">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control rounded" name="categories" id="categories">
                      <option value="0">All Categories</option>
                        <?php echo($obj->categorySearchDrop());?>
                      </select>
                    </div>
                  </div>
                   <!-- End of category dropdown  -->

                   <!-- Search Button -->
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                  </div>
                  
                  
                </div>
              </form>
            </div>

            <div class="row text-left trending-search" data-aos="fade-up"  data-aos-delay="300">
              <div class="col-12">
                <h2 class="d-inline-block">Trending Search:</h2>
                <a href="#">iPhone</a>
                <a href="#">Cars</a>
                <a href="#">Flowers</a>
                <a href="#">House</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        
        
        <div class="row">

        <!-- feature header Container -->
          <div class="col-12">
            <h2 class="h5 mb-4 text-black">Featured Ads</h2>
          </div>
        </div>
<!-- End of feature header -->



        <div class="row">
          <div class="col-12  block-13">
            <div class="owl-carousel nonloop-block-13">
            <?php echo($obj->productCard());?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section" data-aos="fade">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Popular Categories</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>

        <div class="overlap-category mb-5">
          <div class="row align-items-stretch no-gutters">
            
          <?php echo($obj->categoryCard());?>

           
          </div>
        </div>
        
        
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left border-primary">
            <h2 class="font-weight-light text-primary">Trending Today</h2>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6">
          <?php echo($obj->limitedproductCard());?>
          </div>
          
          <div class="col-lg-6">
          <?php echo($obj->limitedproductCard());?>
          </div>
        </div>
      </div>

     
        
        
          
       
      </div>

      <div class="site-section" data-aos="fade">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Popular Brands</h2>
            <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
          </div>
        </div>

        <div class="overlap-category mb-5">
          <div class="row align-items-stretch no-gutters">
            
          <?php echo($obj->brandCard());?>

           
          </div>
        </div>
        
        
      </div>
    </div>
   
    
    <div class="site-section bg-white">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Testimonials</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                <p>Ray Blay </p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                <p>John Ballack</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                <p>Henry Hollow</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                <p>Kiara Henry</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
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