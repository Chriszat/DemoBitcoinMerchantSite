<?php
use application\core\Controller\Controller;

class Register extends Controller
{
    public $token;
    public $model;
    public $location;
    public $getter;

    public function __construct()
    {
        parent::__construct();
        // $this->model = $this->model("LoginModel");
        $this->token = $this->csrf()->generate_token();
        $this->location  = $this->helper("LocationHelper");
        $this->getter = $this->helper("GetterHelper");
        $this->index();

    }

    public function index()
    {
        $data["csrf_token"] =  $this->token;
        $data["country"] = $this->location->location->country;
        $data["sitename"] = $this->getter->settings()["sitename"];
        if(isset($_GET['confirmation']) && isset($_SESSION['confirm_email'])){
            if($_GET['confirmation'] == 'true'){
                $data['confirm_email'] = $_SESSION['confirm_email'];
                $this->view(view_map["user"][2], "user", $data);
                unset($_SESSION['confirm_email']);
            }else{
                $this->view(view_map["user"][1], "user", $data);
            }
        }else{
            $this->view(view_map["user"][1], "user", $data);
        }
    }

    public function call()
    {
        print("Index called");
    }

    public function csrf()
    {
        return new Csrf();
    }
}