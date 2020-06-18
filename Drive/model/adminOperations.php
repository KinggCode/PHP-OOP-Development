<?php
include_once('../database/db_connect.php');


class Admin extends dbConnection{

     // To prevent the platform from sql injection ....  KEEP THIS PROPERTY : emailExists PRIVATE
     private function emailExists($email){
        $stmt = $this->dbconnect()->prepare("SELECT admin_id FROM admin WHERE admin_email = ? ");
        $stmt->bind_param("s",$email);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            // return 1;
            return "EMAIL_ALREADY_EXIST";
        }
        else{
            return 0;
        }
    }

    public function createAdminAccount($af,$ae,$ap,$sc){
    // To protect your application from sql attack you can user 
    // prepares statement
    if($this->emailExists($ae)){
        return "ADMINSTRATOR_ALREADY_EXISTS";
    }
    else{
        $stmt = $this->dbconnect()->prepare("SELECT * FROM admin ");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 2 ){
            return "ADMIN_LIST_FULL";
        }else{
            $password = password_hash($ap,PASSWORD_BCRYPT,["cost"=>8]);
            $stmt = $this->dbconnect()->prepare("INSERT INTO admin(admin_fullname,admin_email,admin_password,security_code) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss",$af,$ae,$password,$sc);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                // return $this->dbconnect()->insert_id;
                return "ADMIN_REGISTRATION_SUCCESSFUL";
            }else{
                return 0;
            }
        }
        
    }
}

    public function adminLogin($email,$password){
        $stmt = $this->dbconnect()->prepare("SELECT admin_id,admin_fullname,admin_email,security_code,admin_password FROM admin WHERE admin_email = ? ");
        $stmt->bind_param("s",$email);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows < 1){
            // return 1;
            return "NOT_REGISTERED";
        }
        else{
            $row = $result->fetch_assoc();
                if(password_verify($password,$row["admin_password"])){
                    session_start();
                    $_SESSION["admin_id"] = $row["admin_id"];
                    $_SESSION["admin_fullname"] = $row["admin_fullname"];
                    $_SESSION["admin_email"] = $row["admin_email"];
                    $_SESSION["admin_code"] = $row["security_code"];
                    
                    return "LOGGED_IN";
                   
            }else{
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }


##########################################################
##################### Admin General Update  Method #######
##########################################################
public function adminGenenralUpdate($aid,$afn,$aage,$agen){
    $stmt = $this->dbconnect()->prepare("SELECT admin_fullname FROM admin WHERE admin_id = ?");
    $stmt->bind_param("s",$aid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();

    if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("UPDATE admin SET admin_fullname = ?, admin_age = ?, admin_gender = ?  WHERE admin_id = $aid");
            $stmt->bind_param("sss",$afn,$aage,$agen);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "ADMIN_DETAILS_UPDATED";
            }else{
                return "SOME_ERROR";
        }
        
        
    }else{
        return "ADMIN_DOES_NOT_EXIST";
    }
}


##########################################################
##################### Admin Email Update  Method #######
##########################################################
public function adminEmailUpdate($aid,$ae){
    $stmt = $this->dbconnect()->prepare("SELECT admin_fullname FROM admin WHERE admin_id = ?");
    $stmt->bind_param("s",$aid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();

    if($this->emailExists($ae)){
        return "EMAIL_ALREADY_IN_USE";
    }else{
        if($result->num_rows == 1){
            if($ae !== ""){
                $stmt = $this->dbconnect()->prepare("UPDATE admin SET admin_email = ?  WHERE admin_id = $aid");
            $stmt->bind_param("s",$ae);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "ADMIN_EMAIL_UPDATED";
            }else{
                return "SOME_ERROR";
        }

        }
        else{
            return "CANNOT_HAVE_EMPTY_EMAIL";
        }
            
        
        
    }else{
        return "ADMIN_DOES_NOT_EXIST";
    }
    }
    
}

##########################################################
##################### Admin Security Update  Method ######
##########################################################
public function adminSecurityUpdate($aid,$apwd,$asc){
    $stmt = $this->dbconnect()->prepare("SELECT admin_fullname FROM admin WHERE admin_id = ?");
    $stmt->bind_param("s",$aid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();

    if($result->num_rows == 1){
            $pwd = password_hash($apwd,PASSWORD_BCRYPT,["cost"=>8]);
            $stmt = $this->dbconnect()->prepare("UPDATE admin SET admin_password = ?,security_code = ?  WHERE admin_id = $aid");
            $stmt->bind_param("ss",$pwd,$asc);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "ADMIN_SECURITY_DETAILS_UPDATED";
            }else{
                return "SOME_ERROR";
        }
        
    }else{
        return "ADMIN_DOES_NOT_EXIST";
    }
    
    
}


######## Admin External Functions #########################

