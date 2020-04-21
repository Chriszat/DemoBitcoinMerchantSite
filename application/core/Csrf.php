<?php

/**
 * This class provieds methods to 
 * provied security against CSRF ATTACKS
 * using a unique generated token
 */


class Csrf
{
    public function __construct()
    {
        //TODO
    }

    /**
     * Generate unique CSRF TOKEN
     */
    public function generate_token()
    {
        
        $salt = "27b76c84b2197c4f3024567f1db357002e5cea09";
        $token = str_shuffle($salt.time());
        $this->set_csrf_token($token);
        return $token;
    }

    public function set_csrf_token($token)
    {
        $_SESSION['csrf_token'] = $token;
        return;
    }
}