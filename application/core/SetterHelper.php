<?php
use application\core\DatabaseHelper\DatabaseHelper;

class SetterHelper extends DatabaseHelper
{
    public function __construct()
    {
        parent::__construct();
        $this->con  = $this->connection();
    }

    public function set_transaction($user, $title, $type, $amount, $currency="USD")
    {
        $con  = $this->con;
        $query = mysqli_query($con, "INSERT INTO transactions (user, title, type, amount, currency) VALUES ('$user', '$title', '$type', '$amount', '$currency')");
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function increment_login_times($times)
    {
        $con = $this->con;
        $query = mysqli_query($con ,"UPDATE users SET num_logins='$times' WHERE id='$_SESSION[id]'");
        if($query){
            return true;
        }else{
            return false;
        }
    }

}