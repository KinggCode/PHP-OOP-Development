<!-- Must be included on every page that is loaded. this file help with autoloading , -->
<?php

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host'=>'127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'OOP'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name'=>'user',
        'token_name' => 'token'
    )
);


spl_autoload_register(function($class){
    require_once('classes/'.$class.'.php');
});
echo "hugyftrxxty";
require_once('functions/sanitize.php');

?>
