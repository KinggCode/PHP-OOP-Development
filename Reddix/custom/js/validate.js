$(document).ready(function(){
    // User Mail Validation 
    $("input#userMail").focusout(function(){
        var userEmail = $("input#userMail").val();
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        
        
        if(emailReg.test(userEmail) || userEmail == ""){
            $("span#userEmailError").hide();
            
        }
        else{
            $("span#userEmailError").html("Invalid Email");
            $("span#userEmailError").css({"color":"red"});
            $("span#userEmailError").css({"text-align":"center"});
            $("span#userEmailError").show();
            
        }
    })

    // User Password Validation 
    $("input#userPass").focusout(function(){
        $("input#userPass").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length < 4){
                validated = false;
                $("span#userPasswordError").html("Password should contain at least 4 or more characters");
                $("span#userPasswordError").css({"color":"red"});
            }
            else{
                validated = true;
                $("span#userPasswordError").hide();
            }
                
            
            
        });
    })




    // Admin Email Valdation
    $("input#adminMail").focusout(function(){
        var adminEmail = $("input#adminMail").val();
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        
        
        if(emailReg.test(adminEmail) || adminEmail == ""){
            $("span#adminEmailError").hide();
            
        }
        else{
            $("span#adminEmailError").html("Invalid Email");
            $("span#adminEmailError").css({"color":"red"});
            $("span#adminEmailError").css({"text-align":"center"});
            $("span#adminEmailError").show();
            
        }
    })


    // Admin Password Validation
    $("input#adminPass").focusout(function(){
        var adminPass = $("input#adminPass").val();
        $("input#adminPass").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length < 4 || this.value == ""){
                validated = false;
                $("span#adminPasswordError").html("Password should contain at least 4 or more characters");
                $("span#adminPasswordError").css({"color":"red"});
            }
            else{
                validated = true;
                $("span#adminPasswordError").hide();
            }
                
            
            
        });
    })

    // Admin Password Validation
    $("input#adminPass2").focusout(function(){
        var adminPass = $("input#adminPass2").val();
        $("input#adminPass2").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length < 4 || this.value == ""){
                validated = false;
                $("span#adminPasswordError2").html("Password should contain at least 4 or more characters");
                $("span#adminPasswordError2").css({"color":"red"});
            }
            else{
                validated = true;
                $("span#adminPasswordError2").hide();
            }
                
            
            
        });
    })


    
    // Security Code  Validation
    $("input#adminCode").focusout(function(){
        var adminCode = $("#input#adminCode").val();
        console.log(adminCode);
        
        $("input#adminCode").each(function () {
        if(this.value.length == 3 || adminCode == ""){

            $("span#adminCodeError").hide();

        }else{
            $("span#adminCodeError").html("Security Code should be 3 characters long");
            $("span#adminCodeError").css({"color":"red"});
            $("span#adminCodeError").show();
            
        }

    });
        
    })


// User Registration #######################
// FirstName Validation
$("input#userFirstName").focusout(function(){
    var firstName = $("input#userFirstName").val();
    var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
    
    if(nameReg.test(firstName) || firstName == ""){
        $("span#userFirstError").hide();
        
    }
    else{
        $("span#userFirstError").html("Firstname cannot contain numbers");
        $("span#userFirstError").css({"color":"red"});
        $("span#userFirstError").css({"text-align":"center"});
        $("span#userFirstError").show();
        
    }
})

// Surname Validation 
$("input#userSurname").focusout(function(){
    var Surname = $("input#userSurname").val();
    var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
    
    if(nameReg.test(Surname) || Surname == ""){
        $("span#userSurnameError").hide();
        
    }
    else{
        $("span#userSurnameError").html("Surname cannot contain numbers");
        $("span#userSurnameError").css({"color":"red"});
        $("span#userSurnameError").css({"text-align":"center"});
        $("span#userSurnameError").show();
        
    }
})


