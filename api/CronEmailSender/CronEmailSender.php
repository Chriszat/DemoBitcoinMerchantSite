<?php

// require "/home/homegrns/public_html/vendor/autoload.php";
// require "/home/homegrns/public_html/application/config/main.config.php";

require "C:/xampp/htdocs/bitcoin/vendor/autoload.php";
require "C:/xampp/htdocs/bitcoin/application/config/main.config.php";

class CronEmailSender extends Cron
{
    public function __construct()
    {
        parent::__construct();
     
        $this->sendNewJobEmailNotification();
    }

    public function sendNewJobEmailNotification()
    {
        $url = baseurl."api/api.py.php?_=SendCronMailer&a=sendNewJobEmailNotification&AVOID=true";
        $ch = curl_init($url);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
    }
    
}

$run = new CronEmailSender();