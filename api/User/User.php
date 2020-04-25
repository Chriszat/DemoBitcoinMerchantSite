<?php

/**
 * 
 * This class is the user  class
 * accepts api calls and does processes 
 * with class methods.
 * @author Ihebuzo Chris
 */


 class User extends Loader
 {
     public function __construct()
     {
         
     }

     /**
      * Loads in the main site page
      */
     public function glogin()
     {
         echo $this->load("index", "user");
     }

     
     
 }