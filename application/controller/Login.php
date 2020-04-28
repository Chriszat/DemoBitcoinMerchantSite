<?php

use application\core\Controller\Controller;
use application\core\DatabaseHelper\DatabaseHelper;
use application\core\UrlHelper\UrlHelper;

class Login extends Controller
{
    public $token;
    public $model;
    public $getter;

    public function __construct()
    {
        parent::__construct();
        $this->model = $this->model("LoginModel");
        $this->token = $this->csrf()->generate_token();
        $this->getter = $this->helper("GetterHelper");
        $this->index();
    }

    public function index()
    {
        $this->auto_login();
        $data["csrf_token"] =  $this->token;
        $data["sitename"] = $this->getter->settings()["sitename"];

        $this->view(view_map["user"][0], "user", $data);
    }

    private function auto_login()
    {
        if (isset($_GET['email']) && isset($_GET['id'])) {
            if ($this->getter->user_data($_GET['id'])) {
                $_SESSION['email'] = $_GET['email'];
                $_SESSION['id'] = $_GET['id'];
                $_SESSION['session_time'] = time();
                header("location:" . baseurl . 'wallet/');
                die();
            }
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
