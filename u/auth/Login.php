<?php
	namespace Auth;
	use DAO\ManageAccess;
	use \PDO;
	/**
	 * @name Login
	 * @description Class for logging
	 * @author Matheus Hernandes
	 */
	class Login	{
		private $access;
		protected $email;
		protected $password;


	    /**
		 * @description Create an instance of ManageAccess and store in $access attribute
		 */
	    public function __construct() {
	        $this->access = new ManageAccess();
	    }

	    /**
		 * @description Set user data for logging
		 * @param $userdata is an array containing user data
		 */
	    public function setData($userdata = array()) {
	    	$this->email = $userdata["email"];
	    	$this->password = $userdata["password"];
	    }

	    /**
		 * @description Get the user data setted 
		 * @return an array containing user data setted
		 */
	    public function getData() {
	    	$userdata = array(
	    		"email" => $this->email,
	    		"password" => $this->password
	    	);

	    	return $userdata;
	    }

	    /**
		 * @return $this->checkUser with verify if the user exists
		 */
	    public function getUserData() {
	    	return $this->checkUser();
	    }

	    /**
		 * @return the decoded password
		 */
	    protected function decodePass() {
	    	return $this->password;
	    }

	    /**
		 * @description Verify if the user exists
		 * @return an array containing user data from database
		 */
	    public function checkUser() {
	    	$pass = $this->password;
	    	$query = "SELECT mk, name, email, password FROM users WHERE email = :email AND password = :password";
	    	
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

	    /**
		 * @description close the connection
		 */
	    public function __destruct() {
	    	$this->access->close();
	    }
	}
?>