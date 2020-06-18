$(document).ready(function(){
     // User Registration 
     $("#userReg_btn").click(function(){
        var userFirstName = $("input#userFirstname").val();
        var userSurname = $("input#userSurname").val();
        var userEmail = $("input#userEmail").val();
        var userAddress = $("input#userHome").val();
        var userAge = $("input#userAge").val();
        var userGender = $("#userGender").val();
        var userUsername = userFirstName + "." + userSurname;
        var userPassword = $("input#userPassword").val();
        var userPassword2 = $("input#userPassword2").val();
        // var userProfile = $('userProfile').val();
        

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'firstname=' + userFirstName + '&surname=' + userSurname + '&email=' + userEmail + '&userAddress=' + userAddress +
        '&age=' + userAge + '&userGender=' + userGender +'&userUsername=' + userUsername +'&userPassword=' + userPassword + '&userPassword2=' + userPassword2;

        
        if(userFirstName == '' || userSurname == '' || userEmail == '' || userAddress == '' || userAge == '' || userGender == '' || userPassword == '' || userPassword2 == '' || userUsername == '') {
        alert("Please Fill All Fields");

        }
        else {
            console.log(dataString);
            console.log("Moves to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Skates/function/addUser.php",
        data: dataString,
        success: function(html) {
            if(html == "You have Successfully Registered"){
                $("form")[0].reset();
                window.location.href = "http://localhost/Skates/page/login.html";
            }
            else{
                document.getElementById('regErrorMessage').innerHTML=html;
                $("#regErrorMessage").css({"color":"red"});
            }
        alert(html);
        }
        });
        }
        return false;

    })

     // Admin Registration 
     $("#adminReg_btn").click(function(){
        var adminFirstName = $("input#adminFirstname").val();
        var adminSurname = $("input#adminSurname").val();
        var adminEmail = $("input#adminEmail").val();
        var adminAddress = $("input#adminHome").val();
        var adminAge = $("input#adminAge").val();
        var adminGender = $("#adminGender").val();
        var adminProfession = $("input#adminProfession").val();
        var adminUsername = adminFirstName + "." + adminSurname;
        var adminPassword = $("input#adminPassword1").val();
        var adminPassword2 = $("input#adminPassword2").val();
        var adminCode = $("input#adminCode").val();
        var adminImage = $("input#adminProfile").val();

        console.log(adminEmail);

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'firstname=' + adminFirstName + '&surname=' + adminSurname + '&email=' + adminEmail + '&adminAddress=' + adminAddress +
        '&age=' + adminAge + '&adminGender=' + adminGender +'&adminUsername=' + adminUsername +'&adminPassword=' + adminPassword + '&adminPassword2=' + adminPassword2 + '&adminCode=' + adminCode + '&adminProfession=' + adminProfession + '&adminImage=' + adminImage;

        console.log(dataString);
        if(adminFirstName == '' || adminSurname == '' || adminEmail == '' || adminAddress == '' || adminAge == '' || adminGender == '' || adminPassword == '' || adminPassword2 == '' || adminUsername == '' || adminCode == '' || adminProfession == '' || adminImage == '') {
            $("span#regErrorMessage").html("Please fill required fields");
            $("span#regErrorMessage").css({"color":"red"});
            $("span#regErrorMessage").show();

        }
        else {
            $("span#regErrorMessage").hide();
            console.log("Moves to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Skates/admin/functions/addAdmin.php",
        data: dataString,
        success: function(html) {
            if(html == "Welcome Admin"){
                $("form")[0].reset();
                window.location.href = "http://localhost/Skates/admin/page/login.html";
            }
            else{
                document.getElementById('regErrorMessage').innerHTML=html;
                $("#regErrorMessage").css({"color":"red"});
            }
        alert(html);
        }
        });
        }
        return false;

    })

    // Admin Login
    $("#adminLogin_btn").click(function(){
        var adminEmail = $("input#adminEmail").val();
        var adminPassword = $("input#adminpassword").val();
        var adminCode =$("input#adminSecurityCode").val();

        console.log(adminEmail);
        var dataString = 'adminEmail=' + adminEmail + '&adminPassword=' + adminPassword + '&adminCode=' + adminCode;
        console.log(dataString);

        if(adminEmail == '' || adminPassword == '' || adminCode == ''){
            alert("Please Fill All fields");
        }
        else {
            console.log("Going to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Skates/admin/functions/login.php",
        data: dataString,
        success: function(html) {
console.log(html);
            if(html == "Login Successfully"){
                 window.location.href = "http://localhost/Skates/admin/page/adminportal.html";
                document.getElementById('regErrorMessage').innerHTML= html;
                $("#regErrorMessage").css({"color":"blue"});
                $("form")[0].reset();
            }
            else{
                document.getElementById('regErrorMessage').innerHTML=html;
                $("#regErrorMessage").css({"color":"red"});
                $("form")[0].reset();
                
            }
        alert(html);
        }
        });
        }
        return false;
    })


    // User Login
    $("#userLogin_btn").click(function(){
        var userEmail = $("input#userEmail").val();
        var userPassword = $("input#userPassword").val();

        var dataString = 'userEmail=' + userEmail + '&userPassword=' + userPassword;
        console.log(dataString);

        if(userEmail == '' || userPassword == ''){
            alert("Please Fill All fields");
        }
        else {
            console.log("Going to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Skates/function/login.php",
        data: dataString,
        success: function(html) {
// console.log(html);
            if(html == "Login Successfully"){
                 window.location.href = "http://localhost/Skates/page/userportal.html";
                document.getElementById('regErrorMessage').innerHTML= html;
                $("#logErrorMessage").css({"color":"blue"});
                $("form")[0].reset();
            }
            else{
                document.getElementById('logErrorMessage').innerHTML=html;
                $("#logErrorMessage").css({"color":"red"});
                $("form")[0].reset();
            }
        alert(html);
        }
        });
        }
        return false;

    })

    // User Portal
    $.ajax({
        type: "GET",
        url: "http://localhost/Skates/function/userPortal.php",
        datatype :'json',
        success : function(data){
                var user = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < user.length; i++){
                    var users = user[i];
                    
                    var user_id = users.user_id;
                    var username = users.username;
                    var timestamp = users.timestamp;
                    var email = users.email;
                    var gender = users.gender;

                    $("#userName").html(username + " " +'<i class="fas fa-user-circle"></i>');
                }     
        },error:function(e){

        }
    });
    var container = $("#brand");
    $.ajax({
        type: "GET",
        url: "http://localhost/Skates/function/BrandDisplay.php",
        datatype :'json',
        success : function(data){
                var user = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < user.length; i++){
                    var brands = user[i];
                    
                    var brand_id = brands.brand_id;
                    var timestamp = brands.timestamp;
                    var brand_name = brands.brand_name;

                    // console.log(brand_name);

                    $("#brand").append('<a class="dropdown-item" href="#">'+brand_name+'</a>');            
                }

           
        },error:function(e){

        }
    });

