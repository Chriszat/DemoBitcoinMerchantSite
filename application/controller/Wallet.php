<?php
use application\core\Controller\Controller;

class Wallet extends Controller
{
    public $validate;
    public $model;
    public $getter;

    public function __construct()
    {
        parent::__construct();
        $this->validate = $this->helper("application\core\Validation\Validation");
        $this->validate->validate_user_session(true);
        $this->model = $this->model("WalletModel");
        $this->getter = $this->helper("GetterHelper");
        // $this->validate->last_activity(true);
        $this->index();
    }

    public function index()
    {
        $data = $this->getter->settings();
        
        $sitename = $data["sitename"];
        $split = str_split($sitename);
        $newstring = "";
        for ($i=0; $i<count($split); $i++){
            $newstring.=$split[$i].' ';
        }
        $data["sitename_split"] = $newstring;
        $data["current_btc"] = $this->getter->user_wallet()["btc"];
        $data["user_email"] = $_SESSION['email'];
        $data["userdata"] = $this->getter->user_data($_SESSION['id']);
        if($this->model->num_login_times() == 1){
            $this->load->view(view_map["dashboard"][0], "dashboard", $data);
        }else{
           
            $this->load->view(view_map["dashboard"][1], "dashboard", $data);
        }
    }

    public function call()
    {
        print("Index called");
    }
}