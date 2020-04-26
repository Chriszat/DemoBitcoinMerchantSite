<?php

use application\core\Controller\Controller;
/**
 * Confirm user registeration email
 */


class Confirm_email extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = $this->model("application\model\Confirm_email\Confirm_email");
        $this->index();
    }

    public function index()
    {
        $type = isset($_GET["t"]) ? $_GET["t"] : "pri";
        $confirm = $this->model->confirm_mail($type);
        $response = json_decode($confirm);
        
        if($response->status == 'success'){
            header("location:".baseurl.'login/?f=1');
        }else if ($response->status =='token_invalid' || $response->status =='error'){
            $data["state"] = "token_invalid";
            $data["display"] = ucwords($response->status);
            $this->view(view_map["user"][3], "user", $data);
        }
    }
} 