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
        $query = mysqli_query($this->con, "SELECT * FROM mining_investments WHERE users_id='$_SESSION[id]'");
        if (mysqli_num_rows($query) > 0) {
            $data["investments"] = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $data["con"] = $this->con;
            $this->load->template(view_map["dashboard"][33], "dashboard", $data);
        } else {
            $this->load->template(view_map["dashboard"][31], "dashboard", $data);
        }
    }

    public function miningPlans()
    {
        $data["usd_wallet"] = $this->getter->user_wallet()["usd"];
        $this->load->template(view_map["dashboard"][31], "dashboard", $data);    
    }

    public function miningPoolIndex()
    {
        $hash = $_POST['hash'];
        $data["mining_info"] = $this->getter->getMiningInfo($hash, $_SESSION['id']);
        $mining_id = $data['mining_info']['mining_plans_id'];
        $data["mining_plan_info"] = mysqli_fetch_assoc(mysqli_query($this->con, "SELECT * FROM mining_plans WHERE id='$mining_id' "));
        $this->load->template(view_map["dashboard"][32], "dashboard", $data);
    }

    public function updateMiningRecord()
    {
        extract($_POST);
        $investment_info = $this->getter->getMiningInfo($hash, $_SESSION['id']);
        $mining_id = $investment_info['mining_plans_id'];
        $plan_info = mysqli_fetch_assoc(mysqli_query($this->con, "SELECT * FROM mining_plans WHERE id='$mining_id' "));
        $formular = $plan_info['duration_hours'] * 60;
        $new_btc_reward = number_format($plan_info['btc_reward'] / $formular, 8);
        $new_btc_reward = number_format($investment_info['btc_mined'] + $new_btc_reward, 8);
        mysqli_query($this->con, "UPDATE mining_investments SET btc_mined='$new_btc_reward', full_mined_time='$full_time_mined' ");
        echo json_encode(array("status" => "success", "reward" => $new_btc_reward));
    }

    public function purchasePlan()
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $usd_balance = $this->getter->user_wallet()["usd"];

        $query = mysqli_query($this->con, "SELECT * FROM mining_plans WHERE plan='$type' ");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            if ($usd_balance < $data['price']) {
                echo json_encode(array("status" => "low_funds"));
                return;
            }

            $r = random_bytes(16);
            $hash = bin2hex($r);

            $query = mysqli_query($this->con, "INSERT INTO mining_investments (users_id, id_hash) VALUES ('$_SESSION[id]', '$hash')");
            if ($query) {
                echo json_encode(array("status" => "success", "message" => "started", "hash" => $hash));
                return;
            } else {
                echo json_encode(array("status" => "error", "message" => "An Unexpected error occurred"));
                return;
            }
        }
    }
}
