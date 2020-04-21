<?php
/**
 * Core loader class that implements 
 * the funtionality to load modules
 * controller, and views.User
 * 
 */
// use application\core\UrlHelper\UrlHelper;

class CoreLoader
{
    public $ctrl;
    public $model;

    public function __construct()
    {
       
    }

    public function model($model)
    {
        $obj = new $model();
        return $obj;
    }

    public function controller($controller)
    {
        if(class_exists($controller)){
            $obj = new $controller();
            $this->ctrl = $obj;
        }else{
            $obj = new ErrorPage();
            $this->ctrl = $obj;
        }
        
    }

    public function view($view, $type="site", $data=[], $header=TRUE, $footer=TRUE, $ext=".php")
    {
        $this->LOAD_TYPE=$type;
        extract($data);
        
        if($header == TRUE && $footer==TRUE)
        {
            require 'application/views/'.$this->LOAD_TYPE.'/header'.$ext;

            require 'application/views/'.$this->LOAD_TYPE.'/'.$view.$ext;

            require 'application/views/'.$this->LOAD_TYPE.'/footer'.$ext;
           
        }else if($header == TRUE){
            require 'application/views/'.$this->LOAD_TYPE.'/header'.$ext;
            require 'application/views/'.$this->LOAD_TYPE.'/'.$view.$ext;

        }else if ($footer ==TRUE){
            require 'application/views/'.$this->LOAD_TYPE.'/'.$view.$ext;
            require 'application/views/'.$this->LOAD_TYPE.'/footer'.$ext;

        }else{
            require 'application/views/'.$this->LOAD_TYPE.'/'.$view.$ext;
        }
        
    }

    public function template($view, $type="site", $data=[], $header=TRUE, $footer=TRUE, $ext=".php")
    {
        $this->LOAD_TYPE=$type;
        extract($data);
        
        if($header == TRUE && $footer==TRUE)
        {
            require '../application/views/'.$this->LOAD_TYPE.'/'.$view.$ext;
        }
        
    }

    public function method($func, $param)
    {
        $func_name = array($this->ctrl, $func);
        if(is_callable($func_name)){
            $load = call_user_func_array($func_name, $param);
            return $load; 
           
        }
    }

    public function helper($helper)
    {
        
        $obj = new $helper();
        return $obj;
        
    }

    public function call()
    {
        echo "method from core loader";
    }

    public function load_email_template($template, $data=[])
    {
        return file_get_contents($template);
    }

   
}