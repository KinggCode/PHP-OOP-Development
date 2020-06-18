 <!-- The first page the user visit begin the website is launched. Links to login will be provided. -->
 <?php
require_once('core/init.php');

// var_dump(Config::get('myseql/db'));
// print_r(DB::getInstance()->query("SELECT username FROM users"));
// query("SELECT username FROM users WHERE username = ?", array('eugene.parker'));

// $user = DB::getInstance()->get('users',array('username','=','Harry'));

// if(!$user->count()){
//     echo("No User");
// }
// else{
//     foreach($user->results() as $user){
//         echo($user->username. "<br>");
//     }
// }




// $user = DB::getInstance()->insert('users',array(
//     'username' => 'Dale',
//     'password' => 'password',
//     'salt' => 'salt'
// ));



// $user = DB::getInstance()->update('users',9,array(
//     'password' => 'newpassword',
//     'fullname' => 'Gazebo',
//     'groupd' => '1'

// ));
// if(Session::exists('success')){
//     echo(Session::flash('success'));

// }

if(Session::exists(('home'))){
    echo('<p>'.Session::flash('home'). '</p>');
}





?>
