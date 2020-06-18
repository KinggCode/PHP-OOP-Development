<?php

// dirname(__FILE__).'/../../controller/processing.php';
include_once( dirname(__FILE__)."/../model/databaseOperations.php");

class Processing extends databaseOperation {


##################################################
##################################################
############### Admin Section #################
##################################################


//    Brands Table Admin Side 
public function brandTable(){
    $table = "brands";
    $results = $this->getAllrecords($table);
    foreach($results as $shtable){

            echo('<tr>'.
                '<td>'. $shtable["brand_id"]. '</td>'.
                '<form method="GET" action="http://localhost/shoppnReo/controller/process.php">'.
                '<td>'.
                '<input type="hidden" name="brand_id" value="'.$shtable["brand_id"].'">'.
                '<input type="text" name="brand_name" value="'.$shtable["brand_name"].'">'.
                 '</td>'.
                '<td><input type="submit" name="EditBrand" class="btn btn-outline-warning btn-block" value="Edit"></td>'.
                '</form>'.

                '<td><a class="btn btn-outline-danger btn-block" id="shopdel_btn" href="http://localhost/shoppnReo/controller/process.php?brandelid='.$shtable["brand_id"].'" >Delete</td>'.
                '</tr>');
    }
}


// Category Table Admin Side 
    public function categoryTable(){
        $table = "categories";
        $results = $this->getAllrecords($table);
        foreach($results as $vtable){

                echo('<tr>'.
                    '<td>'. $vtable["cat_id"]. '</td>'.
                    '<form method="GET" action="http://localhost/shoppnReo/controller/process.php">'.
                    '<td>'. 
                    '<input type="hidden" name="cated_id" value="'.$vtable["cat_id"].'">'.
                    '<input type="text" name="cated_name" value="'.$vtable["cat_name"].'">'.
                    '</td>'.
                    '<td><input type="submit" name="EditBrand" class="btn btn-outline-warning btn-block" value="Edit"></td>'.
                    '</form>'.
                    '<td><a class="btn btn-outline-danger btn-block" href="http://localhost/shoppnReo/controller/process.php?catdelid='.$vtable["cat_id"].'" >Delete</td>'.
                    '</tr>');
        }
    }


    // Product Table Admin Side 
    public function productTable(){
        $table = "products";
        $results = $this->getAllrecords($table);
        foreach($results as $sbtable){

                echo('<tr>'.
                    '<td>'. $sbtable["product_id"]. '</td>'.
                    '<td>'. $sbtable["product_title"]. '</td>'.
                    '<td>'. $sbtable["product_price"]. '</td>'.
                    '<td>'.
                    ' <img src="http://localhost/shoppnReo/'.$sbtable["product_image"].'" alt="..." class="rounded-circle" style="width:6rem;height:6rem;">'
                    . '</td>'.
                    '<td>'. $sbtable["product_keywords"]. '</td>'.
                    '<td><a class="btn btn-outline-warning btn-block" href="http://localhost/shoppnReo/controller/process.php?produpid='.$sbtable["product_id"].'" >Edit</td>'.
                    '<td><a class="btn btn-outline-danger btn-block" href="http://localhost/shoppnReo/controller/process.php?proddelid='.$sbtable["product_id"].'" >Delete</td>'.
                    '</tr>');

                   

        }
    }


// Products under Brands 
    public function brandProdTable(){
        $table = "brands";
        $results = $this->brandsProductT();
        foreach($results as $shtable){

                echo('<tr>'.
                    '<td>'. $shtable["brand_name"]. '</td>'.
                    '<td>'. $shtable["product_id"]. '</td>'.
                    '<td>'. $shtable["product_title"]. '</td>'.
                    '<td>'.
                    ' <img src="http://localhost/shoppnReo/'.$shtable["product_image"].'" alt="..." class="rounded-circle" style="width:6rem;height:6rem;">'
                    . '</td>'.
                    '</tr>');
        }
    }


    // Brand Dropdown in Profduct Form 
    public function brandForm(){
        $table = "brands";
        $cresults = $this->getAllrecords($table);
        foreach($cresults as $brand){
            echo('<option value="'.$brand["brand_id"].'">'.$brand["brand_name"].'</option>');
        }


    }


