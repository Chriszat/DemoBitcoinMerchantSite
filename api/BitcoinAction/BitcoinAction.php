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
        $this->mail = $this->load->helper("SendEmail");
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
        $query = mysqli_query($this->con, "SELECT address, user FROM btc_address WHERE address='$btc_address'");
        if (mysqli_num_rows($query) > 0) {

            $d = mysqli_fetch_assoc($query);
            $sender_wallet = $this->getter->user_wallet($_SESSION['id']);
            if (floatval($sender_wallet["btc"]) < floatval($amount)) {
                echo json_encode(array("status" => "error", "message" => "Insufficient BTC to send"));
                die();
            }

            $query = mysqli_query($this->con, "UPDATE btc_address SET amount_received=amount_received+$amount, balance=balance+$amount WHERE address='$btc_address' ");

            $query = mysqli_query($this->con, "UPDATE wallet SET btc=btc-$amount WHERE user='$_SESSION[id]' ");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            // set transaction for btc sender
            $statement = "Transferred  " . number_format($amount, 8) . " BTC to <b>$btc_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "BTC");

            // set transaction for btc reciever

            $statement = "Received   " . number_format($amount, 8) . " BTC from <b>$_SESSION[email]</b>";

            $this->setter->set_transaction($d['user'], $statement, "RECEIVED", $amount, "BTC");
            $receiver_info = $this->getter->user_data($d["user"]);
            $sender_info = $this->getter->user_data($_SESSION['id']);

            $payload = ["sitename" => "", "username" => $sender_info["name"], "btc_address" => $btc_address, "btc_value" => $amount, "transaction" => bin2hex(random_bytes(16)), "currency" => "BTC", "logo" => "https://crypto.fleetexpress.co.uk/81744546ec70b93f065c7321407215727ea39750f52b909dcb/logo.png"];

            ob_start();
            $this->mail->send_btc_transfer_notification($_SESSION['email'], "Transaction Alert", $payload, "");
            ob_end_clean();

            echo json_encode(array('status' => 'success', 'message' => 'sent', 'btc_balance' => $btc_balance, 'transaction_address' => $btc_address, 'btc_trasferred' => number_format($amount, 8)));
        } else {
            $d = mysqli_fetch_assoc($query);

            $query = mysqli_query($this->con, "UPDATE wallet SET btc=btc-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  BTC $amount to <b>$btc_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "BTC");

            // set transaction for btc reciever

            //  $statement = "Received   ". number_format($amount, 8) ." BTC from <b>$_SESSION[email]</b>";

            //  $this->setter->set_transaction($d['user'], $statement, "RECEIVED", $amount, "BTC");


            $sender_info = $this->getter->user_data($_SESSION['id']);

            $payload = ["sitename" => "", "username" => $sender_info["name"], "btc_address" => $btc_address, "btc_value" => $amount, "transaction" => bin2hex(random_bytes(16)), "currency" => "BTC", "logo" => "https://crypto.fleetexpress.co.uk/81744546ec70b93f065c7321407215727ea39750f52b909dcb/logo.png"];

            ob_start();
            $this->mail->send_btc_transfer_notification($_SESSION['email'], "Transaction Alert", $payload, "");
            ob_end_clean();

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status' => 'success', 'message' => 'sent', 'btc_balance' => $btc_balance, 'transaction_address' => $btc_address, 'btc_trasferred' => number_format($amount, 8)));
        }
    }

    public function sendEth()
    {
        extract($_POST);
        $query = mysqli_query($this->con, "SELECT address FROM eth_address WHERE address='$eth_address'");
        if (mysqli_num_rows($query) > 0) {

            $query = mysqli_query($this->con, "UPDATE eth_address SET amount_received=amount_received+$amount, balance=balance+$amount WHERE address='$eth_address' ");

            $query = mysqli_query($this->con, "UPDATE wallet SET eth=eth-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  ETH $amount to <b>$eth_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "ETH");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status' => 'success', 'message' => 'sent', 'btc_balance' => $btc_balance, 'transaction_address' => $eth_address, 'btc_trasferred' => number_format($amount, 8)));
        } else {
            $query = mysqli_query($this->con, "UPDATE wallet SET eth=eth-$amount WHERE user='$_SESSION[id]' ");

            $statement = "Transferred  ETH $amount to <b>$eth_address</b>";

            $this->setter->set_transaction($_SESSION['id'], $statement, "TRANSFERRED", $amount, "ETH");

            $btc_balance = number_format($this->getter->user_wallet()["btc"], 8);

            echo json_encode(array('status' => 'success', 'message' => 'sent', 'btc_balance' => $btc_balance, 'transaction_address' => $eth_address, 'btc_trasferred' => number_format($amount, 8)));
        }
    }

    public function placeBTCWithdrawIndex()
    {
        $data = [];
        $data['btc_wallet'] = $this->getter->user_wallet()['btc'];
        $this->load->template(view_map["dashboard"][43], "dashboard", $data);
    }

    public function placeBTCWithdraw()
    {
        $wallet = $this->getter->user_wallet()['btc'];
        extract($_POST);
        if ($amount > floatval($wallet)) {
            echo json_encode(array("status" => "error", "message" => "Insufficient btc to place withdraw"));
            exit();
        }

        $query = mysqli_query($this->con, "INSERT INTO btc_withdraw (user, address, amount) VALUES ('$_SESSION[id]', '$address', '$amount' )");

        $settings = $this->getter->settings();
        $date = date("d, F Y");
        $userinfo = $this->getter->user_data($_SESSION['id']);
        $profile_link = baseurl . "webmaster/users/$_SESSION[id]";
        $subject = "New Withdraw Request " . $settings["sitename"];
        $message = "<h3>A User has requested to withdraw BTGC</h3>";
        $message .= "
        <table style='text-align:left'>
        <tr>
        <th>Withdraw Type : <th>
        <td>BTC</td>
        </tr>
        <tr>
        <th>Date/Time: <th>
        <td>$date</td>
        </tr>
        <tr>
        <th>User Email: <th>
        <td>$userinfo[email]</td>
        </tr>
        <tr>
        <th>User Profile Link : <th>
        <td><a href='$profile_link'>$profile_link</a></td>
        </tr>
        <tr>
        <th>User ID: <th>
        <td>$_SESSION[id]</td>
        </tr>
        <tr>
        <th>Amount: <th>
        <td>BTC $amount</td>
        </tr>
        
        </table>
        ";

        ob_start();
        $this->mail->send_mail($email, $subject, $message, $message);
        ob_end_clean();

        echo json_encode(array("status" => "success", "message" => "Your withdraw has been placed, you will inform yo u when it clears."));
    }
}
