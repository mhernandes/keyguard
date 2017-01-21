<?php
	namespace Auth;
	use DAO\ManageAccess;
	use \PDO;
	/**
	 * @name Session
	 * @description Class for use session
	 * @author Matheus Hernandes
	 */
	class Session {
		private $access;
		private $session_data;

	    /**
		 * @description Create an ManageAccess instance and store in $access
		 */
	    public function __construct() {
	        $this->access = new ManageAccess();
	    }

	    /**
		 * @description Set session data
		 * @param $data is an array containing session data to be stored
		 */
	    public function setSessionData($data = array()) {
	    	foreach ($data as $key => $value) {
	    		$this->session_data[$key] = $value;
	    	}
	    }

	    /**
		 * @description Register the session data in $_SESSION
		 */
	    public function registerSessionData() {
	    	$data_to_register = $this->session_data;

	    	foreach ($data_to_register as $key => $value) {
	    		$_SESSION[$key] = $value;
	    	}
	    }

	    /**
		 * @description redirect the current page
		 * @param $redirect is the page path to redirect
		 */
	    public function redirect($redirect) {
	    	header("location: /keyguard/".$redirect);
	    }

	    /**
		 * @description Verify if the user is logged in
		 * @return true if the user is logged in or redirect to login page
		 */
	    public function check() {
	    	$name = $_SESSION['name'];
	    	$email = $_SESSION['email'];
	    	if($name OR $email) {
	    		return true;
	    	} else {
	    		$this->redirect("index.php");
	    	}
	    }

	    /**
		 * @description destroy the current session
		 */
	    public function destroy() {
	    	session_destroy();
	    	return $this;
	    }
	}
?>