<?php
use application\core\Controller\Controller;

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
     
       $this->load->view(view_map["site"][0]);
      
    }

    public function call()
    {
        print("Index called");
    }
}