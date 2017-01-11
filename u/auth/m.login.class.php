<?php
	namespace Auth;

	/**
	 * summary
	 */
	class ManageLogin {
	    public $login;

	    public function __construct() {
	        $this->login = new Login();
	    }

	    public function set($userdata = array()) {
	    	$this->login->setData();
	    }

	    public function get() {
	    	$this->login->getData();
	    }

	    public function check() {
	    	$this->login->checkUser();
	    }
	}
?>