    // / Category Dropdown in Product form 
    public function categoryForm(){
        $table = "categories";
        $cresults = $this->getAllrecords($table);
        foreach($cresults as $category){
            echo('<option value="'.$category["cat_id"].'">'.$category["cat_name"].'</option>');
        }


    }

    public function customerCount(){
        $table = "customer";
        $vcresults = $this->countRecords($table);
        return $vcresults;
    }

    public function brandCount(){
        $table = "brands";
        $vcresults = $this->countRecords($table);
        return $vcresults;
    }

    public function catCount(){
        $table = "categories";
        $vcresults = $this->countRecords($table);
        return $vcresults;
    }

    public function prodCount(){
        $table = "products";
        $vcresults = $this->countRecords($table);
        return $vcresults;
    }







##################################################
##################################################
############### Client  Section #################
##################################################

    // // Products in a shop ....
    // public function allProductDisplay(){
    //     $result= $this->getproductShop();
    //     if($result == "NO_PRODUCT_FOUND_IN_CATEGORY"){
    //         echo("NO_CATEGORY_FOUND");
    //     }
    //     else{
    //         foreach($result as $sbtable){
    //             echo('<div class="col-sm col-md-6 col-lg-3 ftco-animate">'.
    //                 '<div class="product">'.
    //                 '<a href="#" class="img-prod"><img class="img-fluid" src="'.$sbtable["product_mainimg"].'" alt="Colorlib Template"> <span class="status">Qty: '.$sbtable["product_qty"].'</span><a>'.
    //                 '<div class="text py-3 px-3">'.
    //                 '<h3><a href="http://localhost/enigma/product-single.php?pdisid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</a></h3>'.
    //                 '<div class="d-flex">'.
    //                 '<div class="pricing"><p class="price"><span> GHC'.$sbtable["product_price"].'</span></p></div>'.
    //                 '</div>'.
    //                 '<a class="price" ><span>Color: </span>'.$sbtable["product_color"].'</a>'.
    //                 '<hr>'.
    //                 '<p class="bottom-area d-flex">'.
    //                 '<a href="http://localhost/enigma/controller/process.php?pid='.$sbtable["product_id"].'" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>'.
    //                 '</p>'.
    //                 '</div>'.
    //                 '</div>'.
    //                 '</div>');
    // }
    
    //     }
    
        
    
    // }


// Category side bar on shop.php
    public function categorySearchDrop(){
        $table = "category";
        $cresults = $this->getAllrecords($table);
        if($cresults == "NO_RECORDS_FOUND"){
            echo("NO_PRODUCT_FOUND");
        }
        else{
            foreach($cresults as $category){
                echo('<option value="'.$category["category_id"].'">'.$category["category_name"].'</option>');
            }


        }

       
    }


// Category side bar on shop.php
public function brandsSearchDrop(){
    $table = "brands";
    $cresults = $this->getAllrecords($table);
    if($cresults == "NO_RECORDS_FOUND"){
        echo("NO_PRODUCT_FOUND");
    }
    else{
        foreach($cresults as $brands){
            echo('<option value="'.$brands["brand_id"].'">'.$brands["brand_name"].'</option>');
        }


    }

   
}

    public function subcategorySearchDrop(){
        $table = "subcategory";
        $cresults = $this->getAllrecords($table);
        if($cresults == "NO_RECORDS_FOUND"){
            echo("NO_PRODUCT_FOUND");
        }
        else{
            foreach($cresults as $category){
                echo('<option value="'.$category["subcategory_id"].'">'.$category["subcategory_name"].'</option>');
            }


        }

       
    }

// Brand side bar on shop.php
    // public function brandsDropdown(){
    //     $table = "brands";
    //     $cresults = $this->getAllrecords($table);
    //     foreach($cresults as $brands){
    //         echo(' <div class="panel panel-default">'.
    //         '<div class="panel-heading" role="tab" id="headingTwo">'.
    //         '<h4 class="panel-title">'.
    //         ' <a href="http://localhost/shoppnReo/shop.php?bran_id='.$brands["brand_id"].'" style="color:black" >'.$brands["brand_name"].'</a>'.
    //         ' </h4>'.
    //         '</div>'
    //         .'</div>');
    //     }

