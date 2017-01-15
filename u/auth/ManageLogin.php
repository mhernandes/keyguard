<?php
	namespace Auth;
	use Auth\Login;

	/**
	 * summary
	 */
	class ManageLogin {
	    public $login;

	    public function __construct() {
	        $this->login = new Login();
	    }

	    public function set($userdata = array()) {
	    	$this->login->setData($userdata);
	    }

	    public function get() {
	    	return $this->login->getData();
	    }

	    public function check() {
	    	return $this->login->checkUser();
	    }
	}
?>