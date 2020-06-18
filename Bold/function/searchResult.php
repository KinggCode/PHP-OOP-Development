<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $searchQuery = $_POST['searchQuery'];

    $query1 = "SELECT * FROM products";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    // var_dump($result);
    $count = mysqli_num_rows($result);

    printf($count);

if($count >0){
    $data = array();
        while($row_result=mysqli_fetch_object($result)){
           array_push($data, array("product_Id"=> $row_result->product_id, "product_Title"=> $row_result->product_title , "product_Price"=> $row_result->product_price , "product_Desc"=> $row_result->product_desc, "product_Image"=> $row_result->product_image, "product_Keywords"=> $row_result->product_keywords,"searchCount"=> $row_result->$data ));
    
    }
    if($count == 0){
        echo("No Products found!");
        exit();
    }

    
    
    
    echo(json_encode($data));
    
        

    
}
else{
    echo("No Product Found !");
}

}

?>