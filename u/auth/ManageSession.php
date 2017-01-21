<?php
	namespace Auth;
	use Auth\Session;
	/**
	 * @name Login
	 * @description Class for manage session class
	 * @author Matheus Hernandes
	 */
	class ManageSession {
		private $session;

	    /**
		 * @description Create an Session instance and store in $session
		 */
	    public function __construct() {
	        $this->session = new Session();
	    }

	    /**
		 * @description Set session data
		 * @param $data is an array containing session data to be stored
		 */
	    public function setSessionData($data = array()) {
	    	$this->session->setSessionData($data);
	    }

	    /**
		 * @description Register the session data in $_SESSION
		 */
	    public function registerSessionData() {
	    	return $this->session->registerSessionData();
	    }

	    /**
		 * @description Verify if the user is logged in
		 * @return true if the user is logged in or redirect to login page
		 */
	    public function check() {
	    	return $this->session->check();
	    }

	    /**
		 * @description redirect the current page
		 * @param $redirect is the page path to redirect
		 */
	    public function redirect($redirect) {
	    	return $this->session->redirect($redirect);
	    }
	}
?>