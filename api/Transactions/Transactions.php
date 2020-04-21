<?php


class Transactions extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->date = $this->load->helper("DateHelper");
    }

    public function index()
    {
        $data["transaction_data"] = $this->get_transactions();
        $data["dates"] = $this->get_transactions_date();
        $this->load->template(view_map["dashboard"][4], "dashboard", $data);
    }

    public function get_transactions()
    {
        $con = $this->connection;
        $query = mysqli_query($con, "SELECT * FROM transactions WHERE user='$_SESSION[id]'   ORDER BY id DESC");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $data;
    }

    public function get_transactions_date()
    {
        $trans = $this->get_transactions();
        $date = [];
        foreach($trans as $data){
            $c_date = $this->date->date_get_part($data["date"], "m");
            array_push($date, $c_date);
        }

        return $date;
    }
}