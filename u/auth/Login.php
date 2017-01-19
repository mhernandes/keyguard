<?php
	namespace Auth;
	use DAO\ManageAccess;
	use \PDO;
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

	    public function getUserData() {
	    	return $this->checkUser();
	    }

	    protected function decodePass() {
	    	return $this->password;
	    }

	    public function checkUser() {
	    	$pass = $this->password;
	    	$query = "SELECT name, email, password FROM users WHERE email = :email AND password = :password";
	    	
	    	$execute = array(
	    		":email" => $this->email,
	    		":password" => $pass 
	    	);

	    	$this->access->prepare($query);
	    	$this->access->execute($execute);
	    	$fetching = $this->access->fetch();
	    	
	    	if ($fetching) {
	    		return $fetching;
	    	} else {
	    		return false;
	    	}
	    }

	    public function __destruct() {
	    	$this->access->close();
	    }
	}
?>