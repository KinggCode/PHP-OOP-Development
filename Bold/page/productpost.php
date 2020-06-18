<?php
// header('Access-Control-Allow-Origin: *');
require_once '../function/db_connection.php';

if (isset($_POST["insert_btn"])) {
    $productTitle = $_POST['product_title'];
    $categoryId = $_POST['Category'];
    $brandId = $_POST['brandH'];
    $productDesc = $_POST['product_desc'];
    // $productImage = $_POST['productImage'];
    $productKeywords = $_POST['keywords'];
    $productPrice = $_POST['product_price'];

    // $imgFile = $_FILES['product_image'];
    // $tmp_dir = $_FILES['product_image']['tmp_name'];
    // $imgSize = $_FILES['product_image']['size'];

    $query1 = "SELECT * FROM products WHERE product_title = '$productTitle'";
    $result = mysqli_query($connect, $query1);
    $fetch_result = mysqli_fetch_object($result);
    // var_dump($fetch_result);
    $data = mysqli_num_rows($result);


    if (($data) == 0) {
        $folderName = "../images/";
        $fileName = $folderName . basename($_FILES["product_image"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        if(isset($_POST["insert_btn"])) {
            //get the dimensions of the image and store it in the variable '$check'
            $fileDimensions = getimagesize($_FILES["product_image"]["tmp_name"]);
            if($fileDimensions !== false) {
                //  echo "File is an image - " . $fileDimensions["mime"] . ".";
                // print_r($fileDimensions);
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
    // if (file_exists($fileName)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    //check if its greater than 500kb
    if ($_FILES["product_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $fileName)) {
            // echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
            // echo '<image src="../images/'.basename( $_FILES["product_image"]["name"]).'">';
        
            if ($productTitle !== "" || $categoryId !== "" || $brandId !== "" || $productDesc !== "" || $productKeywords !== "") {
                $sql = "INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('$categoryId','$brandId','$productTitle',$productPrice,'$productDesc','$fileName','$productKeywords')";
                var_dump($sql);
                $fetch_result = mysqli_fetch_object($result);
                var_dump($fetch_result);
                $count = mysqli_num_rows($result);
                echo("Inserted");
               
            } else {
                echo ("Please fill all fields");
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

}

// echo(json_encode($data));


// if ($query1) {
//     echo ("Product Inserted");
// } else {

//     echo ("Registration Error");
// }
// } else {
// echo ("Already Inserted. Two Products cannot have the same identity");
// }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bold !- Search for Products</title>
    <!-- BootStrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="http://localhost/Bold/css/style.css">
    <link rel="stylesheet" href="http://localhost/Bold/css/menu.css">
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>

<body>
    <!-- Header container -->
    <nav class="pnavbar">
        <i class="fas fa-arrow-left" id="p2home"></i>
    </nav>

    <!-- End of Header Container -->

    <div class="view-bck">

        <div class="rheader">
            <h1 id="logo">Bold<span>!</span></h1>
            <p>Product Details</p>
        </div>

        <!-- <div class="container"> -->
        <div id="pform-box">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="product_title" id="productTitle" placeholder="Product Name">
                    <span id="productTitleError"></span>
                </div>

                <div class="form-group">
                    <select id="categoryH" name="Category">
                        <option> -- Category -- </option>
                    </select>
                    <span id="categoryIdError"></span>
                </div>

                <div class="form-group">
                    <select id="brand" name="brandH">
                        <option> --Brands -- </option>
                    </select>
                    <span id="brandIdError"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="product_desc" id="productDesc" placeholder="Product Description">
                    <span id="productDescError"></span>
                </div>
                <div class="form-group">
                    <input type="number" name="product_price" id="productPrice" placeholder="Product Price">
                    <span id="productPriceError"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="keywords"  id="keyword" placeholder="Product Keywords">
                    <span id="productKeywordsError"></span>
                </div>

                <div class="form-group">
                    <span>Upload Product Image:</span> <input type="file"  name="product_image" placeholder="Product Image">
                    <span id="productImageError"></span>
                </div>

                <button type="submit" class="" id="insertProduct_btn" name="insert_btn"> <i class="far fa-plus-square"></i> Add Product</button>

                <span id="insertionErrorMessage"></span>

            </form>
        </div>
        <!-- </div> -->
    </div>


    </div>


    <!-- Bootstrap & Jquery Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Custom Js Script -->

    <script src="http://localhost/Bold/js/validate.js"></script>
    <script src="http://localhost/Bold/js/script.js"></script>

</body>

</html>