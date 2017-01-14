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
	    	$this->login->getData();
	    }

	    public function check() {
	    	$this->login->checkUser();
	    }
	}
?>