// Email Validation
$("input#userEmail").focusout(function(){
    var email = $("input#userEmail").val();
    var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var message = "Valid";

    if(emailReg.test(email) || email == ""){
      $("span#userEmailError").hide();
    }
    else{
        $("span#userEmailError").html("Invalid Email Address");
        $("span#userEmailError").css({"color":"red"});
        $("span#userEmailError").show();
    }
})


// Address Validation 
$("input#userAddress").focusout(function(){
    var userAdd = $("input#userAddress").val();
    var pattern = new RegExp(/^[a-zA-Z ]{2,30}$/);

    if(pattern.test(userAdd) || userAdd == ""){
        $("span#userAddressError").hide();

    }
    else{
        $("span#userAddressError").html("Invalid Address");
        $("span#userAddressError").css({"color":"red"});
        $("span#userAddressError").show();
    }
})


//Age  Validation
$("input#userAge").focusout(function(){
    var userAge = $("#input#userAge").val();
    
    
    $("input#userAge").each(function () {
    if(this.value.length == 2 || this.value == ""){

        $("span#userAgeError").hide();

    }else{
        $("span#userAgeError").html("Age should be 3 characters long");
        $("span#userAgeError").css({"color":"red"});
        $("span#userAgeError").show();
        
    }

});
    
})


 // User Password Validation 
 $("input#userPassword").focusout(function(){
    $("input#userPassword").each(function () {
        var validated =  true;
        var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
        if(this.value.length < 4 || this.value == ""){
            validated = false;
            $("span#userPassError").html("Password should contain at least 4 or more characters");
            $("span#userPassError").css({"color":"red"});
        }
        else{
            validated = true;
            $("span#userPassError").hide();
        }
            
        
        
    });
})

// User Password Validation 
$("input#userPassword2").focusout(function(){
    $("input#userPassword2").each(function () {
        var pass = $("input#userPassword").val();
        var validated =  true;
        var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
        if(this.value.length < 4 || this.value == ""){
            validated = false;
            $("span#userPassError2").html("Password should contain at least 4 or more characters");
            $("span#userPassError2").css({"color":"red"});
        }
        else{
            validated = true;
            $("span#userPassError2").hide();
        }

        if(this.value == pass){
            $("span#userRegError").hide();
        }
        else{
            $("span#userRegError").html("Password mismatch");
            $("span#userRegError").css({"color":"red"});

        }
            
        
        
    });
})



// ######Admin Registration Validation
// FirstName Validation
$("input#adminFirstName").focusout(function(){
    var firstName = $("input#adminFirstName").val();
    var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
    
    if(nameReg.test(firstName) || firstName == ""){
        $("span#adminFirstError").hide();
        
    }
    else{
        $("span#adminFirstError").html("Firstname cannot contain numbers");
        $("span#adminFirstError").css({"color":"red"});
        $("span#adminFirstError").css({"text-align":"center"});
        $("span#adminFirstError").show();
        
    }
})

// Surname Validation 
$("input#adminSurname").focusout(function(){
    var Surname = $("input#adminSurname").val();
    var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
    
    if(nameReg.test(Surname) || Surname == ""){
        $("span#adminSurnameError").hide();
        
    }
    else{
        $("span#adminSurnameError").html("Surname cannot contain numbers");
        $("span#adminSurnameError").css({"color":"red"});
        $("span#adminSurnameError").css({"text-align":"center"});
        $("span#adminSurnameError").show();
        
    }
})


// Email Validation
$("input#adminEmail").focusout(function(){
    var email = $("input#adminEmail").val();
    var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var message = "Valid";

    if(emailReg.test(email) || email == ""){
      $("span#adminEmailError").hide();
    }
    else{
        $("span#adminEmailError").html("Invalid Email Address");
        $("span#adminEmailError").css({"color":"red"});
        $("span#adminEmailError").show();
    }
})



    
            
})


