<?php

/**
 * BASE CLASS 
 */

// require "../application/config/main.config.php";
use application\core\DatabaseHelper\DatabaseHelper;

class Base
{
    // public $connect;
    public $load;
    public $connection;
    
    public function __construct()
    {        //TODO
       
        $this->load = $this->loader();
        $this->connection = $this->load->helper("application\core\DatabaseHelper\DatabaseHelper")::connection();

    }

    public function baseurl()
    {
        return baseurl;
    }

    public function show404()
    {
        $this->load->template(view_map["dashboard"][35], "dashboard", []);
        die();
    }

    public function loader()
    {
        return new CoreLoader();
    }

    public function num_login_times()
    {
        $con = $this->connection;
        $query = mysqli_query($con, "SELECT num_logins FROM users WHERE id='$_SESSION[id]' ");
        if(mysqli_num_rows($query)>0){
            $data = mysqli_fetch_assoc($query);
            return $data['num_logins'];
        }else{
            return false;
        }
    }
}