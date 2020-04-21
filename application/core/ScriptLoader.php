<?php

/**
 * THIS CLASS DETERMINES WHAT 
 * REQUIRED STYLE & JAVASCRPT SCRIPTS
 * ARE TO BE LOADED BY READING THE URL
 * AND LOADING THE REQUIRED SCRIPTS AS 
 * PART OF THE HEADER FILE.
 */

class ScriptLoader extends BaseController
{
    public function __construct()
    {
        //TODO
    }

    public static function toLoad()
    {
        $part = ScriptLoader::UrlHelper_Construct()->getUrlParts(1);
        if($part == "wallet"){
            // echo "<h1>Wallet</h1>";
            return "wallet";
        }else if($part == "login"){
            // echo "<h1>Login</h1>";            
            return "login";
        }else{
            // echo "<h1>Site</h1>";
            return "site";
        }
    }

    private static function UrlHelper_Construct()
    {
        return new UrlHelper();
    }

    public static function loadHeaderScripts($type)
    {
        if($type == "site"){
            $contents = file_get_contents("application/views/site/header_scripts.php");
            echo $contents;
        }else if($type == "login"){
            $contents = file_get_contents("application/views/user/login_header_scripts.php");
            echo $contents;
        }
    }

    public static function loadFooterScripts($type)
    {
        if($type == "site"){
            $contents = file_get_contents("application/views/site/footer_scripts.php");
            echo $contents;
        }else if ($type == "login"){
            $contents = file_get_contents("application/views/user/login_footer_scripts.php");
            echo $contents;
        }
    }
}