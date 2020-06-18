<?php

// Classes Included.
include_once("../model/customerOperations.php");
include_once("../model/databaseOperations.php");
include_once("../model/adminOperations.php");


############################################################
##################### Customer Controller ###################
############################################################

// Customer Registration Controller

    if(isset($_GET['user_rname']) && isset($_GET['user_remail'])){
        $user = new Customer();
        $result= $user->createUserAccount($_GET['user_rname'],$_GET['user_remail'],$_GET['user_rpassword']);
        echo($result);
        if($result == "REGISTRATION_SUCCESS"){
            header("Location:http://localhost/drive/login.php");
        }
        else if($result == "EMAIL_ALREADY_EXISTS"){
            header("Location:http://localhost/drive/register.php?msg=EMAIL_ALREADY_EXISTS");
            
        }
       
        
    }


//Customer Login Controller
if(isset($_GET['log_email']) && isset($_GET['log_password'])){
    $user = new Customer();
    $result= $user->customerLogin($_GET['log_email'],$_GET['log_password']);
    echo($result);

    if($result == "LOGIN_SUCCESSFUL"){
        header("Location:http://localhost/drive/index.php");
    }
    else if($result == "NOT_REGISTERED"){
        header("Location:http://localhost/drive/login.php?msg=NOT_REGISTERED");
        
    }
    else if($result == "PASSWORD_MISMATCH"){
        header("Location:http://localhost/drive/login.php?msg=PASSWORD_MISMATCH");
       
    }
}

//Customer General Update Controller
if(isset($_POST['customer_fullname']) && isset($_POST['customer_age']) && isset($_POST['customer_gender'])&& isset($_POST['customer_country'])&& isset($_POST['customer_city'])&& isset($_POST['phone_details'])&& isset($_POST['address'])){
    $user = new Customer();
    // $result= $user->custGeneralUpdate($_SESSION['customer_id'],$_POST['customer_fullname'],$_POST['customer_age'],$_POST['customer_gender'],$_POST['customer_country'], $_POST['customer_city'], $_POST['phone_details'], $_POST['address']);
}

// Customer Email Update Controller
// if(isset($_POST['customer_email'])){
//     $user = new Customer();
//     $result= $user->custEmailUpdate($_SESSION['customer_id'],$_POST['customer_email']);
// }

// Customer Password Update Controller
if(isset($_POST['customer_password1'])){
    $user = new Customer();
    $result= $user->custPassUpdate($_SESSION['customer_id'],$_POST['customer_password1']);
}

// Customer Log out 




//Add to cart 
if(isset($_POST['quantity']) && isset($_GET['product_id'])){
    $queue = new dbConnection();
    // $result= $queue->addProductCart($_GET['product_id'],$_POST['quantity']);
    echo($result);
}

############################################################
##################### Admin Controller ###################
############################################################

//Admin Login Controller
if(isset($_POST['admin_log_email']) && isset($_POST['admin_log_pass'])){
    $user = new Admin();
    $result= $user->adminLogin($_POST['admin_log_email'],$_POST['admin_log_pass']);
    echo($result);
}

//Admin Registration Controller
if(isset($_POST['admin_email']) && isset($_POST['admin_password1'])){
    $user = new Admin();
    $result= $user->createAdminAccount($_POST['admin_fullname'],$_POST['admin_email'],$_POST['admin_password1'],$_POST['security_code']);
    echo($result);
}

//Admin General Update Controller
if(isset($_POST['admin_up_name']) && isset($_POST['admin_up_phone'])){
    $user = new Admin();
    $result= $user->adminGenenralUpdate($_SESSION["admin_id"],$_POST['admin_up_name'],$_POST['admin_up_phone'],$_POST['admin_address'],$_POST['admin_security_code']);
    echo($result);
}


//Admin Email Update Controller
if(isset($_POST['admin_up_email'])){
    $user = new Admin();
    $result= $user->adminEmailUpdate($_SESSION["admin_id"],$_POST['admin_up_email']);
    echo($result);
}

//Admin Password Update Controller
if(isset($_POST['admin_up_email'])){
    $user = new Admin();
    $result= $user->adminSecurityUpdate($_SESSION["admin_id"],$_POST['admin_up_email'],$_POST['admin_up_code']);
    echo($result);
}


###########################################################
##################### Brands  Insertion  Controller #######
############################################################
if(isset($_POST['brand_name'])){
    $user = new Admin();
    // $result = $user->createBrand($_POST['brand_name']);
    echo($result);

}

if(isset($_GET['brand_id']) && $_GET['brand_name']){
    $product = new Admin();
    $result = $product->UpdateBrand($_GET['brand_id'],$_GET['brand_name']);
    if($result == "BRAND_DETAILS_UPDATED"){
        header("Location:http://localhost/shoppnReo/admin/pages/brand.php");

    }
    else{
        header("Location:http://localhost/shoppnReo/admin/pages/brand.php");
    }
    
}



