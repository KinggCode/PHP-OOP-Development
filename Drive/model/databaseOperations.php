<?php
include_once(dirname(__FILE__)."/../database/db_connect.php");

class databaseOperation extends dbConnection{

    // Get  product details using product id 
    public function getOneproduct($product_id){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM  products WHERE product_id ='$product_id'");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_PRODUCT_FOUND";
        }
       
    }

    // Get all records from a table 
    public function getAllrecords($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM ".$table);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }


  


    // Get records ordered by price 
    public function getOrderedProduct($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM $table WHERE product_price < 200 order by product_price asc");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }


    // Get 9 records from a table 
    public function getThreerecords($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM  $table LIMIT 3");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }


       // Get 9 records from a table 
       public function getSixrecords($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM  $table LIMIT 6");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }

    // Get 9 records from a table 
    public function getSomerecordsOrdered($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM  $table  order by product_title asc LIMIT 6");
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }

    public function countRecords($table){
        $stmt = $this->dbconnect()->prepare("SELECT * FROM ".$table);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        // var_dump($result);

        $rows = array();
        if($result->num_rows >0){
           $count = $result->num_rows;
           return $count;
        }
        else{
            return "NO_RECORDS_FOUND";
        }
        
    }

    // Get Customer Ip address...
    public function getCustomerIp(){
        $this->customerIp = "";
        if (isset($_SERVER['HTTP_CLIENT_IP'])){
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }
        else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_FORWARDED'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        }
        else if(isset($_SERVER['REMOTE_ADDR'])){
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }
        else{
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;   
}


// get Products under each brands 
public function brandsProduct($brand_id){
    $stmt = $this->dbconnect()->prepare("SELECT * FROM products WHERE product_id IN (SELECT DISTINCT product_id FROM products,brands where products.product_brand = ?)");
    $stmt->bind_param("s",$brand_id);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "PRODUCTS_NOT_FOUND";
        }

   
        
}



public function brandsProductT(){
    $stmt = $this->dbconnect()->prepare("SELECT DISTINCT brands.brand_name,products.product_title,products.product_id,products.product_image FROM products,brands WHERE products.product_brand = brands.brand_id");
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "PRODUCTS_NOT_FOUND";
        }

   
        
}

// get Products under each category 
public function categoryProduct($categ_id){
    $stmt = $this->dbconnect()->prepare("SELECT * FROM products WHERE product_id IN (SELECT DISTINCT product_id FROM products,brands where products.product_category = ?)");
    $stmt->bind_param("s",$categ_id);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "PRODUCTS_NOT_FOUND";
        }

   
        
}

// Cart Management
    // Adding Products to cart 
    public function addProductCart($product_id){
        $quantity = 1;
        $customer_IP = $this->getCustomerIp();
        // $customer_IP = "::2";
        $stmt = $this->dbconnect()->prepare("SELECT p_id,ip_add FROM cart WHERE p_id = ? and ip_add = ? ");
        $stmt->bind_param("ss",$product_id,$customer_IP);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return "PRODUCT_EXIST_IN_CART";
        }
        else{
            $stmt = $this->dbconnect()->prepare("INSERT INTO cart(p_id,ip_add,qty) VALUES(?,?,?)");
            $stmt->bind_param("sss",$product_id,$customer_IP,$quantity);
            $result = $stmt->execute() or die($this->connection->error);
            if($result){
                return "PRODUCT_ADDED_TO_CART";
            }else{
                return "SOME_ERROR";
            }

        }

        
    }


    // Update Carts 
    public function updateCart($product_id,$quantity){
        $customer_IP = $this->getCustomerIp();
        $stmt = $this->dbconnect()->prepare("SELECT p_id,ip_add FROM cart WHERE p_id = ? and ip_add = ? ");
        $stmt->bind_param("ss",$product_id,$customer_IP);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $stmt = $this->dbconnect()->prepare("UPDATE cart SET qty= ? WHERE p_id = $product_id");
            $stmt->bind_param("s",$quantity);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "PRODUCT_QUANTITY_UPDATED";
            }else{
                return "SOME_ERROR";
            }
           
        }else{
            return "PRODUCT_DOES_NOT_EXIST_IN_CART";
        }

    }


    public function cartProductTotal(){
        $customer_IP = $this->getCustomerIp();
        // $customer_IP = "::2";
        $totalprice = 0;
        $total = 0;
        $stmt = $this->dbconnect()->prepare("SELECT * FROM cart WHERE ip_add = ? ");
        $stmt->bind_param("s",$customer_IP);
        $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        $fetch = $result->fetch_all();
        // var_dump($fetch);
    
        foreach($fetch as $item){
            // print_r($item[1]);
            $stmt = $this->dbconnect()->prepare("SELECT * FROM products WHERE product_id = $item[1]");
            $result = $stmt->execute() or die($this->dbconnect()->error);
            $result = $stmt->get_result();
            $pricefetch = $result->fetch_array();

            // var_dump($pricefetch["product_price"]);
            $totalprice = $item[3] * $pricefetch["product_price"];
            $totalprice = intval($totalprice);
            $total = $total + $totalprice;

            return $total;
            
        }
    
        
    }

