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
			$res = $_SESSION['user'];
			return $res[0];
		}
		if (isset($_COOKIE['user'])) {
			$res = json_decode($_COOKIE['user']);
			$res = (array) $res[0];
		  return $res;
		}
		return false;
	}
}