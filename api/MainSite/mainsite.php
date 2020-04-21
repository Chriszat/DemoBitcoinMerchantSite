<?php

/**
 * 
 * This class is the main site class
 * accepts api calls and does processes 
 * with class methods.
 * @author Ihebuzo Chris
 */


 class MainSite extends Loader
 {
     public function __construct()
     {
         
     }

     /**
      * Loads in the main site page
      */
     public function gs()
     {
         echo $this->load("site-index");
     }
     
 }