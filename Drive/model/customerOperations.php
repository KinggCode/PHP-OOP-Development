<?php
include_once("../database/db_connect.php");

class Customer extends dbConnection {

    public $customerIp;

        // To prevent the platform from sql injection ....  KEEP THIS PROPERTY : emailExists PRIVATE
        private function emailExists($email){
            $stmt = $this->dbconnect()->prepare("SELECT customer_id FROM customer WHERE customer_email = ? ");
            $stmt->bind_param("s",$email);
            $stmt->execute() or die($this->dbconnect()->error);
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                //return 1;
                return "already exist";
            }
            else{
                return 0;
            }
        }


        // Create Customer Function
        public function createUserAccount($cname,$cemail,$cpass){
            // To protect your application from sql attack you can user 
            // prepares statement
            if($this->emailExists($cemail)){
                return "EMAIL_ALREADY_EXISTS";
            }
            else{
                $pass_hash = password_hash($cpass,PASSWORD_BCRYPT,["cost"=>8]); //Encrypt the password.
                $stmt = $this->dbconnect()->prepare("INSERT INTO customer(customer_fullname,customer_email,customer_password) VALUES(?,?,?)");
                $stmt->bind_param("sss",$cname,$cemail,$pass_hash);
                $result = $stmt->execute() or die($this->dbconnect()->error);
                if($result){
                    // return $this->dbconnect()->insert_id;
                    return "REGISTRATION_SUCCESS";
                }else{
                    return 0;
                }
        }
            }


        
        // Customer Login Method
        public function customerLogin($email,$password){
            $stmt = $this->dbconnect()->prepare("SELECT customer_id,customer_fullname,customer_email,customer_password FROM customer WHERE customer_email = ? ");
            $stmt->bind_param("s",$email);
            $stmt->execute() or die($this->dbconnect()->error);
            $result = $stmt->get_result();
            if($result->num_rows < 1 ){
                return "NOT_REGISTERED";
            }
            else{
                $row = $result->fetch_assoc();
                if(password_verify($password,$row["customer_password"])){
                    session_start();
                    $_SESSION["customer_id"] = $row["customer_id"];
                    $_SESSION["customer_fullname"] = $row["customer_fullname"];
                    $_SESSION["customer_email"] = $row["customer_email"];
                    $_SESSION["customer_password"] = $row["customer_password"];
                    // $_SESSION["customer_country"] = $row["customer_country"];
                    // $_SESSION["customer_city"] = $row["customer_city"];
                    
                    return "LOGIN_SUCCESSFUL";
                    }
                else{
                    return "PASSWORD_MISMATCH";
                }
                    
            }
    
        }
// Customer General Update 
        public function custGenenralUpdate($cid,$cfn,$ccon,$ccity,$cphone,$cadd){
            $stmt = $this->dbconnect()->prepare("SELECT customer_name FROM customer WHERE customer_id = ?");
            $stmt->bind_param("s",$cid);
            $stmt->execute() or die($this->dbconnect()->error);
            $result = $stmt->get_result();

            if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("UPDATE customer SET customer_name = ?, customer_country = ?, customer_city = ?, customer_contact = ?,customer_address = ? WHERE customer_id = $cid");
            $stmt->bind_param("sssss",$cfn,$ccon,$ccity,$cphone,$cadd);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "CUSTOMER_DETAILS_UPDATED";
            }else{
                return "SOME_ERROR";
        }
       
    }else{
        return "CUSTOMER_DOES_NOT_EXIST";
    }
}

// Customer Password Update 
public function custPassUpdate($cid,$cpwd){
    $stmt = $this->dbconnect()->prepare("SELECT customer_fullname FROM customer WHERE customer_id = ?");
    $stmt->bind_param("s",$cid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();

    if($result->num_rows == 1){
            $pwd = password_hash($cpwd,PASSWORD_BCRYPT,["cost"=>8]);
            $stmt = $this->dbconnect()->prepare("UPDATE customer SET customer_password = ? WHERE customer_id = $cid");
            $stmt->bind_param("s",$pwd);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "CUSTOMER_PASSWORD_UPDATED";
            }else{
                return "SOME_ERROR";
        }
       
    }else{
        return "CUSTOMER_DOES_NOT_EXIST";
    }
   
   
}

// Customer Email Update..
public function custEmailUpdate($cid,$ce){
    $stmt = $this->dbconnect()->prepare("SELECT customer_name FROM customer WHERE customer_id = ?");
    $stmt->bind_param("s",$cid);
    $stmt->execute() or die($this->dbconnect()->error);
    $result = $stmt->get_result();

    if($this->emailExists($ce)){
        return "EMAIL_ALREADY_IN_USE";
    }else{
        if($result->num_rows == 1){
            $stmt = $this->dbconnect()->prepare("UPDATE customer SET customer_email = ? WHERE customer_id = $cid");
            $stmt->bind_param("s",$ce);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                return "CUSTOMER_EMAIL_UPDATED";
            }else{
                return "SOME_ERROR";
            }
           
        }else{
            return "CUSTOMER_DOES_NOT_EXIST";
        }
        }
       
    }

    public function MessageCreate($confn,$consur,$conemail,$consubj,$conmessage){
        // To protect your application from sql attack you can user 
        // prepares statement
            $stmt = $this->dbconnect()->prepare("INSERT INTO contact(contact_first,contact_sur,contact_email,contact_sub,contact_message) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss",$confn,$consur,$conemail,$consubj,$conmessage);
            $result = $stmt->execute() or die($this->dbconnect()->error);
            if($result){
                // return $this->dbconnect()->insert_id;
                return "MESSAGE_SUBMITTED";
            }else{
                return 0;
            }
   
        }


    }

    // $obj = new Customer();
    // echo($obj->customerLogin("ee@g.com","1234"));


    

?>