<?php

include_once("./databse/constants.php");
if(isset($_SESSION["user_id"])){
    session_destroy();
}
header("Location:".DOMAIN."/");


?>