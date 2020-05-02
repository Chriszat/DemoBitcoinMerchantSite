<?php

class SendCronMailer extends Base
{
    public $mail;
    public $setter;
    public function __construct()
    {
        parent::__construct();
        $this->mail = $this->load->helper("SendEmail");
        $this->setter = $this->load->helper("SetterHelper");
    }

    /**
     * Sends new email to providers
     * who has been selected for a particular job
     * by the admin
     */
    public function sendMiningNotification($data)
    {
        
        $this->mail->send_btc_mining_success($data["email"], $data["subject"], $data=[], $data["alt"]);
    }

    
}