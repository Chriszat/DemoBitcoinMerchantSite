<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper("date");
    
    }

    public function view($template = null, $args = [])
    {
        $settings = $this->db->get("settings")->row_array();
        $data=["base_site_url"=>$this->config->item('base_site_url'), "settings"=>$settings] ;
        $data = array_merge($data, $args);
        $this->load->view("fragments/header", $data);
        $this->load->view($template, $args);
        $this->load->view("fragments/footer");
    }

   

    function configuration()

    {
        $query = $this->db->get("application_settings")->row_array();
        $config = [];

        $config["username"] = $query["email_login_username"];

        $config["password"] = $query["email_login_password"];

        $config["sitename"] = $query["sitename"];
        $config["smtp"] = $query["email_smtp"];
        $config["port"] = $query["port"];
        $config["encryption"] = $query["encryption"];
        $config["setFrom"] = $query["set_from_email"];

        return $config;
    }
}
