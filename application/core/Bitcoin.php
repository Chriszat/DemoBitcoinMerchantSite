<?php

/**
 * Bitcoin class for performing bitcoin
 * operations.
 * 
 * @author Ihebuzo Chris
 */

use application\core\DatabaseHelper\DatabaseHelper;

class Bitcoin
{

    public function __construct()
    {
        $this->con = $this->connect();
    }

    /**
     * Create user wallet
     */
    public function create_wallet($user)
    {
        $con = $this->con;
        $query = mysqli_query($con, "INSERT INTO wallet (user) VALUES ('$user')");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Fetchs bitcoin current prices in realtime from
     * external resource
     * @return object
     */
    public function fetch_bitcoin_prices()
    {
        $url = "https://api.coindesk.com/v1/bpi/currentprice.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        return json_decode($res)->bpi;
    }

    /**
     * Fetchs ethereum prices in realtime from external resource
     * 
     */
    public function fetch_ethereum_prices()
    {
        $url = "https://api.coingecko.com/api/v3/simple/price?ids=3x-long-ethereum-token&vs_currencies=usd,btc";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res  = curl_exec($ch);
        $res = json_decode($res, true);
        $payload = array("price_btc"=>$res['3x-long-ethereum-token']['btc'], "price_usd"=>$res['3x-long-ethereum-token']['usd']);
        return (object)$payload;
    }

    /**
     * Gets the current BTC-ETH prices
     */
    public function convert_btc_to_eth()
    {
        $url = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=ETH";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res  = curl_exec($ch);
        return json_decode($res)->ETH;
    }

    /**
     * Object containing bitcoin price in 
     * USD
     * @return object
     */
    public function bitcoin_price_usd()
    {
        $price = $this->fetch_bitcoin_prices()->USD;
        return $price;
    }

    /**
     * Object containing bitcoin price in 
     * EUR
     * @return object
     */
    public function bitcoin_price_eur()
    {
        $price = $this->fetch_bitcoin_prices()->EUR;
        return $price;
    }

    /**
     * Object containing bitcoin price in 
     * GBP
     * @return object
     */
    public function bitcoin_price_gbp()
    {
        $price = $this->fetch_bitcoin_prices()->GBP;
        return $price;
    }

    /**
     * Returns the actual purchase price converted
     * to USD of the specified amount of bitcoin
     * @return int
     */
    public function bitcoin_purchase_price_usd($amount)
    {
        $price = round($this->bitcoin_price_usd()->rate_float, 2);
        return $price;
    }

    /**
     * Convert bitcoin to usd
     * @return int
     */
    public function convert_btc_to_usd($btc)
    {
        $price = $btc * $this->bitcoin_price_usd()->rate_float;
        return $price;
    }

    /**
     * Covert usd to btc
     * @return int
     */
    public function convert_usd_to_btc($usd)
    {
        $price = $usd / $this->bitcoin_price_usd()->rate_float;
        return $price;
    }

    /**
     * Convert usd to eth
     * 
     */
    public function convert_usd_to_eth($usd)
    {
        $exchange_price = $this->fetch_ethereum_prices()->price_usd;
        $price = $usd / $exchange_price;
        return $price;
    }

    /**
     * Convert eth to usd
     */
    public function convert_eth_to_usd($eth)
    {
        $price = $eth * $this->fetch_ethereum_prices()->price_usd;
        return $price;
    }

    /**
     * Convert eth to btc
     */
    public function convert_eth_to_btc($eth)
    {
        $price = $eth * $this->fetch_ethereum_prices()->price_btc;
        return $price;
    }

    /**
     * Deducts user bitcoin
     * 
     */
    public function deduct_user_bitcoin($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["btc"];
        $bal = $data - $amount;
        $query = mysqli_query($con, "UPDATE wallet SET btc='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        }
    }

    /**
     * Deducts user ethereum
     * 
     */
    public function deduct_user_ethereum($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["eth"];
        $bal = $data - $amount;
        $query = mysqli_query($con, "UPDATE wallet SET eth='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        }
    }

    /**
     * Deducts user Bitcoin
     * 
     */
    public function deduct_user_btc($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["btc"];
        $bal = $data - $amount;
        $query = mysqli_query($con, "UPDATE wallet SET btc='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        }
    }

    /**
     * Updates user bitcoin
     */
    public function update_user_bitcoin($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["btc"];
        $bal = $data + $amount;
        $query = mysqli_query($con, "UPDATE wallet SET btc='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        }
    }

    /**
     * Updates user ETHEREUM
     */
    public function update_user_ethereum($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["eth"];
        $bal = $data + $amount;
        $query = mysqli_query($con, "UPDATE wallet SET eth='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        }
    }

    /**
     * Deducts user usd
     * 
     */
    public function deduct_user_usd($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["usd"];
        $bal = $data - $amount;
        $query = mysqli_query($con, "UPDATE wallet SET usd='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Updates user usd
     * 
     */
    public function update_user_usd($amount)
    {
        $con = $this->con;
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query)["usd"];
        $bal = $data + $amount;
        $query = mysqli_query($con, "UPDATE wallet SET usd='$bal' WHERE user='$_SESSION[id]'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Connect to database
     * @return object
     */
    public function connect()
    {
        $con = new DatabaseHelper();
        return $con::connection();
    }
}