    // }


// Display the brand card in brands.php.
public function brandCard(){
    $table = "brands";
    $results = $this->getSixrecords($table);
    foreach($results as $sbtable){
        
            echo('<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">'.
            '<a href="http://localhost/drive/brands.php?brand='.$sbtable["brand_id"].'" class="popular-category h-100">'.
               '<span class="caption mb-2 d-block">'.$sbtable["brand_name"].'</span>'.
             '</a>'.
           '</div>');
    }
}

// Display the category  card in category.php.
public function categoryCard(){
    $table = "category";
    $results = $this->getSixrecords($table);
    foreach($results as $sbtable){
        
            echo('<div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">'.
           '<a href="http://localhost/drive/category.php?category='.$sbtable["category_id"].'" class="popular-category h-100">'.
              '<span class="caption mb-2 d-block">'.$sbtable["category_name"].'</span>'.
            '</a>'.
          '</div>');
    }
}


//  Display the brand card on the index product.

//Brand dropdown in the header....
// public function BrandNavdrop(){
//     $table = "brands";
//     $sresults = $this->getSomerecords($table);
//     foreach($sresults as $brands){
//         echo('<li><a  href="http://localhost/shoppnReo/brands.php?brand_id='.$brands["brand_id"].'">'.$brands["brand_name"].'</a>');
//     }


// }

//Category dropdown in the header....
// public function CatNavdrop(){
//     $table = "categories";
//     $sresults = $this->getSomerecords($table);
//     foreach($sresults as $category){
//         echo('<li><a  href="http://localhost/shoppnReo/category.php?categid='.$category["cat_id"].'">'.$category["cat_name"].'</a>');
//     }


// }


// Display products card 
public function productCard(){
    $table = "products";
    $results = $this->getAllrecords($table);
    foreach($results as $sbtable){
        
            echo('<div class="d-block d-md-flex listing vertical">'.
            '<a href="listings-single.php" class="img d-block" style="background-image: url('.$sbtable["product_mainimg"].')"></a>'.
            '<div class="lh-content">'.
              '<h3><a href="listings-single.php">'.$sbtable["product_title"].'</a></h3>'.
              '<address>'.$sbtable["post_time"].'</address>'.
              '<p class="mb-0">'.
              '<span class="review">$'.$sbtable["product_price"].'.00</span>'.
              '</p>'.
            '</div>'.
          '</div>');
    }
}


// Restricted product card to 9 
public function limitedproductCard(){
    $table = "products";
    $results = $this->getThreerecords($table);
    foreach($results as $sbtable){
        
            echo(' <div class="d-block d-md-flex listing">'.
            '<a href="listings-single.html" class="img d-block" style="background-image: url('.$sbtable["product_mainimg"].')"></a>'.
            '<div class="lh-content">'.
              '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
              '<h3><a href="http://localhost/drive/listings-single.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</a></h3>'.
              '<address>'.$sbtable["post_time"].'</address>'.
              '<p class="mb-0">'.
              '<span class="review">$'.$sbtable["product_price"].'.00</span>'.
              '</p>'.
            '</div>'.
          '</div>');
    }
}

// Products under specified brand
    public function categoryproductDisplay($bran_id){
        $result= $this->categoryProduct($bran_id);

        if($result == "PRODUCTS_NOT_FOUND"){
            echo("NO_PRODUCT_FOUND_UNDER_CATEGORY");
        }
        else{
            foreach($result as $categoryProduct){
                echo('<div class="col-lg-6">'.
                
                '<div class="d-block d-md-flex listing vertical">'.
                  '<a href="#" class="img d-block" style="background-image: url('.$categoryProduct["product_mainimg"].')"></a>'.
                  '<div class="lh-content">'.
                    '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                    '<h3><a href="#">'.$categoryProduct["product_title"].'</a></h3>'.
                    '<address>'.$categoryProduct["post_time"].'</address>'.
                    '<p class="mb-0">'.
                   '<span class="review">$'.$categoryProduct["product_price"].'.00</span>'.
             '</p>'.
                  '</div>'.
                '</div>'.

              '</div>');
            }
        }
        
    }

