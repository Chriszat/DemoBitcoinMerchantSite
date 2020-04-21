<?php


class Buy extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->bitcoin = $this->load->helper("Bitcoin");
        $this->setter = $this->load->helper("SetterHelper");
    }

    public function index()
    {
        $data = [];
        $this->load->template(view_map["dashboard"][5], "dashboard", $data);
    }

    public function buy_bitcoin_eth()
    {
        ob_start();
        $type = $_GET['t'];
        $data["type"] = strtoupper($type);
        $data["balance"] = $this->getter->user_wallet()[$type];
        if ($type == "usd") {
            $data["balance"] = number_format($data["balance"], 2);
        } else {
            $data["balance"] = round($data["balance"], 8);
        }
        $data["x"] = $_GET['x'];
        // $data["y"] = $_GET['y'];
        if ($_GET['x'] == "b") {
            $data["crypto"] = "Bitcoin";
        } else if ($_GET['x'] == "e") {
            $data["crypto"] = "Ethereum";
        }
        if ($_GET['x'] == "b") {
            $this->load->template(view_map["dashboard"][6], "dashboard", $data);
            $output = ob_get_contents();
            ob_end_clean();
            echo json_encode(array("t" => $type, "view" => $output));
            return;
        } else if ($_GET['x'] == "e") {
            $this->load->template(view_map["dashboard"][9], "dashboard", $data);
            $output = ob_get_contents();
            ob_end_clean();
            echo json_encode(array("t" => $type, "view" => $output));
            return;
        }
    }


    /**
     * Validates if the user requested amount of purchase
     * is sufficient for the given transaction.
     * @return bool
     */
    public function validate_bitcoin_usd($type, $amount)
    {
        $type  = strtolower($type);
        $wallet = $this->getter->user_wallet();
        $balance = $wallet[$type];
        if ($type == "usd") {

            if ($balance >= $amount) {
                if ($amount >= 10) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["btc_price_format"] = $this->bitcoin->bitcoin_price_usd()->rate;
                    $data["btc_price"] = round($this->bitcoin->bitcoin_price_usd()->rate_float, 2);
                    $data["recieve"] = round($this->bitcoin->convert_usd_to_btc($amount), 8);
                    $data["type"] = "BTC";
                    $data["with"] = "USD";
                    $data["round"] = number_format(round($data["btc_price"], 2), 2);
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $data["recieve"];
                    $_SESSION['bt_type'] = "btc";
                    $_SESSION['buying_with'] = "usd";
                    $this->load->template(view_map["dashboard"][7], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The amount is lower than the minimum of USD 10.00</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d"));
                return;
            }
        } elseif ($type == "eth") {
            $eth_to_btc = $this->bitcoin->convert_eth_to_btc($amount);
            $res = $this->bitcoin->fetch_ethereum_prices();

            if ($balance >= $amount) {

                if ($amount > 0.005) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["recieve"] = round($eth_to_btc, 8);
                    $data["eth_price"] = $amount;
                    $data["type"] = "BTC";
                    $data["with"] = "ETH";
                    $data["round"] = $res->price_btc;
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $data["recieve"];
                    $_SESSION['bt_type'] = "btc";
                    $_SESSION['buying_with'] = "eth";
                    $this->load->template(view_map["dashboard"][7], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The amount is lower than the minimum of 0.005</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d", "amount" => $amount));
                return;
            }
        }
    }

    public function validate_ethereum($type, $amount)
    {
        $type  = strtolower($type);
        $wallet = $this->getter->user_wallet();
        $balance = $wallet[$type];
        $exchange = $this->bitcoin->fetch_ethereum_prices();
        // $eth_to_usd = round($exchange, 2);
        if ($type == "usd") {
            if ($balance >= $amount) {
                if ($amount >= 10) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["eth_price_format"] = number_format(round($exchange->price_usd, 2), 2);
                    $data["eth_price"] = round($exchange->price_usd, 2);
                    $data["recieve"] = $this->bitcoin->convert_usd_to_eth($amount);
                    $data["type"] = "ETH";
                    $data["with"] = "USD";
                    $_SESSION['buying_with'] = "usd";

                    $data["round"] = number_format(round($data["eth_price"], 2), 2);
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $data["recieve"];
                    $_SESSION['bt_type'] = "eth";
                    $_SESSION['buying_with'] = 'usd';

                    $this->load->template(view_map["dashboard"][7], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The cost is lower than the minimum of USD 10.00</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d"));
                return;
            }
        } else if ($type == "btc") {

            if ($balance >= $amount) {
                if ($amount >= 0.0005) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["eth_price_format"] = number_format(round($exchange->price_usd, 2), 2);
                    $data["eth_price"] = $exchange->price_btc;
                    $data["recieve"] = $this->bitcoin->convert_btc_to_eth($amount);
                    $data["type"] = "ETH";
                    $data["with"] = "BTC";
                    $data["round"] = $data["eth_price"];
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $data["recieve"];
                    $_SESSION['bt_type'] = "eth";
                    $_SESSION['buying_with'] = 'btc';
                    $this->load->template(view_map["dashboard"][7], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The cost is lower than the minimum of BTC 0.0005</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d"));
                return;
            }
        }
    }

    /**
     * Process bitcoin purchase
     * @return null
     */
    public function confirm_bitcoin_purchase()
    {
        if (isset($_SESSION['payment_price']) && isset($_SESSION['bitcoin']) && isset($_SESSION['bt_type']) && isset($_SESSION['buying_with'])) {
            $price = $_SESSION['payment_price'];
            $bitcoin = $_SESSION['bitcoin'];
            $type = $_SESSION['bt_type'];
            $buying_with = $_SESSION["buying_with"];

            if ($type == 'btc') {
                if ($buying_with == "usd") {
                    $this->bitcoin->deduct_user_usd($price);
                    $this->bitcoin->update_user_bitcoin($bitcoin);
                } else if ($buying_with == "eth") {
                    $this->bitcoin->deduct_user_ethereum($price);
                    $this->bitcoin->update_user_bitcoin($bitcoin);
                }

                $data["crypto"] = "BITCOIN";
                $this->load->template(view_map["dashboard"][8], "dashboard", $data);
                $html_view = ob_get_contents();
                ob_end_clean();
                $new_bitcoin = $this->getter->user_wallet()["btc"];
                $statement = "Bought " . ucwords($type) . " " . $bitcoin . " for " . strtoupper($buying_with) . " " . $price;
                $this->setter->set_transaction($_SESSION['id'], $statement, "BUY", $price, strtoupper($buying_with));
                echo json_encode(array("status" => "success", "message" => "Purchased", "view" => $html_view, "t" => $new_bitcoin));
                unset($_SESSION['payment_price']);
                unset($_SESSION['bitcoin']);
                unset($_SESSION['bt_type']);
            } else if ($type == 'eth') {
                if ($buying_with == "usd") {
                    $this->bitcoin->deduct_user_usd($price);
                    $this->bitcoin->update_user_ethereum($bitcoin);
                } else if ($buying_with == "btc") {
                    $this->bitcoin->deduct_user_btc($price);
                    $this->bitcoin->update_user_ethereum($bitcoin);
                }

                $data = [];
                $data["crypto"] = "ETHEREUM";
                $this->load->template(view_map["dashboard"][8], "dashboard", $data);
                $html_view = ob_get_contents();
                ob_end_clean();
                $new_bitcoin = $this->getter->user_wallet()["btc"];
                $statement = "Bought " . ucwords($type) . " " . $bitcoin . " for " . strtoupper($buying_with) . " " . $price;
                $this->setter->set_transaction($_SESSION['id'], $statement, "BUY", $price);
                echo json_encode(array("status" => "success", "message" => "Purchased", "view" => $html_view, "t" => $new_bitcoin));
                unset($_SESSION['payment_price']);
                unset($_SESSION['bitcoin']);
                unset($_SESSION['bt_type']);
            }
        }
    }

    /**
     * Purcase bitcoin
     * @return bool
     */
    public function purchase()
    {
        return $this->confirm_bitcoin_purchase();
    }

    /**
     * Returns the computation from validate_bitcoin_usd
     * 
     */
    public function check_bitcoin()
    {
        if (isset($_GET['t']) && isset($_POST['amount'])) {
            $this->validate_bitcoin_usd($_GET['t'], $_POST['amount']);
            return;
        }
    }

    public function check_ethereum()
    {
        if (isset($_GET['t']) && isset($_POST['amount'])) {
            $this->validate_ethereum($_GET['t'], $_POST['amount']);
            return;
        }
    }
}
