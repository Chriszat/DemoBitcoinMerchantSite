<?php

/***
 * Validation class for validating data
 * and checking if data exists.
 */

namespace application\core\Validation;
use application\core\DatabaseHelper\DatabaseHelper;

class Validation
{
    public $con;

    public function __construct()
    {
        //TODO
        $this->con = $this->connect();
    }

    public function is_exists($table, $haystack, $needle)
    {
        $con = $this->con;
        $query  = mysqli_query($con, "SELECT * FROM $table WHERE $haystack='$needle' ") or die(mysqli_error($con));
        if(mysqli_num_rows($query)>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function validate_password($password)
    {
        if(strlen($password) >= 8){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function is_email($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function is_email_verified($email)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND verify='y' ");
        if(mysqli_num_rows($query)>0){
            return true;
        }else{
            return false;
        }
    }

    public function validate_user_session($redirect=false)
    {
        $con = $this->con;
        if(isset($_SESSION['email']) && isset($_SESSION['id']))
        {
            $email = $_SESSION['email'];
            $id = $_SESSION['id'];

            $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND id='$id'");
           
            if(mysqli_num_rows($query)>0){
               return true;
            }else{
                if($redirect == true){
                    header("location:".baseurl."login/");
                    return;
                }else{
                    return false;
                }    
            }
        }else{
            if($redirect == true){
                header("location:".baseurl."login/");
                return;
            }else{
                return false;
            }    
        }
    }

    public function last_activity($redirect = false)
    {
        if(!isset($_SESSION['session_time'])){
            $_SESSION['session_time'] = time();
        }

        if(time() - $_SESSION['session_time'] > 50){
            if($redirect == true){
                header("location:".baseurl.'login/');
            }else{
                return true;
            }
        }else{
            $_SESSION['session_time'] = time();
        }
    }

    public function connect()
    {
        $con = new DatabaseHelper();
        return $con::connection();
    }
}