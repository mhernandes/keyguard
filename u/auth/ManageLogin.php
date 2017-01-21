<?php
	namespace Auth;
	use Auth\Login;

	/**
	 * summary
	 */
	class ManageLogin {
	    public $login;


	    /**
		 * @description Create an instance of Login class and store in $login
		 */
	    public function __construct() {
	        $this->login = new Login();
	    }

	    /**
		 * @description Set user data
		 */
	    public function set($userdata = array()) {
	    	$this->login->setData($userdata);
	    }

	    /**
		 * @description get user data setted before
		 * @return an array containing user data setted before
		 */
	    public function get() {
	    	return $this->login->getData();
	    }

	    /**
		 * @description verify if the user exists
		 * @return an array containing user data from database
		 */
	    public function check() {
	    	return $this->login->checkUser();
	    }

	    /**
		 * @description get user data from database
		 * @return an array containing user data
		 */
	    public function getUserData() {
	    	return $this->login->getUserData();
	    }
	}
?>