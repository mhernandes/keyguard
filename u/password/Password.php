<?php
	namespace Key;
	use DAO\ManageAccess;

	/**
	 * summary
	 */
	class Password {
		private $access;
		private $coding;
		private $pass_data = array(
			"user_mk" => 0,
			"title" => "",
			"slug" => "",
			"email" => "",
			"password" => ""
		);

	    public function __construct() { 
	    	$this->access = new ManageAccess();
	    }

	    public function createPassword($data = array()) {
	    	$this->pass_data["user_mk"] = $data["user_mk"];
	    	$this->pass_data["title"] = $data["title"];
	    	$this->pass_data["slug"] = $data["slug"];
	    	$this->pass_data["email"] = $data["email"];
	    	$this->pass_data["password"] = $data["password"];
	    }

	    public function checkUser($user_mk = false) {

	    	if (!$user_mk) { $user_mk = $this->pass_data['user_mk']; }

	    	$query = "SELECT mk FROM users WHERE mk = '$user_mk'";
	    	$this->access->prepare($query);
	    	
	    	if($this->access->fetch()) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }

	    public function getPasswords($user_mk = false) {
	    	if (!$this->checkUser($user_mk)) { return false; }

	    	$query = array(
	    		"what" => "*", 
	    		"from" => "accounts",
	    		"where" => "user_mk = '$this->user_mk'"
	    	);

	    	$ret = $this->access->select($query);

	    	if ($ret) {
	    		return $ret;
	    	} else {
	    		return false;
	    	}
	    }
	}
?>