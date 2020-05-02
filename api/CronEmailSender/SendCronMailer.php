<?php

class SendCronMailer extends Base
{
    public $mail;
    public $setter;
    public function __construct()
    {
        parent::__construct();
        $this->mail = $this->load->helper("SendEmail");
        $this->setter = $this->load->helper("SetterHelper");
        $this->getter = $this->load->helper("GetterHelper");
    }

    /**
     * Sends new email to providers
     * who has been selected for a particular job
     * by the admin
     */
    public function sendMiningNotification()
    {
        $data = $_POST;
        $query = mysqli_query($this->con, "SELECT * FROM mining_investments WHERE status='$data[investment_id]' ");
        $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $data["sitename"] = $this->getter->settings()["sitename"];
        $data["username"] = explode("@", $data["email"])[0];
        $data["btc_address"] = $res["btc_address_id"];
        $data["btc_value"] = $res["btc_mined"];
        $data["logo"] = "";

        $this->mail->send_btc_mining_success($data["email"], $data["subject"], $data=$data, $data["alt"]);
    }

    
}