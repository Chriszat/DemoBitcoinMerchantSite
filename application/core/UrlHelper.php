<?php
/**
 * HELPER CLASS FOR THE READING AND 
 * MANUPULATION OF THE URL / URL PARAMS
 */
namespace application\core\UrlHelper;

class UrlHelper
{
    public function __construct()
    {
        //TODO
    }

    /**
     * Returns the part of the url $_SERVER[PATH_INFO] specified
     * by a given index
     * @param index
     */
    public function getUrlParts($index)
    {
        $url = $this->getUrl();
        return $url[$index];
    }

    /**
     * Returns the full url $_SERVER[PATH_INFO]
     * It can return it as an array or a string format
     * @param as_array
     */
    public function getUrl($as_array=TRUE)
    {
        $url = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], "/") : "/";
        if($as_array == TRUE){
            if($url == "/"){
                return [$url];
            }else{
                return explode("/", $url);
            }
        }else{
            return $url;
        }
    }

    /**
     * Returns the base path url 
     */
    public function baseurl()
    {
        return baseurl;
    }

    /**
     * Returns the view_map array from the 
     * configuration file.
     */
    public function view_map($start, $stop)
    {
        if(isset($start) && isset($stop)){
            return view_map[$start][$stop];
        }else if(isset($start)){
            return view_map[$start];
        }else{
            return view_map;
        }
    }
}