<?php

/**
 * Location helper class
 * can be used to get the user current
 * location and every thing that has to do
 * with finding current location.
 */
// namespace application\core\LocationHelper;

class LocationHelper
{
    public $location;
    public function __construct()
    {
        //TODO
        $this->location = $this->location();
    }

    
	private function location()
	{
		$URL='http://ip-api.com/json/';

		$ch=curl_init();

		curl_setopt($ch, CURLOPT_URL, $URL);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output=curl_exec($ch);

		return json_decode($output);
	}

}