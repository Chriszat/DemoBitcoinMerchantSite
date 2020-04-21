<?php

/**
 * This class performs
 * markets transactions 
 * on btc and eth selling
 * and price conversion
 * 
 * @author Ihebuzo Chris
 */


class Sell extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->bitcoin = $this->load->helper("Bitcoin");
        $this->setter = $this->load->helper("SetterHelper");
    }

    public function index()
    {
        //  $data["user"] = $this->getter->user_data($_SESSION['id']);
        $data = [];
        $this->load->template(view_map["dashboard"][13], "dashboard", $data);
    }

    public function sell_bitcoin_eth()
    {
        ob_start();
        $type = $_GET['t'];
        $data["type"] = strtoupper($type);
        $type2 = $_GET['x'];
        if ($type2 == "b") {
            $balance_index = "btc";
        } else if ($type2 == "e") {
            $balance_index = "eth";
        }
        $data["balance"] = $this->getter->user_wallet()[$balance_index];
        if ($type == "usd") {
            $data["balance"] = $data["balance"];
        } else {
            $data["balance"] = $data["balance"];
        }
        $data["x"] = $_GET['x'];
        // $data["y"] = $_GET['y'];
        if ($_GET['x'] == "b") {
            $data["crypto"] = "Bitcoin";
        } else if ($_GET['x'] == "e") {
            $data["crypto"] = "Ethereum";
        }
        if ($_GET['x'] == "b") {
            $data["type"] = strtoupper($balance_index);
            $this->load->template(view_map["dashboard"][14], "dashboard", $data);
            $output = ob_get_contents();
            ob_end_clean();
            echo json_encode(array("t" => $balance_index, "view" => $output));
            return;
        } else if ($_GET['x'] == "e") {
            $data["type"] = strtoupper($balance_index);
            $this->load->template(view_map["dashboard"][14], "dashboard", $data);
            $output = ob_get_contents();
            ob_end_clean();
            echo json_encode(array("t" => $balance_index, "view" => $output));
            return;
        }
    }

    /**
     * Validates if the user requested amount of purchase
     * is sufficient for the given transaction.
     * @return bool
     */
    public function validate_bitcoin_sell_btc_eth($type, $amount)
    {
        $type  = strtolower($type);
        $wallet = $this->getter->user_wallet();
        $balance = $wallet[$type];
        if ($type == "btc") {

            if ($balance >= $amount) {
                if ($amount >= 0.0005) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["btc_price_format"] = $this->bitcoin->bitcoin_price_usd()->rate;
                    $data["btc_price"] = round($this->bitcoin->bitcoin_price_usd()->rate_float, 2);
                    $btc_to_usd_price = $this->bitcoin->convert_btc_to_usd($amount);
                    $data["recieve"] = number_format(round($btc_to_usd_price, 2), 2);



                    $data["buy_or_sell"] = "Sell";
                    $data["type"] = "BTC";
                    $data["with"] = "USD";
                    $data["round"] = number_format(round($data["btc_price"], 2), 2);
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $btc_to_usd_price;
                    $_SESSION['bt_type'] = "btc";
                    $_SESSION['buying_with'] = "btc";
                    $this->load->template(view_map["dashboard"][15], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The amount is lower than the minimum of BTC 0.0005</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d"));
                return;
            }
        } else if ($type == "eth") {
            $eth_to_usd = $this->bitcoin->convert_eth_to_usd($amount);
            
            $res = $this->bitcoin->fetch_ethereum_prices();
            if ($balance >= $amount) {

                if ($amount >= 0.005) {
                    ob_start();
                    $data["amount"] = $amount;
                    $data["recieve"] = round($eth_to_usd, 2);
                    $data["eth_price"] = $amount;
                    $data["type"] = "ETH";
                    $data["with"] = "USD";
                    $data["round"] = $res->price_usd;
                    $_SESSION['payment_price'] = $amount;
                    $_SESSION['bitcoin'] = $eth_to_usd;
                    $_SESSION['bt_type'] = "eth";
                    $_SESSION['buying_with'] = "eth";
                    $this->load->template(view_map["dashboard"][15], "dashboard", $data);
                    $html_view = ob_get_contents();
                    ob_end_clean();
                    echo json_encode(array("status" => "success", "message" => "Proceed", "bool" => "true", "date" => date("Y-m-d"), "view" => $html_view));
                    return;
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons'>warning</i>The amount is lower than the minimum of ETH 0.005</span>", "bool" => "false", "date" => "Y-m-d"));
                    return;
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff; width:300px'><i class='material-icons' >warning</i>&nbsp;&nbsp;&nbsp;Insufficient balance.</span>", "bool" => "false", "date" => "Y-m-d", "amount" => $amount));
                return;
            }
        }
    }

    /**
     * Process bitcoin purchase
     * @return null
     */
    private function sell_bitcoin_to_market()
    {
        if (isset($_SESSION['payment_price']) && isset($_SESSION['bitcoin']) && isset($_SESSION['bt_type']) && isset($_SESSION['buying_with'])) {
            $price = $_SESSION['payment_price'];
            $bitcoin = $_SESSION['bitcoin'];
        
            $type = $_SESSION['bt_type'];
            $gain = $bitcoin;
            $buying_with = $_SESSION["buying_with"];
            if ($type == 'btc') {
                if ($buying_with == "btc") {
                    $this->bitcoin->deduct_user_bitcoin($price);
                    $this->bitcoin->update_user_usd($bitcoin);
                } else if ($buying_with == "eth") {
                    $this->bitcoin->deduct_user_ethereum($price);
                    $this->bitcoin->update_user_bitcoin($bitcoin);
                }

                $data["crypto"] = "BITCOIN";
                $this->load->template(view_map["dashboard"][8], "dashboard", $data);
                $html_view = ob_get_contents();
                ob_end_clean();
                $new_bitcoin = $this->getter->user_wallet()["btc"];
                $statement = "Sold " . strtoupper($type) . " " . $price . " for " . strtoupper($buying_with) . " " . $gain;
                $this->setter->set_transaction($_SESSION['id'], $statement, "SOLD", $gain, strtoupper($buying_with));
                echo json_encode(array("status" => "success", "message" => "Purchased", "view" => $html_view, "t" => $new_bitcoin));
                unset($_SESSION['payment_price']);
                unset($_SESSION['bitcoin']);
                unset($_SESSION['bt_type']);

            } else if ($type == 'eth') {
                if ($buying_with == "eth") {
                    $this->bitcoin->deduct_user_ethereum($price);
                    $this->bitcoin->update_user_usd($bitcoin);
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
                $statement = "Sold " . ucwords($type) . " " . $price . " for " . strtoupper($buying_with) . " " . $gain;
                $this->setter->set_transaction($_SESSION['id'], $statement, "SOLD", $gain);
                echo json_encode(array("status" => "success", "message" => "Purchased", "view" => $html_view, "t" => $new_bitcoin));
                unset($_SESSION['payment_price']);
                unset($_SESSION['bitcoin']);
                unset($_SESSION['bt_type']);
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Authentication failed", "reason" => "No access gateway found", "date" => date("Y-F-d"), "bool" => "false", "attempts" => "1::1"));
        }
    }

    /**
     * sells the bitcoin to the market 
     * @return bool
     */
    public function market()
    {
        return $this->sell_bitcoin_to_market();
    }


    /**
     * Returns the computation from validate_bitcoin_usd
     * 
     */
    public function check_bitcoin()
    {
        if (isset($_GET['t']) && isset($_POST['amount'])) {
            $this->validate_bitcoin_sell_btc_eth($_GET['t'], $_POST['amount']);
            return;
        }
    }
}