###########################################################
#####################  Brands Functions #####################
############################################################
public function checkBrand($brand_name){
    $stmt = $this->dbconnect()->prepare("SELECT brand_id FROM brands WHERE brand_name = ? ");
    $stmt->bind_param("s",$brand_name);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        // return 1;
        return "BRAND_EXIST";
    }
    else{
        return 0;
    }
}

// Brand create function
public function createBrand($bn,$bnimg){
        if($this->checkBrand($bn)){
            return "BRAND_ALREADY_EXIST";
        }else{
            $stmt = $this->dbconnect()->prepare("INSERT INTO brands(brand_name,brand_image) VALUES(?,?)");
            $stmt->bind_param("ss",$bn,$bnimg);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                // return $this->dbconnect()->insert_id;
                return "BRAND_CREATED";
            }else{
                return 0;
            }
        }
    }

    
// Brands Update funtion
public function UpdateBrand($bid,$bn){
        $stmt = $this->dbconnect()->prepare("SELECT brand_name FROM brands WHERE brand_id = ?");
        $stmt->bind_param("s",$bid);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            if($this->checkBrand($bn)){
                return "BRAND_ALREADY_EXIST";
            }
            else{
                $stmt = $this->dbconnect()->prepare("UPDATE brands SET brand_name = ? WHERE brand_id = $bid");
                $stmt->bind_param("s",$bn);
                $result = $stmt->execute() or die($this->dbconnect()->error);
                if($result){
                    return "BRAND_DETAILS_UPDATED";
                }else{
                    return 0;
            }
            }
            
        }

    }

//Brand Delet function
    public function DeleteBrand($brand_id){
        $stmt = $this->dbconnect()->prepare("SELECT brand_name FROM brands WHERE brand_id = ?");
        $stmt->bind_param("s",$brand_id);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("DELETE FROM brands WHERE brand_id = $brand_id");
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "BRAND_DELETED";
            }else{
                return 0;
        }
        }else{
        return "BRAND_DOES_NOT_EXIST";
        }
    }


    
############################################################
##################### Category Functions ###################
############################################################
    private function categoryDuplicateCheck($cat_name){
        $stmt = $this->dbconnect()->prepare("SELECT category_id FROM category WHERE category_name = ?");
        $stmt->bind_param("s",$cat_name);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            // return 1;
            return "CATEGORY_EXIST";
        }
        else{
            return 0;
        }
    }


    public function createCategory($category_name,$category_image){
        if($this->categoryDuplicateCheck($category_name)){
            return "CATEGORY_ALREADY_EXIST";
        }
            else{
           
            $stmt = $this->dbconnect()->prepare("INSERT INTO category(category_name,category_image) VALUES(?,?)");
            $stmt->bind_param("ss",$category_name,$category_image);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                // return $this->dbconnect()->insert_id;
                return "CATEGORY_CREATED";
            }else{
                return 0;
            }
        }
    }


    public function UpdateCategory($cat_id,$cat_name){
        $stmt = $this->dbconnect()->prepare("SELECT category_name FROM category WHERE category_id = ?");
        $stmt->bind_param("s",$cat_id);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            if($this->categoryDuplicateCheck($cat_name)){
                return "CATEGORY_ALREADY_EXIST";
            }
            else{
                $stmt = $this->dbconnect()->prepare("UPDATE category SET category_name = ? WHERE category_id = $cat_id");
                $stmt->bind_param("s",$cat_name);
                $result = $stmt->execute() or die($this->dbconnect()->error);
                if($result){
                    return "CATEGORY_UPDATED";
                }else{
                    return 0;
            }
            }
            
        }else{
            return "CATEGORY_DOES_NOT_EXIST";
        }

    }

    public function DeleteCategory($cat_id){
        $stmt = $this->dbconnect()->prepare("SELECT category_name FROM category WHERE category_id = ?");
        $stmt->bind_param("s",$cat_id);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("DELETE FROM category WHERE category_id = $cat_id");
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "CATEGORY_DELETED";
            }else{
                return "SOME_ERROR";
        }
        }else{
        return "CATEGORY_DOES_NOT_EXIST";
        }
    }


############################################################
##################### Subcategory Functions ###################
############################################################
private function subcategoryDuplicateCheck($cat_name){
    $stmt = $this->dbconnect()->prepare("SELECT subcategory_id FROM subcategory WHERE subcategory_name = ?");
    $stmt->bind_param("s",$cat_name);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        // return 1;
        return "SUBCATEGORY_EXIST";
    }
    else{
        return 0;
    }
}


public function createSubcategory($subcategory_name,$subcategory_image){
    if($this->subcategoryDuplicateCheck($subcategory_name)){
        return "SUBCATEGORY_ALREADY_EXIST";
    }
        else{
       
        $stmt = $this->dbconnect()->prepare("INSERT INTO subcategory(subcategory_name,subcategory_image) VALUES(?,?)");
        $stmt->bind_param("ss",$subcategory_name,$subcategory_image);
        $result = $stmt->execute() or die($this->dbconnect()->error);
        if($result){
            // return $this->dbconnect()->insert_id;
            return "SUBCATEGORY_CREATED";
        }else{
            return 0;
        }
    }
}

