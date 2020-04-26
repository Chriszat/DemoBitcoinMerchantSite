<?php

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function index()
    {
        $this->view("index");
    }

}