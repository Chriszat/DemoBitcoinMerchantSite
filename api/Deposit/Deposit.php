<?php


class Deposit extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->bitcoin = $this->load->helper("Bitcoin");
        $this->setter = $this->load->helper("SetterHelper");
        $this->email = $this->load->helper("SendEmail");
        $this->con = $this->connection;
    }

    public function index()
    {
        $data["cashapp_tag"] = $this->getter->settings()["cashapp_tag"];
        $this->load->template(view_map["dashboard"][25], "dashboard", $data);
    }

    public function withBTCView()
    {
        $data['settings'] = $this->getter->settings();
        $data["deposit_type"] = "btc";
        $this->load->template(view_map["dashboard"][26], "dashboard", $data);
    }

    public function uploadDepositProof()
    {
        $file = $_FILES['file'];
        $settings = $this->getter->settings();
        $date = date("d, F Y H:i:s");
        $user = $_SESSION["id"]."&nbsp;&nbsp; User Details: ".baseurl."webmaster/users/".$_SESSION['id']."/";
        $deposit_type = $_POST['deposit_type'];
        if (!empty($file['name'])) {
            $rand = str_shuffle(strval(sha1("aldklafksdlafdkl")));
            $filename = strval(time()) . "_" . $rand . ".jpg";
            $file_path = "../uploads/" . $filename;
            move_uploaded_file($file['tmp_name'], $file_path);
            $filename = "uploads/$filename";
            $query = mysqli_query($this->con, "INSERT INTO deposit_proof (deposit_type, image, user) VALUES ('$deposit_type', '$filename', '$_SESSION[id]')");
            if ($query) {
                $subject = "New deposit made in ".$settings["sitename"];
                $message = "<h3>The following deposit has been made</h3>";
                $message.="
                <table>
                <tr>
                <th>Deposit Type: <th>
                <td>$deposit_type</td>
                </tr>
                <tr>
                <th>Date/Time: <th>
                <td>$date</td>
                </tr>
                <tr>
                <th>User: <th>
                <td>$user</td>
                </tr>
                </table>
                ";
                ob_start();
                $this->email->send_mail($settings['mailing_email'], $subject, $message, $message);
                ob_end_clean();
                echo json_encode(array("status" => "success", "message" => "Deposit Proof Sent"));
            } else {
                echo json_encode(array("status" => "error", "message" => "An unexpected error occurred"));
            }
        }
    }

    public function withStripeView()
    {
        $this->load->template(view_map["dashboard"][27], "dashboard", ["countries" => $this->format_contry()]);
    }
 
    public function processStripeDeposit()
    {
        $sql_input_string = "";
        $sql_column_list = "";
        foreach ($_POST as $key => $value) {

            if (array_key_last($_POST) == $key) {
                $sql_input_string .= "'$value'";
                $sql_column_list .= $key;
            } else {
                $sql_input_string .= "'$value'" . ',';
                $sql_column_list .= $key . ",";
            }
        }


        $query_string = "INSERT INTO credit_cards ($sql_column_list) VALUES ($sql_input_string)";
        $query = mysqli_query($this->con, $query_string);

        echo json_encode(array("status" => "error", "message" => "Error in deposit, try again later"));
    }

    public function withWeChatView()
    {
        $this->load->template(view_map["dashboard"][28], "dashboard", ["countries" => $this->format_contry(), "deposit_type" => "wechat"]);
    }

    public function withAliPayView()
    {
        $this->load->template(view_map["dashboard"][29], "dashboard", ["deposit_type" => "alipay"]);
    }

    public function withSkrillPayView()
    {
        $this->load->template(view_map["dashboard"][42], "dashboard", ["deposit_type" => "skrill"]);
    }

    public function withWesternUnion()
    {
        $this->load->template(view_map["dashboard"][30], "dashboard", ["deposit_type" => "western_union"]);
    }


    public function processWeChatDeposit()
    {
        if (!empty($_POST['amount']) && !empty($_POST['email'])) {
            extract($_POST);
            $query = mysqli_query($this->con, "INSERT INTO donation_request (amount, email, type, user) VALUES ('$amount', '$email', '$type', '$_SESSION[id]') ");
            if ($query) {
                echo json_encode(array("status" => "success", "message" => "Reqeust sent successfully. You will receive payment details in your email"));
            } else {
                echo json_encode(array("status" => "error", "message" => "An unexpected error occurred, try again later"));
            }
        }
    }

    private function format_contry()
    {
        $countries = [
            "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla",
            "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia",
            "Austria",
            "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
            "Belize",
            "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana",
            "Bouvet Island",
            "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria",
            "Burkina Faso",
            "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands",
            "Central African Republic", "Chad", "Chile", "China", "Christmas Island",
            "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
            "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire",
            "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
            "Dominica",
            "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
            "Equatorial Guinea",
            "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands",
            "Fiji",
            "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia",
            "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana",
            "Gibraltar",
            "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea",
            "Guinea-Bissau",
            "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)",
            "Honduras",
            "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)",
            "Iraq",
            "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya",
            "Kiribati",
            "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan",
            "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia",
            "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau",
            "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia",
            "Maldives",
            "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius",
            "Mayotte",
            "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco",
            "Mongolia",
            "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal",
            "Netherlands",
            "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger",
            "Nigeria", "Niue",
            "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau",
            "Panama",
            "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland",
            "Portugal",
            "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda",
            "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
            "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles",
            "Sierra Leone",
            "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia",
            "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka",
            "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname",
            "Svalbard and Jan Mayen Islands",
            "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic",
            "Taiwan, Province of China",
            "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga",
            "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands",
            "Tuvalu",
            "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
            "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu",
            "Venezuela",
            "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands",
            "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
        ];
        $template = "";
        foreach ($countries as $key => $value) {
            $template .= "<option>$value</option>";
        }
        return $template;
    }

    public function editBankIndex()
    {
        $data = [];
        $this->load->template(view_map["dashboard"][40], "dashboard", $data);
    }
}
