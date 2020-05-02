<?php
require "C:/xampp/htdocs/bitcoin/application/config/config.php";

$url = baseurl . "api/api.py.php?_=CronJob&a=get_btc_new_reward&AVOID=true";
$ch = curl_init($url);
curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$result = curl_exec($ch);
print_r($result);