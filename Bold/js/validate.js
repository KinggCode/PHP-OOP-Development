$(document).ready(function(){

    // Product Title Validation 
    $("input#productTitle").focusout(function(){
        var firstName = $("input#productTitle").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(firstName) || firstName == ""){
            $("span#productTitleError").hide();
            
        }
        else{
            $("span#productTitleError").html("Product Title cannot contain numbers");
            $("span#productTitleError").css({"color":"red"});
            $("span#productTitleError").css({"text-align":"center"});
            $("span#productTitleError").show();
            
        }
    })

// Description Validation 
    $("input#productDesc").focusout(function(){
        var firstName = $("input#productDesc").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(firstName) || firstName == ""){
            $("span#productDescError").hide();
            
        }
        else{
            $("span#productDescError").html("Product  Description cannot contain numbers");
            $("span#productDescError").css({"color":"red"});
            $("span#productDescError").css({"text-align":"center"});
            $("span#productDescError").show();
            
        }
    })

     // Product Price  Validation
     $("input#productPrice").focusout(function(){
        var productCode = $("#input#productPrice").val();
        
        
        $("input#productPrice").each(function () {
        if(this.value.length > 0 || productCode == ""){

            $("span#productPriceError").hide();

        }else{
            $("span#productPriceError").html("Price should be a character long");
            $("span#productPriceError").css({"color":"red"});
            $("span#productPriceError").show();
            
        }

    });
        
    })

// Keyword Validation 
    $("input#keyword").focusout(function(){
        var keyword = $("input#keyword").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(keyword) || keyword == ""){
            $("span#productKeywordsError").hide();
            
        }
        else{
            $("span#productKeywordsError").html("Product  Description cannot contain numbers");
            $("span#productKeywordsError").css({"color":"red"});
            $("span#productKeywordsError").css({"text-align":"center"});
            $("span#productKeywordsError").show();
            
        }
    })




})