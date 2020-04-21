<?php

/**
 * User registeration class
 */
use application\core\Validation\Validation;

class Reg extends Base
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
        $this->bitcoin = $this->load->helper("Bitcoin");
    }

    public function register()
    {
        $con = $this->connection;
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $country = isset($_POST['country']) ? $_POST['country'] : "";
        $csrf_token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : "";
        $agree = isset($_POST['agree']) ? $_POST['agree'] : "no";
        $settings = $this->getter->settings();
        $token = $this->mail->generate_email_token();
        if(isset($_SESSION['csrf_token'])){
            if($_SESSION['csrf_token'] == $csrf_token){
                if(!$this->validate->is_email($email)){
                    echo json_encode(array("status"=>"error", "message"=>"Invalid email address"));
                    return;
                }
                if($email !="" && $password!= "" && $agree !="no" && $country !=""){
                    if(!$this->validate->is_exists("users", "email", $email)){
                        if($this->validate->validate_password($password)){
                            $verify_key = $token;
                            $stmt = mysqli_prepare($con, "INSERT INTO users (email, password, country, verify_key) VALUES (?, ?, ?, ?)");
                            $password = md5($password);
                            mysqli_stmt_bind_param($stmt, "ssss", $email, $password, $country, $verify_key);
                            $exec = mysqli_stmt_execute($stmt);
                            $last_id = mysqli_insert_id($con);
                            if($exec){
                                $this->bitcoin->create_wallet($last_id);
                                $subject = "Confirm your email address";
                                $data["email"] = $email;
                                $data["extra"] = "verify this email address";
                                $data["sitename"] = $settings["sitename"];
                                $data["link"] = baseurl."confirm_email/?email=".strtolower($email)."&token=".$token;
                                ob_start();
                                $send_mail = $this->mail->send_verification_email($email, $subject, $data, $data["link"]);
                                ob_end_clean();
                                echo json_encode(array("status"=>"success", "message"=>""));
                                $_SESSION['confirm_email'] = $email;
                                
                                return;
                            }
                        }else{
                            echo json_encode(array("status"=>"error", "message"=>"Password Error: must be at least 8 characters"));
                            return;
                        }
                    }else{
                        echo json_encode(array("status"=>"error", "message"=>"This email <b>".strtolower($email)."</b> already exists"));
                        return;
                    }
                }else{
                    echo json_encode(array("status"=>"error", "message"=>"Fill in the form correctly and accept our terms & conditions"));
                    return;
                }
            }else{
                echo json_encode(array("status"=>"error", "message"=>"invalid token id"));
                return;
            }
        }else{
            echo json_encode(array("status"=>"error", "message"=>"Token not set"));
            return;
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

    public function resend_link()
    {
        $con = $this->connection;
        if(isset($_SESSION['confirm_email'])){
            $email = $_SESSION['confirm_email'];
            $settings = $this->getter->settings();
            $token = $this->mail->generate_email_token();
            $stmt = mysqli_prepare($con, "UPDATE users SET verify_key=? WHERE email=? ");
            mysqli_stmt_bind_param($stmt, "ss", $token, $email);
            $exec = mysqli_stmt_execute($stmt);
            if($exec){
                $subject = "Confirm your email address";
                $data["email"] = $email;
                $data["extra"] = "verify this email address";
                $data["sitename"] = $settings["sitename"];
                $data["link"] = baseurl."confirm_email/?email=".strtolower($email)."&token=".$token;
                $send_mail = $this->mail->send_verification_email($email, $subject, $data, $data["link"]);
                echo $send_mail;
                $_SESSION['confirm_email'] = $email;
            }
        }
    }

   
}