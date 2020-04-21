<?php

namespace application\model\Confirm_email;
use application\model\Model\Model;

class Confirm_email extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verify_email_exists($email, $type)
    {
        $con  = $this->connection;
        if($type == "sec"){
            $query = mysqli_query($con, "SELECT id FROM secondary_emails WHERE email='$email' AND verify='n' ");
        }else{
            $query = mysqli_query($con, "SELECT email, id FROM users WHERE email='$email' AND verify='n' ");            
        }
        if(mysqli_num_rows($query) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function verify_token($token, $email, $type)
    {
        $con  = $this->connection;
        if($type == "sec"){
            $query = mysqli_query($con, "SELECT id FROM secondary_emails WHERE email='$email' AND verify_key='$token' AND verify='n' ");
        }else{
            $query = mysqli_query($con, "SELECT id FROM users WHERE email='$email' AND verify_key='$token' AND verify='n' ");
        }
        
        if(mysqli_num_rows($query) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function confirm_mail($type)
    {
        $con = $this->connection;
        if(isset($_GET['email']) && isset($_GET['token'])){
            $email = $_GET['email'];
            $token = $_GET['token'];
            if($this->verify_email_exists($email, $type)){
                if($this->verify_token($token, $email, $type)){
                    if($type == "sec"){
                        $query = mysqli_query($con, "UPDATE secondary_emails SET verify='y' WHERE email='$email' ");
                    }else{
                        $query = mysqli_query($con, "UPDATE users SET verify='y' WHERE email='$email' ");
                    }
                    if($query){
                        return json_encode(array("status"=>"success", "message"=>"verified"));
                    }else{
                        return json_encode(array("status"=>"error", "message"=>"could not verify"));
                    }
                }else{
                    return json_encode(array("status"=>"token_invalid", "message"=>"Token Expired!"));
                }
            }else{
                return json_encode(array("status"=>"error", "message"=>"Email could not be verified"));
            }
        }else{
            return json_encode(array("status"=>"error", "message"=>"Email not found"));
        }
        
    }
}