    // Products under specified brand
    public function brandsproductDisplay($bran_id){
        $result= $this->brandsProduct($bran_id);

        if($result == "PRODUCTS_NOT_FOUND"){
            echo("NO_PRODUCT_FOUND_UNDER_BRAND");
        }
        else{
            foreach($result as $brandsProduct){
                echo('<div class="col-lg-6">'.
                
                '<div class="d-block d-md-flex listing vertical">'.
                  '<a href="#" class="img d-block" style="background-image: url('.$brandsProduct["product_mainimg"].')"></a>'.
                  '<div class="lh-content">'.
                    '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                    '<h3><a href="#">'.$brandsProduct["product_title"].'</a></h3>'.
                    '<address>Posted time: '.$brandsProduct["post_time"].'</address>'.
                    '<p class="mb-0">'.
                     '<span class="review">$'.$brandsProduct["product_price"].'.00</span>'.
                      '</p>'.
                  '</div>'.
                '</div>'.

              '</div>');
            }
        }
        
    }

    public function searchproductDisplay($bran_id){
        $result= $this->brandsProduct($bran_id);

        if($result == "PRODUCTS_NOT_FOUND"){
            echo("NO_PRODUCT_FOUND_UNDER_BRAND");
        }
        else{
            foreach($result as $brandsProduct){
                echo('<div class="col-lg-6">'.
                
                '<div class="d-block d-md-flex listing vertical">'.
                  '<a href="#" class="img d-block" style="background-image: url('.$brandsProduct["product_mainimg"].')"></a>'.
                  '<div class="lh-content">'.
                    '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                    '<h3><a href="#">'.$brandsProduct["product_title"].'</a></h3>'.
                    '<address>Posted time: '.$brandsProduct["post_time"].'</address>'.
                    '<p class="mb-0">'.
                     '<span class="review">$'.$brandsProduct["product_price"].'.00</span>'.
                      '</p>'.
                  '</div>'.
                '</div>'.

              '</div>');
            }
        }
        
    }


    public function brandssearchCardDisplay($query_val,$category){
        // $table = "products";
                    $results = $this->brandsSearchQuery($query_val,$category);
                
                    if($results == "NO_PRODUCT_FOUND"){
                        echo("NO_PRODUCT_FOUND");
                    }
                    else{
                        foreach($results as $brandSearch){
                        
                            echo('<div class="col-lg-6">'.
                        
                            '<div class="d-block d-md-flex listing vertical">'.
                              '<a href="#" class="img d-block" style="background-image: url('.$brandSearch["product_mainimg"].')"></a>'.
                              '<div class="lh-content">'.
                               
                                '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                                '<h3><a href="#">'.$brandSearch["product_title"].'</a></h3>'.
                                '<address>'.$brandSearch["post_time"].'</address>'.
                                '<p class="mb-0">'.
                                  '<span class="review">$'.$brandSearch["product_price"].'.00</span>'.
                                '</p>'.
                              '</div>'.
                            '</div>'.
            
                          '</div>');
                    }
                
                    }
                }
        

    public function catsearchCardDisplay($query_val,$category){
// $table = "products";
            $results = $this->categorySearchQuery($query_val,$category);
        
            if($results == "NO_PRODUCT_FOUND"){
                echo("NO_PRODUCT_FOUND");
            }
            else{
                foreach($results as $subcatSearch){
                
                    echo('<div class="col-lg-6">'.
                
                    '<div class="d-block d-md-flex listing vertical">'.
                      '<a href="#" class="img d-block" style="background-image: url('.$subcatSearch["product_mainimg"].')"></a>'.
                      '<div class="lh-content">'.
                        '<span class="category">Cars &amp; Vehicles</span>'.
                        '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                        '<h3><a href="#">'.$subcatSearch["product_title"].'</a></h3>'.
                        '<address>'.$subcatSearch["post_time"].'</address>'.
                        '<p class="mb-0">'.
                          '<span class="icon-star text-warning"></span>'.
                          '<span class="icon-star text-warning"></span>'.
                          '<span class="icon-star text-warning"></span>'.
                          '<span class="icon-star text-warning"></span>'.
                          '<span class="icon-star text-secondary"></span>'.
                          '<span class="review">(3 Reviews)</span>'.
                        '</p>'.
                      '</div>'.
                    '</div>'.
    
                  '</div>');
            }
        
            }
        }


