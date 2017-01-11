<?php
	namespace Login;

	/**
	 * summary
	 */
	class ManageLogin extends Login {
	    public $login;

	    public function __construct() {
	        $this->login = Login::getInstance();
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