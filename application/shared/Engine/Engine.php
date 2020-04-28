<?php

use application\core\UrlHelper\UrlHelper;
use application\core\Loader\Loader;


class Engine extends UrlHelper
{
    public $url;
    public $load;
    public $controller;
    public $model;
    public $view;

    public function __construct()
    {
        //TODO
        $this->url = $this->getUrl();
        $this->load = $this->Loader()->load;
        $this->watcher();
    }

    /**
     * Watches the url for any change 
     * and performs routing activities
     * based on the current scope of the 
     * url.
     */
    public function watcher()
    {
        if($this->url[0] == "/"){
            $controller = new Index();
            $controller->index();
        }else{
            $ctrl = ucwords($this->url[0]);
           
            if(class_exists($ctrl)){
                $controller = new $ctrl();
                if(isset($this->url[1])){
                    if(method_exists($controller, $this->url[1])){
                        call_user_func_array(array($controller, $this->url[1]), array_slice($this->url, 2));
                    }
                }
                
            }else{
                $error = new ErrorPage();
                $error->index();
            }
            
        }
    }
    
    private function Loader()
    {
        return new Loader();
    }


    
    

}