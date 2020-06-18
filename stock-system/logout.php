<?php
require_once 'php_action/core.php';

//Remove all session variables.
session_unset();

//destroy the session 
session_destroy();

header('location: http://localhost/stock-system/index.php');


?>
