<?php

/**
 * CLASS LOADER FOR LOADING VIEWS
 * IMPLEMENTS A LOADER METHOD FOR 
 * SENDING REQUEST TO LOADER FILES 
 * LOCATED IN THE VIEWS FOLDER.
 */

// require "vendor/autoload.php";

namespace application\core\Loader;
use application\core\UrlHelper\UrlHelper;

class Loader extends UrlHelper
{
    public $LOAD_TYPE;
    public $LOAD_COMPONENT;
    public $load;

    public function __construct()
    {
        //TODO
        $this->load = $this->load();
    }
    
    

    public function loadComponent($class, $method = NULL, $param)
    {
        $obj = new $class();
        if($method != NULL){
            \call_user_func_array($method, $param);
        }
    }

    public function load()
    {
        
        return new \CoreLoader();
    }
}