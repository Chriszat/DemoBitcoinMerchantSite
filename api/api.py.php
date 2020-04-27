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

$logout_template = '<div id="view" style="text-align: center;">
        <div class="" style="margin:50px auto; width:400px; max-width:100%; -webkit-user-select: none;-moz-user-select:
        none;-ms-user-select: none;user-select: none; position:relative" >
            <div class="">
                <form action="" method="POST" id="form">
                    <div class="card">
                        <div class="card-content">
                            <div style="padding:20px;margin:0 auto; width:150px; height:150px">
                                <img class="img-fluid" src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/exit.png" alt="404" style="width:100%" draggable="false">
                            </div>
                            <div class="card-body text-center " style="margin-top:0; padding-top:0; ">
                                <div id="body1">
                                    <p><b>Session Expired</b></p>
                                    <p>Your Current Session Has Expired. You Would Need To Re-login Again.</p>
                                </div>
                                <br><br>
                                <a onclick="javascript:location.reload()"><button class="btn"> <b>LOGIN</b></button></a>
                            </div>
                        </div>
                        <div id="overlay"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
function validateSession($REQUEST_TYPE, $REQUEST_ACTION){
    if(strtolower($REQUEST_TYPE) != "reg" && strtolower($REQUEST_TYPE) !="log"){
        if(!isset($_SESSION['id'])){
            if($REQUEST_ACTION == "count_notification"){
                echo 0;
            }else{
                global $logout_template;
                echo $logout_template;
            }

            return false;
        }else{
            return true;
        }
    }

    return true;

}

if(isset($_GET))
{
    $REQUEST_TYPE = isset($_GET['_']) ? $_GET['_'] : NULL;
    $REQUEST_ACTION = isset($_GET['a']) ? $_GET['a'] : NULL;

    if(!isset($_GET["AVOID"])){
        if(!validateSession($REQUEST_TYPE, $REQUEST_ACTION)){
            die();
        }
    }

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