        public function catseaCardDisplay($query_val,$category){
            // $table = "products";
                        $results = $this->categorySearchQuery($query_val,$category);
                    
                        if($results == "NO_PRODUCT_FOUND"){
                            echo("NO_PRODUCT_FOUND");
                        }
                        else{
                            foreach($results as $subcatSearch){
                            
                                echo('<div class="col-lg-3">'.
                            
                                '<div class="d-block d-md-flex listing vertical">'.
                                  '<a href="#" class="img d-block" style="background-image: url('.$subcatSearch["product_mainimg"].')"></a>'.
                                  '<div class="lh-content">'.
                                    '<span class="category">Cars &amp; Vehicles</span>'.
                                    '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                                    '<h3><a href="#">'.$subcatSearch["product_title"].'</a></h3>'.
                                    '<address>'.$subcatSearch["post_time"].'</address>'.
                                    '<p class="mb-0">'.
                                      '<span class="icon-star text-warning"></span>'.
                                      '<span class="icon-star text-warning"></span>'.
                                      '<span class="icon-star text-warning"></span>'.
                                      '<span class="icon-star text-warning"></span>'.
                                      '<span class="icon-star text-secondary"></span>'.
                                      '<span class="review">(3 Reviews)</span>'.
                                    '</p>'.
                                  '</div>'.
                                '</div>'.
                
                              '</div>');
                        }
                    
                        }
                    }


                    public function searchCardDisplay($query_val){
                            // $table = "products";
                            $results = $this->searchQuery($query_val);
                        
                            if($results == "NO_PRODUCT_FOUND"){
                                echo("NO_PRODUCT_FOUND");
                            }
                            else{
                                foreach($results as $query){
                                
                                    echo('<div class="col-lg-3">'.
                            
                                    '<div class="d-block d-md-flex listing vertical">'.
                                      '<a href="#" class="img d-block" style="background-image: url('.$query["product_mainimg"].')"></a>'.
                                      '<div class="lh-content">'.
                                        '<h3><a href="#">'.$query["product_title"].'</a></h3>'.
                                        '<address>'.$query["post_time"].'</address>'.
                                        '<p class="mb-0">'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-secondary"></span>'.
                                          '<span class="review">$'.$query["product_price"].'.00</span>'.
                                        '</p>'.
                                      '</div>'.
                                    '</div>'.
                    
                                  '</div>');
                            }
                        
                            }
                        }

                        public function productListingCard(){
                            $table = "products";
                            $results = $this->getAllrecords($table);
                            foreach($results as $products){
                                
                                    echo('<div class="col-lg-6">'.

                                    '<div class="d-block d-md-flex listing vertical">'.
                                     '<a href="#" class="img d-block" style="background-image: url('.$products["product_mainimg"].')"></a>'.
                                      '<div class="lh-content">'.
                                        '<span class="category">'.$products["product_title"].'</span>'.
                                        '<a href="#" class="bookmark"><span class="icon-heart"></span></a>'.
                                        '<h3><a href="#">'.$products["product_title"].'</a></h3>'.
                                       '<address>'.$products["post_time"].'</address>'.
                                        '<p class="mb-0">'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-warning"></span>'.
                                          '<span class="icon-star text-secondary"></span>'.
                                          '<span class="review">$'.$products["product_price"].'.00</span>'.
                                        '</p>'.
                                      '</div>'.
                                    '</div>'.
                    
                                  '</div>');
                            }
                        }
                        

// Ordered restricted number of products
// public function limitedproductCardOrdered(){
//     $table = "products";
//     $results = $this->getSomerecordsOrdered($table);
//     foreach($results as $sbtable){
        
//             echo('<div class="col-md-4 text-center">'.
//                 '<div class="product-entry">'.
//                 '<div class="product-img" style="background-image: url('.$sbtable["product_image"].');">'.
//                 '<p class="tag"><span class="sale">Sale</span></p>'.
//                 '<div class="cart">'.
//                 '<p>'.
//                 '<span class="addtocart"><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$sbtable["product_id"].'"><i class="icon-shopping-cart"></i></a></span>'.
//                 '</p>'.
//         '</div>'.
//         '</div>'.
//         '<div class="desc">'.
//         '<h3><a href="http://localhost/shoppnReo/product-details.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</h3>'.
//         '<p class="price"><span> GHC '.$sbtable["product_price"].'</p>'.
//         '</div>'.
//         '</div>'.
//         '</div>');
//     }
// }


// Affordable Products {Products below 200 cedis}
// public function affordProductCard(){
//     $table = "products";
//     $results = $this->getOrderedProduct($table);
//     foreach($results as $sbtable){
        
//             echo('<div class="col-md-4 text-center">'.
//                 '<div class="product-entry">'.
//                 '<div class="product-img" style="background-image: url('.$sbtable["product_image"].');">'.
//                 '<p class="tag"><span class="sale">Sale</span></p>'.
//                 '<div class="cart">'.
//                 '<p>'.
//                 '<span class="addtocart"><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$sbtable["product_id"].'"><i class="icon-shopping-cart"></i></a></span>'.
//                 '</p>'.
//         '</div>'.
//         '</div>'.
//         '<div class="desc">'.
//         '<h3><a href="http://localhost/shoppnReo/product-details.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</h3>'.
//         '<p class="price"><span> GHC '.$sbtable["product_price"].'</p>'.
//         '</div>'.
//         '</div>'.
//         '</div>');
//     }
// }

// Single Product Function  
    // public function singleproductDisplay($pid){
    //     $result= $this->getOneproduct($pid);
    //     foreach($result as $proddis){
            
