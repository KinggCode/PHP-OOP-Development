$(document).ready(function(){
    // #########################
    // User Login
    // User email Validation.
    $("input#userEmail").focusout(function(){
        var userEmail = $("input#userEmail").val();
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
    $("input#userPassword").focusout(function(){
        $("input#userPassword").each(function () {
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


    // #########################
    // Admin Login
    // Admin email Validation.
    $("input#adminEmail").focusout(function(){
        var adminEmail = $("input#adminEmail").val();
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

    // User Password Validation 
    $("input#adminpassword").focusout(function(){
        $("input#adminpassword").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length < 4){
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

    // Security Code  Validation
    $("input#adminSecurityCode").focusout(function(){
        var adminCode = $("#input#adminSecurityCode").val();
        console.log(adminCode);
        
        $("input#adminSecurityCode").each(function () {
        if(this.value.length == 3 || adminCode == ""){

            $("span#adminCodeError").hide();

        }else{
            $("span#adminCodeError").html("Security Code should be 3 characters long");
            $("span#adminCodeError").css({"color":"red"});
            $("span#adminCodeError").show();
            
        }

    });
        
    })


    // ################################################################
    // User Registration
    // FirstName Validation
    $("input#userFirstname").focusout(function(){
        var firstName = $("input#userFirstname").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(firstName) || firstName == ""){
            $("span#FirstnameError").hide();
            
        }
        else{
            $("span#FirstnameError").html("Firstname cannot contain numbers");
            $("span#FirstnameError").css({"color":"red"});
            $("span#FirstnameError").css({"text-align":"center"});
            $("span#FirstnameError").show();
            
        }
    })

    // Surname Validation 
    $("input#userSurname").focusout(function(){
        var Surname = $("input#userSurname").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(Surname) || Surname == ""){
            $("span#SurnameError").hide();
            
        }
        else{
            $("span#SurnameError").html("Surname cannot contain numbers");
            $("span#SurnameError").css({"color":"red"});
            $("span#SurnameError").css({"text-align":"center"});
            $("span#SurnameError").show();
            
        }
    })


    // Email Validation
    $("input#userEmail").focusout(function(){
        var email = $("input#userEmail").val();
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var message = "Valid";

        if(emailReg.test(email) || email == ""){
        $("span#EmailError").hide();
        }
        else{
            $("span#EmailError").html("Invalid Email Address");
            $("span#EmailError").css({"color":"red"});
            $("span#EmailError").show();
        }
    })

    // Address Validation 
    $("input#userHome").focusout(function(){
        var userAdd = $("input#userHome").val();
        var pattern = new RegExp(/^[a-zA-Z ]{2,30}$/);

        if(pattern.test(userAdd) || userAdd == ""){
            $("span#AddressError").hide();

        }
        else{
            $("span#AddressError").html("Invalid Address");
            $("span#AddressError").css({"color":"red"});
            $("span#AddressError").show();
        }
    })

    //Age  Validation
    $("input#userAge").focusout(function(){
        var userAge = $("#input#userAge").val();
        
        
        $("input#userAge").each(function () {
        if(this.value.length <= 2 || this.value == "" ){

            $("span#AgeError").hide();

        }else{
            $("span#AgeError").html("Age should be 1 or 2 characters long");
            $("span#AgeError").css({"color":"red"});
            $("span#AgeError").show();
        }
    });    
    })

    // User Password Validation 
    $("input#userPassword").focusout(function(){
        $("input#userPassword").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length == 2 || this.value == "" || this.value.length == 1 ){
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
                $("span#regErrorMessage").hide();
            }
            else{
                $("span#regErrorMessage").html("Password mismatch");
                $("span#regErrorMessage").css({"color":"red"});

            }
                
            
            
        });
    })

    // ################################################################
    // Admin Registration
    // FirstName Validation
    $("input#adminFirstname").focusout(function(){
        var firstName = $("input#adminFirstname").val();
        var nameReg = new RegExp(/^[a-zA-Z ]{2,30}$/);
        
        if(nameReg.test(firstName) || firstName == ""){
            $("span#adminFirstnameError").hide();
            
        }
        else{
            $("span#adminFirstnameError").html("Firstname cannot contain numbers");
            $("span#adminFirstnameError").css({"color":"red"});
            $("span#adminFirstnameError").css({"text-align":"center"});
            $("span#adminFirstnameError").show();
            
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

    // Address Validation 
    $("input#adminHome").focusout(function(){
        var userAdd = $("input#adminHome").val();
        var pattern = new RegExp(/^[a-zA-Z ]{2,30}$/);

        if(pattern.test(userAdd) || userAdd == ""){
            $("span#adminAddressError").hide();

        }
        else{
            $("span#adminAddressError").html("Invalid Address");
            $("span#adminAddressError").css({"color":"red"});
            $("span#adminAddressError").show();
        }
    })

    //Age  Validation
    $("input#adminAge").focusout(function(){
        var userAge = $("#input#adminAge").val();
        
        
        $("input#adminAge").each(function () {
        if(this.value.length <= 2 || this.value == "" ){

            $("span#adminAgeError").hide();

        }else{
            $("span#adminAgeError").html("Age should be 1 or 2 characters long");
            $("span#adminAgeError").css({"color":"red"});
            $("span#adminAgeError").show();
        }
    });    
    })

    // Admin Password Validation 
    $("input#adminPassword").focusout(function(){
        $("input#adminPassword").each(function () {
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length == 2 || this.value == "" || this.value.length == 1 ){
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

    // Admin  Password 2 Validation 
    $("input#adminPassword2").focusout(function(){
        $("input#adminPassword2").each(function () {
            var pass = $("input#adminPassword").val();
            var validated =  true;
            var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            if(this.value.length < 4 || this.value == ""){
                validated = false;
                $("span#adminPassword2Error").html("Password should contain at least 4 or more characters");
                $("span#adminPassword2Error").css({"color":"red"});
            }
            else{
                validated = true;
                $("span#adminrPassword2Error").hide();
            }
        });
    })

      // Security Code  Validation
      $("input#adminCode").focusout(function(){
        var adminCode = $("#input#adminCode").val();
        console.log(adminCode);
        
        $("input#adminCode").each(function () {
        if(this.value.length == 3 || adminCode == ""){

            $("span#adminSecurityError").hide();

        }else{
            $("span#adminSecurityError").html("Security Code should be 3 characters long");
            $("span#adminSecurityError").css({"color":"red"});
            $("span#adminSecurityError").show();
            
        }

    });
        
    })


})