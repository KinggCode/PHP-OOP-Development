<?php
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productTitle = $_POST['productTitle'];

    $categoryId = $_POST['categoryId'];
    $brandId = $_POST['brandId'];
    $productDesc = $_POST['productDesc'];
    // $productImage = $_POST['productImage'];
    $productKeywords = $_POST['productKeywords'];
    $productPrice = $_POST['productPrice'];

    $imgFile = $_POST['productImage'];
    $tmp_dir = $_FILES['productImage']['tmp_name'];
    $imgSize = $_FILES['productImage']['size'];

    $query1 = "SELECT * FROM products WHERE product_title = '$productTitle'";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    var_dump($fetch_result);
//     $data = mysqli_num_rows($result);

if(($data)==0){
        if($imgFile)
                {
                    $upload_dir = '..//images'; // upload directory
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $productpic = rand(1000,1000000).".".$imgExt;


                    if(in_array($imgExt, $valid_extensions))
                    {
                        if($imgSize < 2000000)
                        {
                            // unlink($upload_dir.$_SESSION['image']);
                            move_uploaded_file($tmp_dir,$upload_dir.$productpic);
                        }
                        else
                        {
                            echo '<script>
                                    alert("Sorry, your file is too large it should be less then 2MB");
                                  </script>';
                        }
                    }
                    else
                    {
                        echo '<script>
                                    alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                              </script>';
                    }
                }
                else
                {
                    $productpic = $imgs; // old image from database
                    $productpic = substr($productpic,20);
                }
        if(!isset($errMSG))
                {

                    $path = '..//images'. $productpic;

                    $action= 'Product Inserted';

    if($productTitle !== "" || $categoryId !== "" || $brandId !=="" || $productDesc !== "" || $productKeywords !== "" || $path == NULL ){
        $sql = "INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('$categoryId','$brandId','$productTitle',$productPrice,'$productDesc','$productImage','$productKeywords')";
        var_dump($sql);
         $result1 = mysqli_query($connect,$sql);

    }else{
        echo("Please fill all fieldsbbb");
    }


    if($query1){
        echo("Product Inserted");

     }else{

    echo("Registration Error");
     }

    }else{
        echo("Already Inserted. Two Products cannot have the same identity");
    }

                $data = $users->updateUserdetail($user,$path,$profile_contact,$profile_address,$profile_department,$profile_specialization,$profile_aboutme);
        }
        else{
                $errMSG = "Sorry Data Could Not Updated !";
                }





}









?>
