<?php
namespace application\core\Controller;
use application\core\Loader\Loader;

/**
 * Base application controller
 */

class Controller extends \CoreLoader
{
    public $load;
    public $helper;

    public function __construct()
    {
        $this->load= $this->Load()->load;
    }

    public function Load()
    {
        return new Loader();
    }


   
}