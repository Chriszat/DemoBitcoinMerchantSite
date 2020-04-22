<?php

/**
 * This class performs
 * bitcoin mining 
 * actions and transactions.
 * @author Ihebuzo Chris
 */


class BitcoinMine extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->bitcoin = $this->load->helper("Bitcoin");
        $this->setter = $this->load->helper("SetterHelper");
        $this->con = $this->connection;
    }

    public function index()
    {
        //  $data["user"] = $this->getter->user_data($_SESSION['id']);
        $data["usd_wallet"] = $this->getter->user_wallet()["usd"];
        $this->load->template(view_map["dashboard"][31], "dashboard", $data);
    }

    public function purchasePlan()
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $usd_balance = $this->getter->user_wallet()["usd"];

        $query = mysqli_query($this->con, "SELECT * FROM mining_plans WHERE plan='$type' ");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            if($usd_balance < $data['price']){
                echo json_encode(array("status"=>"low_funds"));
                return;
            }

            $query = mysqli_query($this->con, "INSERT INTO mining_investments (users_id) VALUES ('$_SESSION[id]')");
            if($query){
                echo json_encode(array("status"=>"success", "message"=>"started"));
                return;
            }else{
                echo json_encode(array("status"=>"error", "message"=>"An Unexpected error occurred"));
                return;
                
            }
        }
    }
}