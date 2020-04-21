<?php
use application\core\Loader\Loader;

/**
 * Error page class to handle
 * all page errors such as 404,
 * error
 */


class ErrorPage extends Loader
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
     
       $this->load->view(view_map["404"][0], "404");
      
    }
}