<?php

namespace application\core\DatabaseHelper;

class DatabaseHelper
{
    public $conn;
    public $database;
    public function __construct()
    {
        $this->database = database;
        
    }

    public static function connection()
    {
       
        $con = mysqli_connect(database["host"], database["user"], database["password"], database["database"]) or die("Could not make connection");
        return $con;
    }
}