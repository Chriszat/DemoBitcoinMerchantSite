<?php

namespace application\model\Model;

class Model
{
    public $connection;
    public $load;

    public function __construct()
    {
        //TODO
        $this->load = $this->loader();
        $this->connection = $this->load->helper("application\core\DatabaseHelper\DatabaseHelper")::connection();

    }

    public function loader()
    {
        $obj = new \CoreLoader();
        return $obj;
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