var brantab = $("#brands_id tbody"); 
        $.ajax({
            type: "GET",
            url: "http://localhost/Skates/admin/functions/BrandDisplay.php",
            datatype :'json',
            success : function(data){
                var data = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i< data.length; i++){
                    var brands = data[i];
                    brantab.append('<tr>'+
                    '<td>' + brands.timestamp + '</td>'+
                    '<td>' + brands.brand_id + '</td>'+
                    '<td>' + brands.brand_name + '</td>'+
                    '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a></td>'+
                    '</tr>');
                }
                $('#brands_id').DataTable();
            },error:function(e){

            }
        });
        


    var category = $("#category");
    $.ajax({
        type: "GET",
        url: "http://localhost/Skates/function/CategoryDisplay.php",
        datatype :'json',
        success : function(data){
                var cate = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < cate.length; i++){
                    var categories = cate[i];
                    
                    var cat_id = categories.cat_id;
                    var timestamp = categories.timestamp;
                    var cat_name = categories.cat_name;

                    // console.log(cat_name);

                    $("#category").append('<a class="dropdown-item" href="#">'+cat_name+'</a>');

                   
                
                }

           
        },error:function(e){

        }
    });

var categtab = $("#categtab_id tbody");
$(document).ready(function(){
    
        $.ajax({
            type: "GET",
            url: "http://localhost/Skates/admin/functions/CategoryDisplay.php",
            datatype :'json',
            success : function(data){
                var data = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i< data.length; i++){
                    var category = data[i];
                    categtab.append('<tr>'+
                    '<td>' + category.timestamp + '</td>'+
                    '<td>' + category.cat_id + '</td>'+
                    '<td>' + category.cat_name + '</td>'+
                    '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a></td>'+
                    '</tr>');

                    

                }
                $('#categtab_id').DataTable();
            },error:function(e){

            }
        });
        
});

