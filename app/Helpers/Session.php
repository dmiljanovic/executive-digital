<?php

namespace App\Helpers;

/**
 * Class Session
 * @package App\Helpers
 */
class Session
{
    /**
     * Method for getting session value.
     * @param string $key
     * @param null $default
     * @return null
     */
	public static function GetKey($key, $default = null){
		if(!isset($_SESSION)){
			session_start();
		}

		if(!isset($_SESSION[$key])){
			return $default;
		}

		return $_SESSION[$key];
	}

    /**
     * Method for setting key, value pair in the session.
     *
     * @param string $key
     * @param $value
     */
	public static function SetKey($key, $value){
		$_SESSION[$key] = $value;
	}
}