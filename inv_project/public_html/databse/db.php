 <?php

#Database Class 

class Database
{
    private $con ;
    
    public function connect(){
        include("constants.php");
        $this->con = new Mysqli(HOST,USER,PASS,DB);
        if($this->con){
            // echo("Connected");
            return $this->con;
        }
        else{
            return "DATABASE CONNECTION FAIL";
        }
    }

}

// $db = new Database();
// $db->connect();


?>