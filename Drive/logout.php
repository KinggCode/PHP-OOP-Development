<?php

session_start();
unset($_SESSION["customer_id"]);
unset( $_SESSION["customer_fullname"]);
unset($_SESSION["customer_email"]);
unset($_SESSION["customer_password"]);
unset($_SESSION["customer_country"]);
unset($_SESSION["customer_city"]);
header("Location: http://localhost/drive/index.php");


?>