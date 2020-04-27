<?php

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array("form"));
    }

    public function usersList()
    {
        $this->db->order_by("id DESC");
        $query = $this->db->get('users');
        $data["object_list"] = $query->result_array();
        $this->view("users_list", $data);
    }

    public function userDetails($id)
    {
        $query = $this->db->get_where("users", array("id" => $id));

        $data["object"] = $query->row_array();
        $data["object"]["wallet"] = $this->db->get_where("wallet", array("user" => $data["object"]["id"]))->row_array();
        $data["object"]["btc_address_list"] = $this->db->get_where("btc_address", array("user" => $data['object']['id']))->result_array();
        $data["object"]["eth_address_list"] = $this->db->get_where("eth_address", array("user" => $data['object']['id']))->result_array();
        $data["country_list"] = $this->format_contry(true, $data['object']['country']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->updateUserDetails($id);
        } else {
            $this->view("user_detail", $data);
        }
    }

    private function updateUserDetails($id)
    {
        if (isset($_POST['p_info'])) {
            unset($_POST['p_info']);
            return $this->updateUserPersonnalDetails($id);
        } elseif (isset($_POST['w_info'])) {
            unset($_POST['w_info']);
            return $this->updateUserWalletDetails($id);
        }
    }

    private function updateUserPersonnalDetails($id)
    {
        $query = $this->db->update("users", $_POST, array("id" => $id));
        $_SERVER['REQUEST_METHOD'] = 'GET';
        return $this->userDetails($id);
    }

    private function updateUserWalletDetails($id)
    {
        $this->db->update("wallet", $_POST, array("user" => $id));
        $_SERVER['REQUEST_METHOD'] = 'GET';
        return $this->userDetails($id);
    }

    public function edit_btc_address($id, $address)
    {
        $query = $this->db->get_where("btc_address", array("address" => $address, "user" => $id));
        $data["object"] = $query->row_array();
        $data["type"] = "BTC";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->update("btc_address", $_POST, array("address" => $address, "user" => $id));
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $this->session->set_flashdata(array("updated"=>true));
            $this->edit_btc_address($id, $address);
        } else {
            if(isset($_SESSION['updated'])){
                $data["updated"] = true;
            }
            $this->view("edit_btc_address", $data);
        }
    }

    public function edit_eth_address($id, $address)
    {
        $query = $this->db->get_where("eth_address", array("address" => $address, "user" => $id));
        $data["object"] = $query->row_array();
        $data["type"] = "ETH";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->update("eth_address", $_POST, array("address" => $address, "user" => $id));
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $this->session->set_flashdata(array("updated"=>true));
            $this->edit_eth_address($id, $address);
        } else {
            if(isset($_SESSION['updated'])){
                $data["updated"] = true;
            }
            $this->view("edit_btc_address", $data);
        }
    }

    private function format_contry($set_default = false, $default = null)
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
            if ($set_default) {
                if ($value == $default) {
                    $template .= "<option selected='selected'>$value</option>";
                } else {
                    $template .= "<option>$value</option>";
                }
            } else {
                $template .= "<option>$value</option>";
            }
        }
        return $template;
    }

    public function credit_cards()
    {
        $this->db->order_by("id DESC");
        $query = $this->db->get("credit_cards");
        $data['object_list'] = $query->result_array();
        $data['credit_cards_active'] = TRUE;
        $this->view('credit_cards', $data);
    }

}
