<?php
use application\core\Controller\Controller;

class Referal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // $url = $this->load->helper("bitcoin");
        // $this->index();
    }

    public function index($params)
    {
        
        header("location:".baseurl."register/?ref=".$params);

    }

    public function call()
    {
        print("Index called");
    }
}