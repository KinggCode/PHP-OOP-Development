<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

$query = "SELECT * FROM products";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No brand available!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("product_Id"=> $row_result->product_id, "product_Title"=> $row_result->product_title , "product_Price"=> $row_result->product_price , "product_Desc"=> $row_result->product_desc, "product_Image"=> $row_result->product_image, "product_Keywords"=> $row_result->product_keywords));

}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>