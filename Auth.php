<?
	require_once 'Log.php';
	class Auth{
		public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
		
		public static function attempt($username,$password)
		{
			if($username == 'guest' && password_verify($password, self::$password)){
				$_SESSION['userLoggedIn'] = true;
				$log1 = new Log("auth");
				$log1->logInfo($username . " has logged in");	
				$_SESSION['username'] = $username;
			}elseif(!empty($user) || !empty($password)){
				$log2 = new Log("auth");
				$log2->logError($username . " failed to log in");
			}
		}
		public static function check()
		{
			if($_SESSION['userLoggedIn'] == 'true'){
				return true;
			}else{
				return false;
			}
		}
		public static function user()
		{
			return $_SESSION['username'];
		}
		public static function logout()
		{
		    $_SESSION = array();
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
