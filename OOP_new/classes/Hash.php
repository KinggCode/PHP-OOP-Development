<!-- This file will allow you to generate variety of hashes, salt , gemohash,password,  -->
<?php

class Hash{

    public static function make($string, $salt=''){
        return hash('sha256',$string . $salt);

    }

    // function mcrypt_create_iv($length){
    //     return openssl_random_pseudo_bytes($length);
    // }

    public static function salt($length){
        if(!function_exists('mcrypt_create_iv')){
            return openssl_random_pseudo_bytes($length);
        }

    }

    public static function unique(){
        return self::make(uniqid());
    }

}



?>
