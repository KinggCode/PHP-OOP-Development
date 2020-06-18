<?php 
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if(isset($_POST['createBrandBtn'])){
$brandName = $_POST['brandName'];
$brandStatus = $_POST['brandStatus'];

$sql = "INSERT INTO Brands(brands_name,brands_active,brands_status) values('$brandName','$brandStatus',1)";

if($connect->query($sql) === TRUE){
    $valid['success']= true;
    $valid['messages']= 'Successfully Added';
}else{
     $valid['success']= false;
     $valid['messages']= 'Errors while adding the brands';
}

$connect->close();
echo json_encode($valid, JSON_FORCE_OBJECT);
}





?>