public function UpdateSubcategory($subcat_id,$subcat_name){
    $stmt = $this->dbconnect()->prepare("SELECT subcategory_name FROM subcategory WHERE subcategory_id = ?");
    $stmt->bind_param("s",$subcat_id);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        if($this->categoryDuplicateCheck($subcat_name)){
            return "SUBCATEGORY_ALREADY_EXIST";
        }
        else{
            $stmt = $this->dbconnect()->prepare("UPDATE subcategory SET subcategory_name = ? WHERE subcategory_id = $subcat_id");
            $stmt->bind_param("s",$subcat_name);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "SUBCATEGORY_UPDATED";
            }else{
                return 0;
        }
        }
        
    }else{
        return "SUBCATEGORY_DOES_NOT_EXIST";
    }

}



public function DeleteSubcategory($subcat_id){
    $stmt = $this->dbconnect()->prepare("SELECT subcategory_name FROM subcategory WHERE subcategory_id = ?");
    $stmt->bind_param("s",$subcat_id);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $stmt = $this->dbconnect()->prepare("DELETE FROM subcategory WHERE subcategory_id = $subcat_id");
        $result = $stmt->execute() or die($this->dbconnect()->error);
        if($result){
            return "CATEGORY_DELETED";
        }else{
            return "SOME_ERROR";
    }
    }else{
    return "CATEGORY_DOES_NOT_EXIST";
    }
}





############################################################
##################### Products  Functions ##################
############################################################

    public function checkProducts($product_name){
        $stmt = $this->dbconnect()->prepare("SELECT product_id FROM products WHERE product_title = ? ");
        $stmt->bind_param("s",$product_name);
        $stmt->execute() or die($this->dbconnect->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            // return 1;
            return "EXIST";
        }
        else{
            return 0;
        }
    }

// Create Product Details
    public function createProduct($pbran,$pcat,$psubcat,$ptit,$pp,$pqty,$pcol,$pd,$pimg,$pkey){
        // $filename = Admin::$path_filename_ext;
        if($this->checkProducts($ptit)){
            // return 1;
            return "ALREADY_INSERTED";
        }else{
            $stmt = $this->dbconnect()->prepare("INSERT INTO products(product_brand,product_category,product_subcategory,product_title,product_price,product_qty,product_color,product_description,product_mainimg,product_tags) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$pbran,$pcat,$psubcat,$ptit,$pp,$pqty,$pcol,$pd,$pimg,$pkey);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "SUCCESS";
            }else{
                return "SOME_ERROR";
            }

            
        }
    }



//  Update Product Details
    public function UpdateProduct($product_id,$ptit,$ppr,$pkey){
        $stmt = $this->dbconnect()->prepare("SELECT product_title FROM products WHERE product_id = ?");
        $stmt->bind_param("s",$product_id);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            if($this->checkProducts($ptit)){
                return "PRODUCT_NAME_ALREADY_EXIST";
            }
            else{
                $stmt = $this->dbconnect()->prepare("UPDATE products SET product_title = ?,product_price = ?,product_keywords = ? WHERE product_id = $product_id");
                $stmt->bind_param("sss",$ptit,$ppr,$pkey);
                $result = $stmt->execute() or die($this->dbconnect()->error);
                if($result){
                    return "PRODUCT_UPDATED";
                }else{
                    return 0;
            }
            }
            
        }else{
            return "PRODUCT_DOES_NOT_EXIST";
        }

    }
// Delete Products
    public function DeleteProduct($product_id){
        $stmt = $this->dbconnect()->prepare("SELECT product_title FROM products WHERE product_id = ?");
        $stmt->bind_param("s",$product_id);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("DELETE FROM products WHERE product_id = $product_id");
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "PRODUCT_DELETED";
            }else{
                return 0;
        }
        }else{
        return "PRODUCT_DOES_NOT_EXIST";
        }
    }


############################################################
##################### Search Functions ###################
############################################################
    
}


// $obj = new Admin();
// echo($obj->UpdateSubcategory("1","jjn"));
// echo($obj->createProduct("1","2","3","ddaad","10","2","rd","dsds","dsds","dsd"));
// echo($obj->checkProducts("dsdss"));
// echo($obj->createAdminAccount("Eugene O","eugenio.parker3@gmail.com","123456","500"));
// echo($obj->adminLogin("dsds","123456"));
// echo($obj->adminGenenralUpdate("12","Eugene Parker","23","male"));
// echo($obj->adminEmailUpdate("11","eugene.parker@gmail.com"));
// echo($obj->DeleteBrand("56"));
// echo($obj->DeleteProduct("2"));
// echo($obj->emailExists("eej"));
// echo($obj->adminGenenralUpdate("12","Eugene Parker","22","male"));
// echo($obj->DeleteCategory("20"))


?>