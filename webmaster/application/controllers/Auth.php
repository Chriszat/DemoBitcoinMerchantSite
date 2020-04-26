<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array("form"));
        $this->load->library("session");
        $this->load->library('form_validation');
        $this->load->database();
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }


    public function admin_login()
    {
        $data["title"] = "Admin Secure Login Form";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') :

            $this->load->view("signin");

        elseif ($_SERVER["REQUEST_METHOD"] == 'POST') :
            $data = $this->db->get_where("admin", array("username" => $this->input->post("username"), "password" => md5($this->input->post("password"))));
            if (!empty($data->result_array())) {
                $_SESSION["admin_verified"] = TRUE;
                $_SESSION['site'] = 'adminsite';
                header("location:" . base_url('/webmaster/') . "");
            } else {

                $this->load->view("signin", ["login_error" => TRUE]);
            }
        endif;
    }
}