    //         echo('  <div class="row">'.

    //         ' <div class="col-md-5">'.
    //         ' <div class="product-entry">'.
    //         ' <div class="product-img" style="background-image: url('.$proddis["product_image"].');">'.
    //         ' <p class="tag"><span class="sale">Sale</span></p>'.
    //         '</div>'.
    //         '</div>'.
    //     '</div>'.
    //     ' <div class="col-md-7">'.
    //     '<div class="desc">'.
    //     '<h3>'.$proddis["product_title"].'</h3>'.
    //     '<p class="price"> GHC  <span>'.$proddis["product_price"].'</span> </p>'.
    //     ' <p>'.$proddis["product_desc"].'</p>'.
    //     '<p><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$proddis["product_id"].'" class="btn btn-primary btn-addtocart" ><i class="icon-shopping-cart"></i> Add to Cart</a></p>'.
    //     '</div>'.
    //     '</div>'.
    //     '</div>');
    //     }
    // }


    // Products under specified brand
    // public function brandproductDisplay($bran_id){
    //     $result= $this->brandsProduct($bran_id);

    //     if($result == "PRODUCTS_NOT_FOUND"){
    //         echo("NO_PRODUCT_FOUND_UNDER_BRAND");
    //     }
    //     else{
    //         foreach($result as $sbtable){
    //             echo('<div class="col-md-4 text-center">'.
    //             '<div class="product-entry">'.
    //             '<div class="product-img" style="background-image: url('.$sbtable["product_image"].');">'.
    //             '<p class="tag"><span class="sale">Sale</span></p>'.
    //             '<div class="cart">'.
    //             '<p>'.
    //             '<span class="addtocart"><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$sbtable["product_id"].'"><i class="icon-shopping-cart"></i></a></span>'.
    //             '</p>'.
    //     '</div>'.
    //     '</div>'.
    //     '<div class="desc">'.
    //     '<h3><a href="http://localhost/shoppnReo/product-details.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</h3>'.
    //     '<p class="price"><span> GHC '.$sbtable["product_price"].'</p>'.
    //     '</div>'.
    //     '</div>'.
    //     '</div>');
    //         }
    //     }
        
    // }


    // Products under specified brand
    // public function categoryproductDisplay($bran_id){
    //     $result= $this->categoryProduct($bran_id);

    //     if($result == "PRODUCTS_NOT_FOUND"){
    //         echo("NO_PRODUCT_FOUND_UNDER_CATEGORY");
    //     }
    //     else{
    //         foreach($result as $sbtable){
    //             echo('<div class="col-md-4 text-center">'.
    //             '<div class="product-entry">'.
    //             '<div class="product-img" style="background-image: url('.$sbtable["product_image"].');">'.
    //             '<p class="tag"><span class="sale">Sale</span></p>'.
    //             '<div class="cart">'.
    //             '<p>'.
    //             '<span class="addtocart"><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$sbtable["product_id"].'"><i class="icon-shopping-cart"></i></a></span>'.
    //             '</p>'.
    //     '</div>'.
    //     '</div>'.
    //     '<div class="desc">'.
    //     '<h3><a href="http://localhost/shoppnReo/product-details.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</h3>'.
    //     '<p class="price"><span> GHC '.$sbtable["product_price"].'</p>'.
    //     '</div>'.
    //     '</div>'.
    //     '</div>');
    //         }
    //     }
        
