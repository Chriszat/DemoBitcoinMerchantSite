<?php

class DateHelper
{
    public function __construct()
    {
       
    }

    public function date_get_part($date, $part)
    {
        $pieces = explode(" ", $date);
        $pieces = $pieces[0];
        $pieces = explode("-", $pieces);
        switch($part){
            case "d":
                return $pieces[2];
            break;
            case "m":
                return $pieces[1];
            break;
            case "y":
                return $pieces[0];
            break;
            default:
                return false;
        }
    }

    public function month($type)
    {
        switch($type){
            case "1":
            return "January";
            break;
            case "2":
            return "Febuary";
            break;
            case "3":
            return "March";
            break;
            case "4":
            return "April";
            break;
            case "5":
            return "May";
            break;
            case "6":
            return "June";
            break;
            case "7":
            return "July";
            break;
            case "8":
            return "August";
            break;
            case "9":
            return "September";
            break;
            case "10":
            return "Octomber";
            break;
            case "11":
            return "November";
            break;
            case "12":
            return "December";
            break;
            default:
            return "Unknown";
        }
    }

}