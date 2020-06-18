$(document).ready(function(){
    $("a#admin-tit").css({"color":"red"});
    $("a#admin-tit").css({"font-family":"Dancing Script', cursive"});
    // User Registration 
    $("#userReg_btn").click(function(){
        var userFirstName = $("input#userFirstName").val();
        var userSurname = $("input#userSurname").val();
        var userEmail = $("input#userEmail").val();
        var userAddress = $("input#userAddress").val();
        var userAge = $("input#userAge").val();
        var userGender = $("#userGender").val();
        var userUsername = userFirstName + "." + userSurname;
        var userPassword = $("input#userPassword").val();
        var userPassword2 = $("input#userPassword2").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'firstname=' + userFirstName + '&surname=' + userSurname + '&email=' + userEmail + '&userAddress=' + userAddress +
        '&age=' + userAge + '&userGender=' + userGender +'&userUsername=' + userUsername +'&userPassword=' + userPassword + '&userPassword2=' + userPassword2;

        
        if(userFirstName == '' || userSurname == '' || userEmail == '' || userAddress == '' || userAge == '' || userGender == '' || userPassword == '' || userPassword2 == '' || userUsername == '') {
        alert("Please Fill All Fields");

        }
        else {
            console.log("Moves to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Reddix/php_actions/insertUser.php",
        data: dataString,
        success: function(html) {
            if(html == "You have Successfully Registered"){
                $("form")[0].reset();
                window.location.href = "http://localhost/Reddix/index.html";
            }
            else{
                document.getElementById('userLogError').innerHTML=html;
                $("#userLogError").css({"color":"red"});
                
            }

        alert(html);
        }
        });
        }
        return false;

    })

// Adminstration Registration
    $("#adminReg_btn").click(function(){
        var adminFirstName = $("input#adminFirstName").val();
        var adminSurname = $("input#adminSurname").val();
        var adminEmail = $("input#adminEmail").val();
        var adminPassword = $("input#adminPass").val();
        var adminPassword2 = $("input#adminPass2").val();
        var adminCode = $("input#adminCode").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'firstname=' + adminFirstName + '&surname=' + adminSurname + '&email=' + adminEmail 
         + '&adminPassword=' + adminPassword + '&adminPassword2=' + adminPassword2 + '&adminCode=' + adminCode;

        
        if(adminFirstName == '' || adminSurname == '' || adminEmail == '' || adminPassword == '' || adminPassword2 == '' || adminCode == '') {
        alert("Please Fill All Fields");

        }
        else {
            console.log("Moves to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Reddix/php_actions/insertAdmin.php",
        data: dataString,
        success: function(html) {
            if(html == "Welcome Admin"){
                window.location.href = "http://localhost/Reddix/index.html";
            }
            else{
                document.getElementById('adminLogError').innerHTML=html;
                $("#adminLogError").css({"color":"red"});
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
        var userEmail = $("input#userMail").val();
        var userPassword = $("input#userPass").val();

        console.log(userEmail);
        var dataString = 'userEmail=' + userEmail + '&userPassword=' + userPassword;

        if(userEmail == '' || userPassword == ''){
            alert("Please Fill All fields");
        }
        else {
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Reddix/php_actions/logUser.php",
        data: dataString,
        success: function(html) {
            if(html == "Login Successfully"){
                window.location.href = "http://localhost/Reddix/user-portal.html";
                document.getElementById('userLogError').innerHTML= html;
                $("#userLogError").css({"color":"blue"});
            }
            else{
                document.getElementById('userLogError').innerHTML=html;
                $("#userLogError").css({"color":"red"});
                $("form")[0].reset();
                
            }
        
        }
        });
        }
        return false;

    })

    // Admin Login
    $("#adminLogin_btn").click(function(){
        var adminEmail = $("input#adminMail").val();
        var adminPassword = $("input#adminPass").val();
        var adminCode =$("input#adminCode").val();

        console.log(adminEmail);
        var dataString = 'adminEmail=' + adminEmail + '&adminPassword=' + adminPassword + '&adminCode=' + adminCode;

        if(adminEmail == '' || adminPassword == '' || adminCode == ''){
            alert("Please Fill All fields");
        }
        else {
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/Reddix/php_actions/logAdmin.php",
        data: dataString,
        success: function(html) {
            if(html == "Login Successfully"){
                 window.location.href = "http://localhost/Reddix/admin-portal.html";
                document.getElementById('adminLogError').innerHTML= html;
                $("#adminLogError").css({"color":"blue"});
                $("form")[0].reset();
            }
            else{
                document.getElementById('adminLogError').innerHTML=html;
                $("#adminLogError").css({"color":"red"});
                $("form")[0].reset();
                
            }
        alert(html);
        }
        });
        }
        return false;



    })


// Table Entry
var container = $("#table_id tbody");
        $.ajax({
            type: "GET",
            url: "http://localhost/Reddix/admin-portal.php",
            datatype :'json',
            success : function(data){
                    var user = JSON.parse(data);
                    console.log(data);

                    console.log(data);

                    for(var i = 0; i < user.length; i++){
                        var users = user[i];
                        var admin_id = users.admin_id;
                        var admin_name = users.adminName;
                        var user_id = users.user_id;
                        var username = users.username;
                        var timestamp = users.timestamp;
                        var email = users.email;
                        var gender = users.gender;

                        $("#adminName").html(admin_name + " " +'<i class="fas fa-user-circle"></i>');

                       
                        container.append('<tr>'+
                    '<td>' + user_id+ '</td>'+
                    '<td>' + timestamp + '</td>'+
                    '<td>' + username + '</td>'+
                    '<td>' + email + '</td>'+
                    '<td>' + gender + '</td>'+
                    '<td>' + '<a id="delete" href="http://localhost/Reddix/php_actions/deleteUser.php?username=' + username +'&admin_name='+ admin_name +'" class="btn btn-danger del"><i class="fas fa-trash-alt"></i>Delete User</a>'+
                    '<a id="views" href="http://localhost/Reddix/php_actions/viewUser.php?username=' + username +'" class="btn btn-warning disabled"> <i class="fas fa-eye"></i>View Details</a>'+'</td>'+
                    
                    '</tr>');
                    }

                $('#table_id').DataTable();
            },error:function(e){

            }
        });


        $.ajax({
            type: "GET",
            url: "http://localhost/Reddix/php_actions/deleteUser.php",
            datatype :'json',
            success : function(data){
                    // var user = JSON.parse(data);
                    console.log(data);

                    if(data == 'No record available'){
                        window.location.href = 'http://localhost/Reddix/admin-portal.html';
                    }
                    if(data == 'No user found !'){
                        console.log("true");
                    }

                
            },error:function(e){

            }
        });


// User Portal
        $.ajax({
            type: "GET",
            url: "http://localhost/Reddix/user-portal.php",
            datatype :'json',
            success : function(data){
                    var user = JSON.parse(data);
                    console.log(data);
                    for(var i = 0; i < user.length; i++){
                        var users = user[i];
                        var admin_name = users.adminName;
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


        $("#userLogout").click(function(){
            $.ajax({
                type: "GET",
                url: "http://localhost/Reddix/php_actions/userlogout.php",
                datatype :'json',
                success : function(data){
                        var user = JSON.parse(data);
                        console.log(data);
    
                        console.log(data);
    
    
                        
    
                        for(var i = 0; i < user.length; i++){
                            var users = user[i];
                            var admin_name = users.adminName;
                            var user_id = users.user_id;
                            var username = users.username;
                            var timestamp = users.timestamp;
                            var email = users.email;
                            var gender = users.gender;
    
                           alert(data);


    
                           
                        
                        }
    
                   
                },error:function(e){
    
                }
            });
    
        })

        

        

})

 