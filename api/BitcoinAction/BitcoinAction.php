<?php

class BitcoinAction extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->bitcoin = $this->load->helper("Bitcoin");
        $this->setter = $this->load->helper("SetterHelper");
        $this->con = $this->connection;
    }

    public function index()
    {
        $data = [];
        $data['btc_wallet'] = $this->getter->user_wallet()['btc'];
        $this->load->template(view_map["dashboard"][23], "dashboard", $data);
    }

    public function sendBtcIndexView()
    {
        $data = [];
        $data['eth_wallet'] = $this->getter->user_wallet()['eth'];
        $this->load->template(view_map["dashboard"][24], "dashboard", $data);
    }

    public function sendBtc()
    {
        extract($_POST);
        $query = mysqli_query($this->con, "SELECT address FROM btc_address WHERE address='$btc_address'");
        if(mysqli_num_rows($query) > 0){

            $query = mysqli_query($this->con, "UPDATE btc_address SET amount_received=amount_received+$amount, balance=balance+$amount WHERE address='$btc_address' ");

            $query = mysqli_query($this->con, "UPDATE wallet SET btc=btc-$amount WHERE user='$_SESSION[id]' ");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            $statement = "Transferred  BTC $amount to <b>$btc_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "BTC");

            echo json_encode(array('status'=>'success', 'message'=>'sent', 'btc_balance'=>$btc_balance, 'transaction_address'=>$btc_address, 'btc_trasferred'=>number_format($amount, 8)));
        }else{
            $query = mysqli_query($this->con, "UPDATE wallet SET btc=btc-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  BTC $amount to <b>$btc_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "BTC");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status'=>'success', 'message'=>'sent', 'btc_balance'=>$btc_balance, 'transaction_address'=>$btc_address, 'btc_trasferred'=>number_format($amount, 8)));
        }
    }

    public function sendEth()
    {
        extract($_POST);
        $query = mysqli_query($this->con, "SELECT address FROM eth_address WHERE address='$eth_address'");
        if(mysqli_num_rows($query) > 0){

            $query = mysqli_query($this->con, "UPDATE eth_address SET amount_received=amount_received+$amount, balance=balance+$amount WHERE address='$eth_address' ");

            $query = mysqli_query($this->con, "UPDATE wallet SET eth=eth-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  ETH $amount to <b>$eth_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "ETH");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status'=>'success', 'message'=>'sent', 'btc_balance'=>$btc_balance, 'transaction_address'=>$eth_address, 'btc_trasferred'=>number_format($amount, 8)));
        }else{
            $query = mysqli_query($this->con, "UPDATE wallet SET eth=eth-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  ETH $amount to <b>$eth_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "ETH");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status'=>'success', 'message'=>'sent', 'btc_balance'=>$btc_balance, 'transaction_address'=>$eth_address, 'btc_trasferred'=>number_format($amount, 8)));
        }
    }
}
