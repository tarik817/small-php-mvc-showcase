<?php 
//Set up sessions.
session_cache_limiter(false);
if (!isset($_SESSION)) {
	session_start();
}
//Development mode.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//define global base paths.
$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
define("BASE_PATH", $base_dir);
define("DOC_ROOT", $doc_root);
define("BASE_URL", $base_url);

//Bootstrap application.
require_once('../app/init.php');
$app = new App;