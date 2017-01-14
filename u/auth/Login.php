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

	    public function setData($userdata = array()) {
	    	$this->email = $userdata["email"];
	    	$this->password = $userdata["password"];
	    }

	    public function getData() {
	    	$userdata = array(
	    		"email" => $this->email,
	    		"password" => $this->password
	    	);

	    	return $userdata;
	    }

	    protected function decodePass() {
	    	return $this->password;
	    }

	    public function checkUser() {
	    	$pass = $this->decodePass();
	    	$query = "SELECT email, password FROM users WHERE email = :email AND password = :password";
	    	$driver_options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY);
	    	
	    	$execute = array(
	    		":email" => $this->email,
	    		":password" => $pass 
	    	);

	    	$this->access->prepare($query, $driver_options);
	    	$this->access->execute($execute);
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