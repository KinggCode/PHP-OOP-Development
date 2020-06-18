$(document).ready(function(){
    var DOMAIN = "http://localhost/inv_project/public_html";
    $("#register_form").on("submit",function(){ 
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-])*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        // Name Validation 
        if(name.val() == "" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please enter Name and Name should be 6 cha</span>");
            status = false;
        }
        else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        // https://stackoverflow.com/questions/37154374/django-integrityerror-1048-column-last-login-cannot-be-null

        // Email Validation
        if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please enter Valid Address</span>");
            status = false;
        }
        else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        // Password Validation 
        if(pass1.val() == "" || pass1.val().length < 5){
            email.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Please enter more than 5 digit password</span>");
            status = false;
        }
        else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }


        if(pass2.val() == "" || pass2.val().length < 5){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Please enter more than 5 digit password</span>");
            status = false;
        }
        else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }


        // Usertype Validation 
        if(type.val() == ""){
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Please Select your status</span>");
            status = false;
        }
        else{
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }


        // Password Match 
        if(pass1.val() == pass2.val() && status == true){
            $(".overlay").show();
            $.ajax({
                url: DOMAIN+"/includes/process.php",
                method: "POST",
                data: $("#register_form").serialize(),
                success: function(data){
                    $(".overlay").hide();
                    if(data == "EMAIL_ALREADY_EXISTS"){
                        alert("it seems like you email is alreadyb used");
                    }else if (data == "SOME_ERROR"){
                        alert("Something went wrong");
                    }
                    else{
                        window.location.href= encodeURI(DOMAIN+"/index.php?msg=You are registered Now you can login");
                    }

                }
            })
        }
        else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password mismatched</span>");
            status = true;
        }
        
    })



    // Login Section 
    $("#login_form").on("submit",function(){
      
        var email = $("#log_email");
        var pass = $("#log_pass");
        var status = false;

        // Email Validation 
        if(email.val() == ""){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please enter your email </span>");
            status = false;
        }else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        if(pass.val() == ""){
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please enter your password </span>");
            status = false;
        }else{
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }
        if(status){
            $(".overlay").show();
            $.ajax({
                url: DOMAIN+"/includes/process.php",
                method: "POST",
                data: $("#login_form").serialize(),
                success: function(data){
                    if(data == "NOT_REGISTERED"){
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>it seems like you are not registered</span>");
                    }else if (data == "PASSWORD_NOT_MATCHED"){
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Password does not match</span>");
                    }
                    else{
                       console.log(data);
                       window.location.href= DOMAIN +"/dashboard.php";
                    }

                }
            })
        }
    })

fetch_category();
    // Category Section 
    function fetch_category(){
        $.ajax({
            url: DOMAIN +"/includes/process.php",
            method: "POST",
            data: {getCategory:1},
            success : function(data){
                // alert(data);
                var root = "<option value='0'>Root</option>";
                $("#parent_cat").html(data)
            }
        })
    }
})