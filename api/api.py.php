<?php
session_start();

require "../application/config/main.config.php";
require "../vendor/autoload.php";


$REQUEST_URL;
$REQUEST_TYPE;
$REQUEST_ACTION;
$CLASS_NAME;
$DIR = __DIR__.'/'; 
$OBJ;

if(isset($_GET))
{
    $REQUEST_TYPE = isset($_GET['_']) ? $_GET['_'] : NULL;
    $REQUEST_ACTION = isset($_GET['a']) ? $_GET['a'] : NULL;

    if($REQUEST_TYPE != NULL && $REQUEST_ACTION !=NULL)
    {
        if(is_dir($DIR.$REQUEST_TYPE))
        {
            
            $CLASS_NAME = ucwords($REQUEST_TYPE);
            $OBJ = new $CLASS_NAME();
            if(method_exists($OBJ, $REQUEST_ACTION))
            {
                $OBJ->{$REQUEST_ACTION}();
            }else{
                echo json_encode(array("STATUS"=>"error", "MESSAGE"=>"Request not found", "REMOTE_ADDR"=>$_SERVER["REMOTE_ADDR"], "DATE"=>date("Y-m-d")));
            }
        }else{
            echo json_encode(array("STATUS"=>"error", "MESSAGE"=>"Request not found", "REMOTE_ADDR"=>$_SERVER["REMOTE_ADDR"], "DATE"=>date("Y-m-d")));
            
        }
    }else{
        echo json_encode(array("STATUS"=>"error", "MESSAGE"=>"Request not found", "REMOTE_ADDR"=>$_SERVER["REMOTE_ADDR"], "DATE"=>date("Y-m-d")));
    }
}