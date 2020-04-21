<?php
/**
 * Send Email class
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../application/shared/phpmailer/phpmailer/src/Exception.php';
require '../application/shared/phpmailer/phpmailer/src/PHPMailer.php';
require '../application/shared/phpmailer/phpmailer/src/SMTP.php';
require '../application/shared/phpmailer/autoload.php';

class SendEmail
{
    private $load;
    private $getter;

    public function __construct()
    {
        $this->load = $this->loader();
        $this->getter = $this->load->helper("GetterHelper");
    }

    public function configuration()
    {
        $config=[];
        // $config["name_from_email"]=explode("@", $info['email'])[0];
        $config["username"]=$this->getter->settings()['from_email'];
        $config["password"]=$this->getter->settings()['email_password'];;
        $config["sitename"]=$this->getter->settings()['sitename'];
        return $config;
    }

    /**
     * Sends mail to a specific email 
     * address
     */
    public function send_mail($email, $subject, $message, $alt)
    {
        $mail = new PHPMailer(true);                          // Passing `true` enables exceptions
        $config = $this->configuration();
        extract($config);
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $username;           // SMTP username
            $mail->Password = $password;                // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            //Recipients
            $email=$email;
            $mail->setFrom('noreply@'.$sitename.'.localhost', $sitename);
            $mail->addAddress($email);     // Add a recipient
            //$mail->addReplyTo('informaljoke@gmail.com', 'Asifor');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $message   = $message;
            $mail->Body    = $message;
            $mail->AltBody = $alt;
            $mail->send();
            echo json_encode(array('status'=>'success', "message"=>"Verification email sent."));
        }catch (Exception $e) {
            echo json_encode(array('status'=>'error', "message"=>"Could not send mail to that address"));
            $mail->ErrorInfo;
        }
    }

    public function send_verification_email($email, $subject, $data=[], $alt)
    {
        
        $message = $this->load->load_email_template("../application/shared/email_template/verification.template.php", $data);
        $message = str_replace(["sitename", "toemail", "action_url", "link"], [$data["sitename"], $email, $alt, $data["link"]], $message);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }

    public function secondary_email_verification($email, $subject, $data=[], $alt)
    {
        $message = $this->load->load_email_template
        ("../application/shared/email_template/secondary_email_verification.template.php", $data);
        $message = str_replace(["sitename", "toemail", "action_url", "link", "#user"], [$data["sitename"], $email, $alt, $data["link"], $data["username"]], $message);
        print_r($data);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }

    public function loader()
    {
        return new CoreLoader();
    }

    public function generate_email_token()
    {
        return sha1(str_shuffle("abcdefghijklmnopqrstuvwxyz").time());
    }

}
