<?php 
namespace Core;

class Auth
{
	/**
	 * Check if user is log in.
	 *
	 * @return boolean
	 */
	public static function check ()
	{
		if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
			return true;
		}
		return false;
	}

	/**
	 * Get authenticated user.
	 *
	 * @return mixed
	 */
	public static function user ()
	{
		if(isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}
		if (isset($_COOKIE['user'])) {
		  return json_decode($_COOKIE['user']);
		}
		return false;
	}
}