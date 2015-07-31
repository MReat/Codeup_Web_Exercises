<?php  
require_once 'Log.php';
require_once 'functions.php';
require_once 'Input.php';

class Auth
{
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password)
	{
		$log = new Log();
		if(escape(strtolower(Input::get('username'))) == "guest" && (password_verify($password, static::$password))) {
			$_SESSION['LOGGED_IN_USER'] = true;	
			$_SESSION['username'] = $username;
			$log->info("User {$username} logged in.");
		} else {
			$log->error("User {$username} failed to log in!");	
		}
	}
	
	public static function check ()
	{
		if(isset($_SESSION['LOGGED_IN_USER'])) {
			return true; 
		} else {
			return false;
		}
	}
	
	public static function user ()
	{
		if(isset($_SESSION['LOGGED_IN_USER'])) {
			return $username;
		} else {
			header('location: login.php');
			exit();
		}


	}

	public static function logout ()
	{
		session_start();
		$_SESSION = [];

		if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

		session_destroy();
	}
		
}



?>