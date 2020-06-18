<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'stock';

//Database Connection
$connect = mysqli_connect($localhost,$username,$password,$dbname);

//Check Connection
if($connect->connect_error){
    die("Connection Failed : ". $connect->connect_error);
}else{
//  echo('Successfully connected');
}
?>