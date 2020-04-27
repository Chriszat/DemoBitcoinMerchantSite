<?php

/**
 * User registeration class
 */
use application\core\Validation\Validation;

class Log extends Base
{
    private $validate;
    private $mail;
    private $getter;
    public $connection;

    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->validate = $this->load->helper("application\core\Validation\Validation");
        $this->mail = $this->load->helper("SendEmail");
        $this->getter = $this->load->helper("GetterHelper");
        $this->connection = $this->load->helper("application\core\DatabaseHelper\DatabaseHelper")::connection();
        
    }

    public function login()
    {
        $con = $this->connection;
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST["email"];
            $password = md5($_POST['password']);
            
                $stmt = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password ='$password' ");
               
                if(mysqli_num_rows($stmt)>0){
                    $data = mysqli_fetch_assoc($stmt);
                    $email = $data["email"];
                    $id = $data["id"];
                    if($this->validate->is_email_verified($email)){
                        $settings = $this->getter->settings();
                        if($settings['confirm_accounts'] == 1){
                            if($data["confirmed"] == 0){
                                echo json_encode(array("status"=>"error", "message"=>"<p>Your account is pending confimration from us. We will send an email to <b>$email</b>  as soon as we confirm your account, then you can have access to your dashboard. "));
                                die();
                            }
                        }
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $id;
                        echo json_encode(array("status"=>"success", "message"=>"Login successfull", "redirect"=>baseurl."wallet/"));
                        $_SESSION['session_time'] = time();
                        $this->set_logins();
                        return;
                    }else{
                        $_SESSION['confirm_email'] = $email;
                        echo json_encode(array("status"=>"error", "message"=>"<p>You havent verified your email <b>".$email."</b> <button class='btn' id='resend' onclick='resend_email(\"$email\")'><a href='javascript:void(0)' class='white'><div class='lds-ring' style='display:none' id='spinner'><div></div><div></div><div></div><div></div></div>&nbsp;&nbsp;&nbsp;Resend Verification</a></button>"));
                        return;
                    }
                   
                }else{
                    echo json_encode(array("status"=>"error", "message"=>"Incorrect login details"));
                    return;
                }
           
        }
    }

    public function is_confirmed()
    {
        $con = $this->connection;
        if(isset($_SESSION['confirm_email'])){
            $email = $_SESSION['confirm_email'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND verify='y' ");
            if(mysqli_num_rows($query)>0){
                echo  json_encode(array('status'=>'success', 'message'=>'true'));
                return;
            }else{
                echo  json_encode(array('status'=>'error', 'message'=>'false'));
                return;
            }
        }else{
            echo  json_encode(array('status'=>'error', 'message'=>'false'));
            return;
        }
    }

    public function set_logins()
    {
        $con = $this->connection;
        $query = mysqli_query($con, "UPDATE users SET current_logins=current_logins+1,  num_logins=num_logins+1 WHERE id='$_SESSION[id]' ");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
}