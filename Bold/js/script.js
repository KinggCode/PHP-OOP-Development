$(document).ready(function(){
    $('#p2home').click(function(){
        window.location.href = "http://localhost/Bold/page/landingPage.html";
    })

    $('#postProd').click(function(){
        window.location.href = "http://localhost/Bold/page/productpost.php";
    })

    //   // Add Products
    //   $("#insertProduct_btn").click(function(){
    //     // var productId = $("input#product_id").val();
    //     var productTitle = $("input#product_title").val();
    //     var categoryId = $("select#categoryH").val();
    //     var brandId = $("select#brand").val();
    //     var productDesc = $("input#product_desc").val();
    //     var productImage = $("input#product_image").val();
    //     var productKeywords = $("#keywords").val();
    //     var productPrice = $("input#product_price").val();

    //     // Returns successful data submission message when the entered information is stored in database.
    //     var dataString ='productTitle=' + productTitle + '&categoryId=' + categoryId + '&brandId=' + brandId +
    //     '&productDesc=' + productDesc + '&productImage=' + productImage +'&productKeywords=' + productKeywords + '&productPrice=' + productPrice;

        
    //     if(productTitle == '' || categoryId == '' || brandId == '' ||productDesc == '' ||productImage == '' ||productKeywords == '' || productPrice == '') {
    //     alert("Please Fill All Fields");

    //     }
    //     else {
    //         console.log(dataString);
    //         console.log("Moves to else");
    //     // AJAX code to submit form.
    //     $.ajax({
    //     type: "POST",
    //     url: "http://localhost/Bold/function/addProduct.php",
    //     data: dataString,
    //     success: function(html) {
    //         console.log(html);
    //         if(html == "Product Inserted"){
    //             window.location.href = "http://localhost/Bold/page/landingPage.html";
    //         }
    //         else{
    //             document.getElementById('insertionErrorMessage').innerHTML=html;
    //             $("#insertionErrorMessage").css({"color":"red"});
    //         }
    //     alert(html);
    //     }
    //     });
    //     }
    //     return false;

    // })


 // Display Brands in dropdown
    // var container = $("#brand");
    $.ajax({
        type: "GET",
        url: "http://localhost/Bold/function/addProduct.php",
        datatype :'json',
        success : function(data){
                var data = JSON.parse(data);
                console.log(data);

                if(html == "Product Inserted"){
                window.location.href = "http://localhost/Bold/page/landingPage.html";
            }
            else{
                document.getElementById('insertionErrorMessage').innerHTML=html;
                $("#insertionErrorMessage").css({"color":"red"});
            }
               

           
        },error:function(e){

        }
    });
    


    // Display Brands in dropdown
    // var container = $("#brand");
    $.ajax({
        type: "GET",
        url: "http://localhost/Bold/function/brandDisplay.php",
        datatype :'json',
        success : function(data){
                var data = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < data.length; i++){
                    var brands = data[i];
                    
                    var brand_id = brands.brand_id;
                    var timestamp = brands.timestamp;
                    var brand_name = brands.brand_name;

                    // console.log(brand_name);

                    $("#brand").append('<option value="'+brand_id+'">'+brand_name+'</option>');            
                }

           
        },error:function(e){

        }
    });


 // Display Categories in dropdown
 $.ajax({
     type: "GET",
     url: "http://localhost/Bold/function/categoryDisplay.php",
     datatype :'json',
     success : function(data){
             var data = JSON.parse(data);
             // console.log(data);
             for(var i = 0; i < data.length; i++){
                 var categories = data[i];
                 
                 var category_id = categories.cat_id;
                 var category_name = categories.cat_name;

                //  console.log(category_name);

                 $("#category").append('<option value="'+category_id+'">'+category_name+'</option>');            
             }
     },error:function(e){

     }
 });


// Display Categories in dropdown
$.ajax({
    type: "GET",
    url: "http://localhost/Bold/function/categoryDisplay.php",
    datatype :'json',
    success : function(data){
            var data = JSON.parse(data);
            // console.log(data);
            for(var i = 0; i < data.length; i++){
                var categories = data[i];
                
                var category_id = categories.cat_id;
                var category_name = categories.cat_name;

                console.log(category_name);

                $("#categoryH").append('<option class="dropdown-item" value="'+ category_id +'">'+ category_name +'</option>');            
            }
    },error:function(e){
    }
});

// Product Display 
$.ajax({
    type: "GET",
    url: "http://localhost/Bold/function/productDisplay.php",
    datatype :'json',
    success : function(data){
            var data = JSON.parse(data);
            // console.log(data);
            for(var i = 0; i < data.length; i++){
                var products= data[i];
                
                var product_id = products.product_Id;
                var product_title = products.product_Title;
                var product_price = products.product_Price;
                var product_desc = products.product_Desc;
                var product_Image = products.product_Image;
                var product_keywords = products.product_Keywords;

                console.log(products);

                $("#prodDisplay").append('<div class="col-lg-4 col-md-6 zoom"> <div class="card" style="width: 18rem;"> <img src="'+ product_Image +'" class="card-img-top" alt="...">'+
                '<div class="card-body shadow-lg ">'+ 
                '<h5 class="card-title">'+ product_title +'</h5>'+
                '<p class="card-text">'+'GHC'+ ' ' +product_price +'</p>'+
                '<p class="card-text">'+product_desc +'</p>'+
                '<a class=" btn btn-outline-warning" href="'+ product_id+'">View Product</a>'+
                '<a class=" btn btn-outline-danger" style="margin-left:0.4rem;" href="'+ product_id+'">Add to Cart </a>'+
                +'</div>'+
                +'</div></div>');            
            }
    },error:function(e){
    }
});


// Search Display 
 // Add Products
 $("#search_btn").click(function(){
    var searchQuery = $("input#searchQuery").val();
    

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'http://localhost/Bold/function/searchResult.php?searchQuery' + searchQuery;

    
    if(searchQuery == ''){
    alert("Please Search for some products");

    }
    else {
        console.log(dataString);
        console.log("Moves to else");
    // AJAX code to submit form.
    $.ajax({
    type: "POST",
    url: "http://localhost/Bold/function/searchResult.php?Iphone5S",
    data: dataString,
    success: function(html) {
        var data = JSON.parse(data);
    //   Eror ends here ...

            for(var i = 0; i < data.length; i++){
                var products= data[i];

                console.log(products);
                
                var product_id = products.product_Id;
                var product_title = products.product_Title;
                var product_price = products.product_Price;
                var product_desc = products.product_Desc;
                var product_Image = products.product_Image;
                var product_keywords = products.product_Keywords;
                var searchCount = products.searchCount;

                console.log(products.searchCount);

                $("#searchDisplay").append('<div class="col-lg-4 col-md-6"> <div class="card" style="width: 18rem;"> <img src="'+ product_Image +'" class="card-img-top" alt="...">'+
                '<div class="card-body shadow-lg ">'+ 
                '<h5 class="card-title">'+ product_title +'</h5>'+
                '<p class="card-text">'+'GHC'+ ' ' +product_price +'</p>'+
                '<p class="card-text">'+product_desc +'</p>'+
                '<a class=" btn btn-outline-warning" href="'+ product_id+'">View Product</a>'+
                '<a class=" btn btn-outline-danger" href="'+ product_id+'">Add to Cart </a>'+
                +'</div>'+
                +'</div></div>');            
            }

            if(data == "No Products found!"){
                window.location.href = "http://localhost/Bold/page/ProductSearch.html";
            }
            else{
                document.getElementById('searchResult').innerHTML=html;
                $("#searchResult").css({"color":"blue"});
            }
        alert(html);

            document.getElementById("searchCount").innerHTML= searchCount;
    },error:function(e){

    }

})

    }
    });
    
})


  
