<?php

// include_once("../databse/constants.php");
include_once("user.php");
include_once("dbOperation.php");

// Registration Process
if(isset($_POST['username']) && isset($_POST['email'])){
    $user = new User();
    $result= $user->createUserAccount($_POST['username'],$_POST['email'],$_POST['password1'],$_POST['usertype']);
}

// Login Process
if(isset($_POST['log_email']) && isset($_POST['log_pass'])){
    $user = new User();
    $result= $user->userLogin($_POST['log_email'],$_POST['log_pass']);
    echo($result);


}

// Get Catgeory Process
if(isset($_POST['getCategory'])){
    $obj = new DBOperation();
    $rows= $obj->getAllrecords("categories");
    foreach($rows as $row){
        echo("<option value='".$row["parent_cat"]."'>".$row["category_name"]."</option>");
    }
    exit();
    // if($result) 
}

?>