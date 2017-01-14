<?php
	namespace Auth;
	use DAO\ManageAccess;
	
	/**
	 * summary
	 */
	class Login	{
		private $access;
		protected $email;
		protected $password;
	    /**
	     * summary
	     */

	    public function __construct() {
	        $this->access = new ManageAccess();
	    }

	    protected function setData($userdata = array()) {
	    	$this->email = $userdata["email"];
	    	$this->password = $userdata["password"];
	    }

	    protected function getData() {
	    	$userdata = array(
	    		"email" => $this->email,
	    		"password" => $this->password
	    	);

	    	return $userdata;
	    }

	    protected function checkUser() {
	    	$query = "SELECT email, password FROM users WHERE email = '$this->email' AND password = '$this->password'";
	    	$this->access->prepare($query);
	    	$fetching = $this->access->fetch();
	    	
	    	if ($fetching) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }

	    public function __destruct() {
	    	$this->access->close();
	    }

	    protected static function getInstance() {
		    if (!isset(static::$instance)) {
		        static::$instance = new static;
		    }

		    return static::$instance;
		}
	}
?>