// Delete Category
if(isset($_GET['brandelid'])){
    $user = new Admin();
    $result= $user->DeleteBrand($_GET['brandelid']);
    echo($result);
    if($result == "BRAND_DELETED"){
        header("Location: http://localhost/shoppnReo/admin/pages/brand.php");
        die();
    }
    if($result =""){
        return "BRAND_DOES_NOT_EXIST";
    }
}






############################################################
##################### Category  Insertion  Controller #######
############################################################
if(isset($_POST['cat_name'])){
    $user = new Admin();
    // $result = $user->createCategory($_POST['cat_name']);
    echo($result);

}

if(isset($_GET['cated_id']) && $_GET['cated_name']){
    $product = new Admin();
    $result = $product->UpdateCategory($_GET['cated_id'],$_GET['cated_name']);
    if($result == "CATEGORY_UPDATED"){
        header("Location:http://localhost/shoppnReo/admin/pages/category.php");

    }
    else{
        // header("Location:http://localhost/shoppnReo/admin/pages/category.php");
    }
    
}




// Delete Category
if(isset($_GET['catdelid'])){
    $user = new Admin();
    $result= $user->DeleteCategory($_GET['catdelid']);
    echo($result);
    if($result == "CATEGORY_DELETED"){
        header("Location: http://localhost/shoppnReo/admin/pages/category.php");
        die();
    }
    if($result =""){
        return "CATEGORY_DOES_NOT_EXIST";
    }
}




############################################################
##################### Product  Deletion  Controller #######
############################################################


if(isset($_GET['proddelid'])){
    $user = new Admin();
    $result= $user->DeleteProduct($_GET['proddelid']);
    echo($result);
    if($result == "PRODUCT_DELETED"){
        header("Location: http://localhost/shoppnReo/admin/pages/product.php");
        die();
    }
    if($result =""){
        return "PRODUCT_DOES_NOT_EXIST";
    }
}




############################################################
##################### Product Insertion  Controller #######
############################################################
if(isset($_POST['product_name'])){
    $user = new Admin();
    if (isset($_FILES['product_image'])) {
        // Get image name
        $image = $_FILES['product_image']['name'];
        
        // image file directory
          $target = "../images/".basename($image);
          $temp_name = $_FILES['product_image']['tmp_name'];
          $path = 'images/'.basename($image);

        if (file_exists($target)) {
            // echo "Sorry, file already exists.";
            // return 0;

            header("Location: http://localhost/shoppnReo/admin/pages/product.php");

        }else{
           move_uploaded_file($temp_name,$target);
        //    echo "Congratulations! File Uploaded Successfully.";
        // $result = $user->createProduct($_POST['prod_cat'],$_POST['prod_bran'],$_POST['product_name'],$_POST['product_price'],$_POST['product_desc'],$path,$_POST['product_keywords']);
        return 1;
        header("Location: http://localhost/shoppnReo/admin/pages/product.php");

       }
    }
    
    // echo($result);

}



    if(isset($_GET['pcid'])){
        $product = new databaseOperation ();
        $result = $product->addProductCart($_GET['pcid']);
        // var_dump($result);
        // echo($result);

        if($result == "PRODUCT_ADDED_TO_CART"){
            header("Location:http://localhost/shoppnReo/cart.php?pcid=".$_GET['pcid']);

        }
        else if($result == "PRODUCT_EXIST_IN_CART"){
            header("Location:http://localhost/shoppnReo/index.php");

        }
    }

    if(isset($_GET['cpdid'])){
        $product = new databaseOperation();
        $result = $product->DeleteProdCart($_GET['cpdid']);
        if($result == "ITEM_DELETED"){
            header("Location:http://localhost/shoppnReo/cart.php");
        }else{
            header("Location:http://localhost/shoppnReo/shop.php");
        }
    }


    if(isset($_GET['quantity']) && $_GET['product_id']){
        $product = new databaseOperation();
        $result = $product->updateCart($_GET['product_id'],$_GET['quantity']);
        if($result == "PRODUCT_QUANTITY_UPDATED"){
            header("Location:http://localhost/shoppnReo/cart.php");

        }
        
    }


    // if(isset($_GET['search_query'])){
    //     $product = new databaseOperation();
    //     $result = $product->searchQuery($_GET['search_query']);
        
        
    // }

    if(isset($_POST['browser_firstname'])){
        $user = new Customer();
        $result = $user->MessageCreate($_POST['browser_firstname'],$_POST['browser_surname'],$_POST['browser_email'],$_POST['browser_subject'],$_POST['browser_message']);
        echo($result);
    
    }







?> 