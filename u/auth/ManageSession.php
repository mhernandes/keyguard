<?php
	namespace Auth;
	use Auth\Session;
	/**
	 * summary
	 */
	class ManageSession {
		private $session;
	    /**
	     * summary
	     */
	    public function __construct() {
	        $this->session = new Session();
	    }

	    public function startSession($session_name = "KeyGuard") {
	    	return $this->session->startSession($session_name);
	    }

	    public function setSessionData($data = array()) {
	    	return $this->session->setSessionData($data);
	    }

	    public function registerSessionData() {
	    	return $this->session->registerSessionData();
	    }

	    public function check() {
	    	return $this->session->check();
	    }

	    public function destroy() {
	    	return $this->session->destroy();
	    }

	    public function redirect($redirect) {
	    	return $this->session->redirect($redirect);
	    }
	}
?>