    // }



//Shop dropdown in the header....
// public function cartDisplay(){
//     // $table = "cart";
//     $sresults = $this->getCartDisplay();
//     if($sresults == "CART_EMPTY"){
//         echo("No product in carts currently");
//     }
//     else{
//         foreach($sresults as $cart){
//             echo('<div class="product-cart">'.
//             '<div class="one-forth">'.
//             '<div class="product-img" style="background-image: url('.$cart["product_image"].');">'
//            .'</div>'.
//            '<div class="display-tc">'.
//            '<h3>'.$cart["product_title"].'</h3>'.
//            '</div>'.
//         '</div>'.
//         '<div class="one-eight text-center">'.
//             '<div class="display-tc">'.
//             '<span class="price"> GHC '.$cart["product_price"].'</span>'.
//            '</div>'.
//         '</div>'.
//         '<div class="one-eight text-center">'.
//             '<div class="display-tc">'.
//             '<form method="GET" action="controller/process.php">'.
//                 '<input type="number" id="cart_qty" name="quantity" class="form-control input-number text-center" value="'.$cart["qty"].'" min="1" max="100">'.
//                 '<input type="hidden" name="product_id" id="prod_id" value="'.$cart["product_id"].'">'.
//                 '<input type="submit" name="update" value="UpdateQty">'.
//             '</form>'.
//             '</div>'.
//         '</div>'.
//         '<div class="one-eight text-center">'.
//         '<div class="display-tc">'.
//             '<span class="price">'.$cart["product_price"] * $cart["qty"] .'</span>'.
//         '</div>'.
//         '</div>'.
//         '<div class="one-eight text-center">'.
//         '<div class="display-tc">'.
//         '<a href="http://localhost/shoppnReo/controller/process.php?cpdid='.$cart["product_id"].'" class="closed"></a>'.
//         '</div>'.
//         '</div>'.


//         '</div>');
//         }
//     }
// }

// '<p><a href="http://localhost/shoppnReo/checkout.php?pcid='.$cart["product_id"].'" class="btn btn-primary btn-addtocart"  > Proceed to checkout</a></p>'


// Cart Total
// public function cartTotalm(){
//     $result= $this->cartTotal();
//     echo($result);
// }



// // Cart Discount
// public function cartDiscount(){
//     $result= $this->cartDiscountAccum();
//     echo($result);
// }


// // Cart Tax
// public function cartTax(){
//     $result= $this->cartTaxAccum();
//     echo($result);
// }


// // Update Cart Quantity
// public function updateQuantity($pid,$qty){
//     $result= $this->updateCart($pid,$qty);
//     echo($result);
// }


// public function searchCardDisplay($query_val){
//     // $table = "products";
//     $results = $this->searchQuery($query_val);

//     if($results == "NO_PRODUCT_FOUND"){
//         echo("NO_PRODUCT_FOUND");
//     }
//     else{
//         foreach($results as $sbtable){
        
//             echo('<div class="col-md-4 text-center">'.
//                 '<div class="product-entry">'.
//                 '<div class="product-img" style="background-image: url('.$sbtable["product_image"].');">'.
//                 '<p class="tag"><span class="sale">Sale</span></p>'.
//                 '<div class="cart">'.
//                 '<p>'.
//                 '<span class="addtocart"><a href="http://localhost/shoppnReo/controller/process.php?pcid='.$sbtable["product_id"].'"><i class="icon-shopping-cart"></i></a></span>'.
//                 '</p>'.
//         '</div>'.
//         '</div>'.
//         '<div class="desc">'.
//         '<h3><a href="http://localhost/shoppnReo/product-details.php?pvid='.$sbtable["product_id"].'">'.$sbtable["product_title"].'</h3>'.
//         '<p class="price"><span> GHC '.$sbtable["product_price"].'</p>'.
//         '</div>'.
//         '</div>'.
//         '</div>');
//     }

//     }
// }


   

    


}

// $obj = new Processing();
// echo($obj->categoryDropdown());



?>