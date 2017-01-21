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
	    	return true;
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

	    public function redirect($redirect) {
	    	header("location: /keyguard/".$redirect);
	    }

	    public function check() {
	    	$name = $_SESSION['name'];
	    	$email = $_SESSION['email'];
	    	if($name OR $email) {
	    		return true;
	    	} else {
	    		$this->redirect("index.php");
	    	}
	    }

	    public function destroy() {
	    	session_destroy();
	    	return $this;
	    }
	}
?>