var userstab = $("#users_id tbody");
$(document).ready(function(){
    
        $.ajax({
            type: "GET",
            url: "http://localhost/Skates/admin/functions/userDisplay.php",
            datatype :'json',
            success : function(data){
                var data = JSON.parse(data);
                console.log(data);
                for(var i = 0; i< data.length; i++){
                    var users = data[i];
                    userstab.append('<tr>'+
                    '<td>' + users.timestamp + '</td>'+
                    '<td>' + users.user_id + '</td>'+
                    '<td>' + users.user_firstname + '</td>'+
                    '<td>' + users.user_lastname + '</td>'+
                    '<td>' + users.user_age + '</td>'+
                    '<td>' + users.username + '</td>'+
                    '<td>' + users.email+ '</td>'+
                    '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a>'+
                    '<a href="" class="btn btn-warning btn-sm disabled" disabled style="color:white;">View Details<i class="fas fa-trash-alt"></i></a>'+
                    '</td>'+
                    '</tr>');
                }
                $('#users_id').DataTable();
            },error:function(e){

            }
        });
        
});



      // Admin Portal
      $.ajax({
        type: "GET",
        url: "http://localhost/Skates/admin/functions/adminPortal.php",
        datatype :'json',
        success : function(data){
                var userC = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < userC.length; i++){
                    var usersC = userC[i];
                    
                    var admin_id = usersC.user_id;
                    var admin_username = usersC.adminUsername;
                    var userCount = usersC.userCount;
                    var categoryCount = usersC.categoryCount;
                    var brandCount = usersC.brandCount;
                   

                    $("#userCount").html(userCount);
                    $("#adminUsername").html(admin_username);
                    $("#catCount").html(categoryCount);
                    $("#brandCount").html(brandCount);
                   
                
                }

           
        },error:function(e){

        }
    });
    

    $(document).ready(function(){
        // Log Out
    $("#adminlogoutbtn").click(function(){
        $.ajax({
            type: "GET",
            url: "http://localhost/Skates/admin/functions/logout.php",
            datatype :'json',
            success : function(html){
                console.log(html);
                if(html == "Logged Out"){
                     window.location.href = "http://localhost/Skates/admin/page/login.html";
                    
                }
                
            alert(html);
    
               
            },error:function(e){
    
            }
        });

    })

    })

    $(document).ready(function(){
        // Log Out
    $("#userlogoutbtn").click(function(){
        $.ajax({
            type: "GET",
            url: "http://localhost/Skates/function/logout.php",
            datatype :'json',
            success : function(html){
                console.log(html);
                if(html == "Logged Out"){
                     window.location.href = "http://localhost/Skates/page/login.html";
                    
                }
                
            alert(html);
    
               
            },error:function(e){
    
            }
        });

    })

    })


})