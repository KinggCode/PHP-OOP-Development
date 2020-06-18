<?php

require_once('core/init.php');

// var_dump(Token::check(Input::get('token')));



if(Input::exists()){
    if(Token::check(Input::get('token'))){
        // echo("I have been run");
$validate = new Validate();
$validation = $validate->check($_POST,array(
    'username' => array(
        'required' => true,
        'min' => 2,
        'max' => 20,
        'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6,
        ),
        'repassword' => array(
            'required' => true,
            'matches' => 'password',
        ),
        'name' => array(
            'required' => true,
            'min' => 2,
            'max' => 50
        )
));



if($validation->passed()){
    $user = new User();
    $salt = Hash::salt(32);
    try{
        $user->create(array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password'),$salt),
            'salt' => $salt,
            'fullname' => Input::get('name'),
            'joined' => date('Y-m-d H:i:s'),
            'groupd' => 1,
        ));

       Session::flash('home','You have been registered and can now be log in !');
       Redirect::to(404);


    }catch(Exception $e){
        die($e->getMessage());

    }

  }else{
      // Output Errors
     foreach($validation->errors() as $error){
        echo($error.'<br>');
     }
  }
}
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equine Registration </title>
</head>
<body>

<form action="" method="POST">
<div class="field">
<label for="username"> Username </label>
<input type="text" name="username" id="username" value="<?php echo(escape(Input::get('username'))); ?>" autocomplete="off">
</div>

<div class="field">
<label for="password">Choose a password</label>
<input type="password" name="password" id="password">
</div>

<div class="field">
<label for="repassword">Re-type Password </label>
<input type="password" name="repassword" id="repassword">
</div>

<div class="field">
<label for="name">Name</label>
<input type="text" name="name" id="name" value="<?php echo(escape(Input::get('name'))); ?>">
</div>

<input type="hidden" name="token" value="<?php echo(Token::generate());  ?>">

<input type="submit" name="submit"  value="Register">





</form>

</body>
</html>