// Calculating Cart Value
public function cartTotalPrice(){
    $customer_IP = $this->getCustomerIp();
    // $customer_IP = "::2";
    $totalprice = 0;
    $total = 0;
    $stmt = $this->dbconnect()->prepare("SELECT * FROM cart WHERE ip_add = ? ");
    $stmt->bind_param("s",$customer_IP);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    $fetch = $result->fetch_all();
    // var_dump($fetch);

    foreach($fetch as $item){
        // print_r($item[1]);
        $stmt = $this->dbconnect()->prepare("SELECT * FROM products WHERE product_id = $item[1]");
        $result = $stmt->execute() or die($this->dbconnect()->error);
        $result = $stmt->get_result();
        $pricefetch = $result->fetch_array();
        // var_dump($pricefetch["product_price"]);
        $totalprice = $item[3] * $pricefetch["product_price"];
        $totalprice = intval($totalprice);
        $total = $total + $totalprice;
        
    }

    return $total;
}


public function cartDiscountAccum(){
    $total = $this->cartTotalPrice();
    $discount = 0.10;
   

    if($total > 700){
        $discount = $total * $discount;
        return $discount;
    }

    if($discount == "0.10"){
        $discount = 0;
        return $discount;
    }
    else{
        return $discount;
    }
    
}


public function cartTaxAccum(){
    $total = $this->cartTotalPrice();
    $taxrate = 0.03;
    $taxcharge = $total * $taxrate;
    
    return $taxcharge;
}



public function cartTotal(){
    $total = $this->cartTotalPrice();
    $discount = $this->cartDiscountAccum();
    $tax = $this->cartTaxAccum();

    if($total > 700){
        $carttotal = ($total + $tax)-$discount;
        return $carttotal;
    }
    else{
        $carttotal = $total + $tax;
        return $carttotal;
    }



}

public function getCartDisplay(){
    // echo("testing");
    $stmt = $this->dbconnect()->prepare("Select * from products,cart where products.product_id = cart.p_id");
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    //  var_dump($result);
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "CART_EMPTY";
        }

    
}


public function DeleteProdCart($cart_prodid){
    $stmt = $this->dbconnect()->prepare("SELECT p_id FROM cart WHERE p_id = ?");
    $stmt->bind_param("s",$cart_prodid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $stmt = $this->dbconnect()->prepare("DELETE FROM cart WHERE p_id = $cart_prodid");
        $result = $stmt->execute() or die($this->dbconnect()->error);
        if($result){
            return "ITEM_DELETED";
        }else{
            return "SOME_ERROR";
    }
    }else{
    return "ITEM_DOES_NOT_EXIST";
    }
}


public function searchQuery($query){
    // echo("testing");
    $stmt = $this->dbconnect()->prepare("SELECT * from products WHERE  product_title LIKE '%$query%'");
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    //  var_dump($result);
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "NO_PRODUCT_FOUND";
        }

    
}



public function categorySearchQuery($query,$category){
    // echo("testing");
    $stmt = $this->dbconnect()->prepare("SELECT * FROM products where product_id IN (SELECT DISTINCT product_id from products,category  where  products.product_category =  ?) AND product_title LIKE '%$query%' ");
    $stmt->bind_param("s",$category);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    //  var_dump($result);
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "NO_PRODUCT_FOUND";
        }

    
}


public function brandsSearchQuery($query,$brands){
    // echo("testing");
    $stmt = $this->dbconnect()->prepare("SELECT * FROM products where product_id IN (SELECT DISTINCT product_id from products,category  where  products.product_brand =  ?) AND product_title LIKE '%$query%' ");
    $stmt->bind_param("s",$brands);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();
    //  var_dump($result);
    $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return "NO_PRODUCT_FOUND";
        }

    
}






}
// $obj = new databaseOperation();
// var_dump($obj->categorySearchQuery("a","5"));


?>