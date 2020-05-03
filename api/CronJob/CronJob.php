<?php

class CronJob extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->mail = $this->load->helper("SendEmail");
        $this->con = $this->connection;
        $this->getter = $this->load->helper("GetterHelper");
        
    }

    public function get_btc_new_reward()
    {

        $query = mysqli_query($this->con, "SELECT * FROM mining_investments WHERE status='active' ");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $settings = $this->getter->settings();
        foreach ($data as $value) {
            $mining_plan_id = $value["mining_plans_id"];
            $mining_plan_info = mysqli_query($this->con, "SELECT * FROM mining_plans WHERE id='$mining_plan_id' ");
            $mining_plan_info = mysqli_fetch_assoc($mining_plan_info);
           

            $formular = intval($mining_plan_info["duration_hours"]) * 60;
            $reward = intval($mining_plan_info["btc_reward"]) / $formular;
            $time = 1 * 60;
            $final_reward = $reward * $time;
            

            if ($value["btc_mined"] >= $mining_plan_info["btc_reward"]) {
                $id = $value['id'];
                mysqli_query($this->con, "UPDATE mining_investments SET status='completed' WHERE id='$id' ");
                die();
            } else {
                $id = $value['id'];
                $new_btc_value = round((floatval($value["btc_mined"]) + floatval($final_reward)), 8);

                mysqli_query($this->con, "UPDATE mining_investments SET btc_mined='$new_btc_value' WHERE id='$id' ");
                $user_id = $value["users_id"];
                $query  = mysqli_query($this->con, "SELECT * FROM users WHERE id='$user_id' ");
                $user_info = mysqli_fetch_assoc($query);
                $mail = new CronMailer();
                $data = [
                    "email" => $user_info["email"],
                    "subject" => "BITCOIN MINING COMPLETED",
                    "alt" => "",
                ];
                // $query = mysqli_query($this->con, "SELECT * FROM mining_investments WHERE status='$value[mining_plans_id]' ");

                $res = $value;

                $data["sitename"] = $this->getter->settings()["sitename"];
                $data["username"] = explode("@", $data["email"])[0];
                $data["btc_address"] = $res["btc_address_id"];
                $data["btc_value"] = $res["btc_mined"];
                $data["year"] = date("Y");
                $data["mining_plan"] = strtoupper($mining_plan_info["plan"]);
                $data["time_mined"] = $mining_plan_info["duration_hours"]."Hrs";
                $data["btc_reward"] = $mining_plan_info["btc_reward"]."BTC";
                $data["dashboard_link"] = baseurl."wallet/";
                $data["support_link"] = $settings["from_email"];
                $data["ref_code"] = strval(random_int(100000, 10000000));

                $data["logo"] = "";
               
                if ($new_btc_value >= $mining_plan_info["btc_reward"]) {
                    $this->mail->send_btc_mining_success($data["email"], "BITCOIN MINING COMPLETED", $data, "");
                    $subject = "A User BTC Mining is Completed".$settings["sitename"];
                $message = "<h3>The following user btc mining has been completed</h3>";
                $message.="
                <table>
                <tr>
                <th>User: <th>
                <td>".$user_info['id'].baseurl.'/webmaster/users/'.$user_info['id'].'/'."</td>
                </tr>
                <tr>
                <th>Mining Plan: <th>
                <td>".$data['mining_plan']."</td>
                </tr>
                <tr>
                <th>Time Mined: <th>
                <td>".$data['time_mined']."</td>
                </tr>
                <tr>
                <th>BTC Reward: <th>
                <td>".$data['btc_reward']."</td>
                </tr>
                </table>
                ";
                ob_start();
                $this->mail->send_mail($settings['mailing_email'], $subject, $message, $message);
                ob_end_clean();
                }
            }
        }
    }
}