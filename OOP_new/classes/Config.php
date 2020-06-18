<!-- Thie files will allow you to draw from the config options from your config  in and out.php file  located @core.php -->
<?php

class Config{
    public static function get($path = null ){
        if($path){
            $config = $GLOBALS['config'];
            $path =  explode('/',$path);

            foreach($path as $bit){
               if(isset($config[$bit])){
                  $config = $config[$bit];
               }
            }
            return $config;
        }
        return false;

    }
}

?>


