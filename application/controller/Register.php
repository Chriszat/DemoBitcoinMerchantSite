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
        $this->con = $this->load->helper("application\core\DatabaseHelper\DatabaseHelper")::connection();
        $this->index();

    }

    public function index()
    {
        $data["csrf_token"] =  $this->token;
        $data["country"] = $this->location->location->country;
        $data["sitename"] = $this->getter->settings()["sitename"];
        $refered = false;
        if(isset($_GET['ref'])){
            $ref= $_GET['ref'];
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE referal_link='$ref'");
            if(mysqli_num_rows($query) > 0){
                $_SESSION['refered_by'] = mysqli_fetch_assoc($query)["id"];
            }else{
                if(isset($_SESSION['refered_by'])){
                    unset($_SESSION['refered_by']);
                }
            }
        }else{
            if(isset($_SESSION['refered_by'])){
                unset($_SESSION['']);
            }
        }
        
        if(isset($_GET['confirmation']) && isset($_SESSION['c_mail'])){
            if($_GET['confirmation'] == 'true'){
                $data['c_mail'] = $_SESSION['c_mail'];
                $this->view(view_map["user"][2], "user", $data);
                unset($_SESSION['c_mail']);
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