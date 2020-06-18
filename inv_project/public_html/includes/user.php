<?php

class User{
    private $con; 
    public function __construct(){
        include_once("../databse/db.php");
        $db = new Database();
        $this->con = $db->connect();
        if($this->con){
            // echo("Connected");
        }

    }
    // User is already registered or not 
    private function emailExists($email){
        $pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function createUserAccount($username,$email,$password,$usertype){
        // To protect your application from sql attack you can user 
        // prepares statement
        if($this->emailExists($email)){
            return "EMAIL_ALREADY_EXISTS";
        }
        else{
            $pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
            $date = date("Y-m-d");
            $notes = "";
            $time_format = "Y-m-d h:m:s";
            $last_login = date($time_format);
            $pre_stmt = $this->con->prepare("INSERT INTO user(username,email,password,usertype,register_date,last_login,notes) VALUES(?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssss",$username,$email,$pass_hash,$usertype,$date,$last_login,$notes);
            $result = $pre_stmt->execute() or die($this->con->error);
            if($result){
                return $this->con->insert_id;
            }else{
                return "SOME_ERROR";
            }
    }
        }


    public function userLogin($email,$password){
        $pre_stmt = $this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email = ? ");
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows < 1 ){
            return "NOT_REGISTERED";
        }
        else{
            $row = $result->fetch_assoc();
            if(password_verify($password,$row["password"])){
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["last_login"] = $row["last_login"];

                #Time Updates : User Login Time
                $time_format = "Y-m-d h:m:s";
                $last_login = date($time_format);
                $pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ? ");
                $pre_stmt->bind_param("ss",$last_login,$email);
                $result = $pre_stmt->execute() or die($this->con->error);
                // $result = $pre_stmt->get_result();
                if($result){
                    return 1;
                }
                else{
                    return 0;
                }
                

            }
            else{
                return "PASSWORD_NOT_MATCHED";
            }
        }


    }

        
}

// $user = new User();
// echo $user->createUserAccount("Eugene Parker","eugene@gmail.com","1234567890","Admin");
// echo $user->createUserAccount("Tasha Mwenga","tashmwen@gmail.com","1234567890","Other");

// User Login
// echo $user->userLogin("tashmwen@gmail.com","1234567890");
// echo($_SESSION['username']);


?>