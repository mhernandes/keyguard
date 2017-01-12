<?php
	namespace Key;

	/**
	 * summary
	 */
	class Password {
		private $pass_data = array(
			"user_mk" => 0,
			"title" => "",
			"slug" => "",
			"email" => "",
			"password" => ""
		);

		private $access = false;
		private $coding = false;

	    public function __construct() {}

	    private function startAccess() {
	    	if (!$this->access) {
	    		$this->access = new DAO\ManageAccess();
	    	}
	    }

	    public function createPassword($data = array()) {
	    	$this->pass_data["user_mk"] = $data["user_mk"];
	    	$this->pass_data["title"] = $data["title"];
	    	$this->pass_data["slug"] = $data["slug"];
	    	$this->pass_data["email"] = $data["email"];
	    	$this->pass_data["password"] = $data["password"];
	    }

	    public function checkUser() {
	    	$this->startAccess();
	    	$user_mk = $this->pass_data['user_mk'];
	    	$query = "SELECT mk FROM users WHERE mk = '$user_mk'";
	    	$this->access->prepare($query);
	    	
	    	if($this->access->fetch()) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }
	}
?>