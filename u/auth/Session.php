<?php
	namespace Auth;
	use DAO\ManageAccess;
	use \PDO;
	/**
	 * summary
	 */
	class Session {
		private $access;
		private $session_data;
	    /**
	     * summary
	     */
	    public function __construct() {
	        $this->access = new ManageAccess();
	    }

	    public function startSession($session_name = "KeyGuard") {
	    	if (session_status() !== PHP_SESSION_ACTIVE) { return false; }
	    	session_name($session_name);
	    	session_start();
	    	return $this;
	    }

	    public function setSessionData($data = array()) {
	    	foreach ($data as $key => $value) {
	    		$this->session_data[$key] = $value;
	    	}

	    	return $this;
	    }

	    public function registerSessionData() {
	    	$data_to_register = $this->session_data;

	    	foreach ($data_to_register as $key => $value) {
	    		$_SESSION[$key] = $value;
	    	}

	    	return $this;
	    }

	    public function check() {
	    	if ($_SESSION['username'] OR $_SESSION['name']) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }

	    public function redirect($redirect) {
	    	header("location: ".$redirect);
	    }

	    public function destroy() {
	    	session_destroy();
	    	return $this;
	    }
	}
?>