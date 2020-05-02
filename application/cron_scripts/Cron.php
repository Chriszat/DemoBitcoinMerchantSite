<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/9/2019
 * Time: 11:48 AM
 */
$a = explode('/', __DIR__);
$dir = array_pop($a);


// require "/home/homegrns/public_html/application/config/database.php";
// require "/home/homegrns/public_html/application/config/main.config.php";
// require "/home/homegrns/public_html/vendor/autoload.php";


require "C:/xampp/htdocs/bitcoin/application/config/database.php";
require "C:/xampp/htdocs/bitcoin/application/config/main.config.php";
require "C:/xampp/htdocs/bitcoin/vendor/autoload.php";



class Cron extends  Base
{
    protected $con;
    public $mail;
    public function __construct()
    {
        parent::__construct();
        $this->con = $this->connection;
    }
}
