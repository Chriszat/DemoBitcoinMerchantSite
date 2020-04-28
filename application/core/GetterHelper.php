<?php
use application\core\DatabaseHelper\DatabaseHelper;

class GetterHelper extends DatabaseHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns current application 
     * settings from db
     * @return array
     */
    public function settings()
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM settings ");
        $data = mysqli_fetch_assoc($query);
        return $data;
    }

    /**
     * Data array containing the current value
     * of the user wallet
     * @return array
     */
    public function user_wallet()
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM wallet WHERE user='$_SESSION[id]' ");
        return mysqli_fetch_assoc($query);
    }

    /**
     * Get user data
     */
    public function user_data($id)
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM users WHERE id='$id' ");
        $data = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) > 0){
            return $data;
        }else{
            return false;
        }
       
    }

    /**
     * Gets secondary email of a specific user or all
     */
    public function secondary_emails($count = false)
    {
        $con =$this->connection();
        $query = mysqli_query($con, "SELECT * FROM secondary_emails WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if($count == true){
            return count($data);
        }else{
            return $data;
        }
    }

    /**
     * Get preferences
     */
    public function get_preferences()
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM preferences WHERE user='$_SESSION[id]' ");
        $data = mysqli_fetch_assoc($query);
        return $data;
    }

    /**
     * Gets bitcoin address of a specific user
     * @param bool
     * @return array
     */
    public function get_bitcoin_address($count = false)
    {
        $con =$this->connection();
        $query = mysqli_query($con, "SELECT * FROM btc_address WHERE user='$_SESSION[id]' ORDER BY id DESC ");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if($count == true){
            return count($data);
        }else{
            return $data;
        }
    }

    /**
     * Gets ethereum address of a specific user
     * @param bool
     * @return array
     */
    public function get_ethereum_address($count = false)
    {
        $con =$this->connection();
        $query = mysqli_query($con, "SELECT * FROM eth_address WHERE user='$_SESSION[id]' ORDER BY id DESC ");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if($count == true){
            return count($data);
        }else{
            return $data;
        }
    }
    /**
     * Gets transactions performed by user
     * @param type
     * @return array
     */
    public function get_transaction($type)
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM transactions WHERE user='$_SESSION[id]' AND currency='$type'  ORDER BY id DESC");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $data;
    }

    public function getMiningInfo($hash, $id)
    {
        $con = $this->connection();
        $query = mysqli_query($con, "SELECT * FROM mining_investments WHERE id_hash='$hash' AND users_id='$id' ");

        return mysqli_fetch_assoc($query);
    }

}