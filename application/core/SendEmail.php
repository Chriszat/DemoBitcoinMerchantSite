<?php

/**
 * Send Email class
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use \Mailjet\Resources;

require '../application/shared/phpmailer/phpmailer/src/Exception.php';
require '../application/shared/phpmailer/phpmailer/src/PHPMailer.php';
require '../application/shared/phpmailer/phpmailer/src/SMTP.php';
require '../application/shared/phpmailer/autoload.php';
require '../vendor/autoload.php';

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
        $config = [];
        $settings = $this->getter->settings();
        // $config["name_from_email"]=explode("@", $info['email'])[0];
        $config["username"] = $settings['from_email'];
        $config["password"] = $settings['email_password'];;
        $config["sitename"] = $settings['sitename'];
        $config["smtp"] = $settings['email_smtp'];
        return $config;
    }


    public function send_mail_old_mail($to_email, $subject, $message, $alt)
    {
        $settings = $this->getter->settings();
        $mj = new \Mailjet\Client('9a5eb72e345717b151fa28c8d8f2c4b3', 'ad4e36e55034641ed1c3b39349f18aff', true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "support@cryptomineexpress.com",
                        'Name' => $settings['sitename'],
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => explode("@", $to_email)[0],
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => "My first Mailjet email",
                    'HTMLPart' => $message,
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        echo json_encode(array('status' => 'success', "message" => "Email sent."));
        
        // $response->success() && var_dump($response->getData());
    }

    public function send_mail_sengrid($to_email, $subject, $message, $alt)
    {

        $email = new \SendGrid\Mail\Mail();
        $settings = $this->getter->settings();
        $email->setFrom($settings["from_email"], $settings["sitename"]);
        $email->setSubject($subject);
        $email->addTo($to_email, "user");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html",
            $message
        );

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {

            $response = $sendgrid->send($email);
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
            echo json_encode(array('status' => 'success', "message" => "Email sent."));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', "message" => "Could not send mail to that address"));
            // echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    public function send_mail__($email, $subject, $message, $alt)
    {

        // $name = stripslashes($_POST['name']);
        $email = $email;
        $message = $message;
        $url = baseurl;

        $e_subject = $subject;
        $settings = $this->getter->settings();


        // Configuration option.
        // You can change this if you feel that you need to.
        // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

        $e_body = $message;
        $e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
        $e_content = "Message:\r\n$message" . PHP_EOL . PHP_EOL;
        $e_url = "\r\nWebsite: $url" . PHP_EOL . PHP_EOL;

        $msg = wordwrap($e_body . $e_reply, 70);

        // $headers = "MIME-Version: 1.0" . "\r\n"; 
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // $headers .= "From: $email" . PHP_EOL;
        // $headers .= "Reply-To: $email" . PHP_EOL;
        // $headers .= "Website: $url" . PHP_EOL;
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        //$headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
        $headers[] = 'From: ' . $settings['mailing_email'];
        //$headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        //$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

        if (mail($email, $subject,  $message, implode("\r\n", $headers))) {

            echo json_encode(array('status' => 'success', "message" => "Email sent."));
        } else {
            echo json_encode(array('status' => 'error', "message" => "Could not send mail to that address"));
        }
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
            $mail->Host = $smtp;                  // Specify main and backup SMTP servers
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
            $email = $email;
            $mail->setFrom('noreply@mailer.com');
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
            echo json_encode(array('status' => 'success', "message" => "Verification email sent."));
        } catch (Exception $e) {
            print_r($e);
            echo json_encode(array('status' => 'error', "message" => "Could not send mail to that address"));
            $mail->ErrorInfo;
        }
    }

    public function send_verification_email($email, $subject, $data = [], $alt)
    {

        $message = $this->load->load_email_template("../application/shared/email_template/verification.template.php", $data);
        $message = str_replace(["{{sitename}}", "{{email}}", "action_url", "{{link}}"], [$data["sitename"], $email, $alt, $data["link"]], $message);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }

    public function secondary_email_verification($email, $subject, $data = [], $alt)
    {
        $message = $this->load->load_email_template("../application/shared/email_template/secondary_email_verification.template.php", $data);
        $message = str_replace(["sitename", "toemail", "action_url", "link", "#user"], [$data["sitename"], $email, $alt, $data["link"], $data["username"]], $message);
        print_r($data);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }

    public function send_btc_transfer_notification($email, $subject, $data = [], $alt)
    {

        $message = $this->load->load_email_template("../application/shared/email_template/transfer_notification.php", $data);
        $message = str_replace(["{{sitename}}", "{{username}}", "{{btc_address}}", "{{btc_value}}", "{{transaction}}", "{{currency}}", "{{logo}}"], [$data["sitename"], $data['username'], $data['btc_address'], $data["btc_value"], $data['transaction'], $data["currency"], $data["logo"]], $message);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }

    public function send_btc_mining_success($email, $subject, $data = [], $alt)
    {

        $message = $this->load->load_email_template("../application/shared/email_template/btc_mine_success.php", $data);
        $message = str_replace(["{{sitename}}", "{{username}}", "{{btc_address}}", "{{btc_reward}}",  "{{logo}}", "{{dashboard_link}}", "{{year}}", "{{mining_plan}}", "{{time_mined}}", "{{support_link}}", "{{ref_code}}",], [$data["sitename"], $data['username'], $data['btc_address'], $data["btc_value"],  $data["logo"], $data["dashboard_link"], $data["year"], $data["mining_plan"], $data["time_mined"], $data["support_link"], $data["ref_code"]], $message);

        $verify = $this->send_mail($email, $subject, $message, $alt);
    }


    public function loader()
    {
        return new CoreLoader();
    }

    public function generate_email_token()
    {
        return sha1(str_shuffle("abcdefghijklmnopqrstuvwxyz") . time());
    }
}
