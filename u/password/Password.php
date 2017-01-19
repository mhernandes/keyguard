<?php
	namespace Key;
	use DAO\ManageAccess;
	use Key\ManageCoding;

	/**
	 * summary
	 */
	class Password {
		private $access;
		private $coding;
		private $password_data = array(
			"user_mk" => 0,
			"title" => "",
			"slug" => "",
			"email" => "",
			"password" => ""
		);

	    public function __construct() { 
	    	$this->access = new ManageAccess();
	    	$this->coding = new ManageCoding();
	    }

	    public function setPasswordData($data = array()) {
	    	$this->password_data["user_mk"] = $data["user_mk"];
	    	$this->password_data["title"] = $data["title"];
	    	$this->password_data["slug"] = $data["slug"];
	    	$this->password_data["email"] = $data["email"];
	    	$this->password_data["password"] = $this->coding->encode($data["password"]);
	    }

	    public function getPasswordData() {
	    	return $this->password_data;
	    }

	    public function getAllPasswords($user_mk = false) {
	    	if (!$this->checkUser($user_mk)) { return false; }

	    	$query = "SELECT * FROM accounts WHERE mk_user = :mk_user";

	    	$data = $this->getPasswordData();

	    	$to_execute = array(":mk_user" = $data["mk_user"]);

	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);
	    	return $this->access->fetch();
	    }

	    public function createPassword($user_mk = false) {
	    	if (!$this->checkUser($user_mk)) { return false; }

	    	$query = "INSERT INTO accounts(mk_user, title, slug, email, password) VALUES(:mk_user, :title, :slug, :email, :password)";

	    	$data = $this->getPasswordData();

	    	$to_execute = array(
	    		":mk_user" = $data["mk_user"],
	    		":title" = $data["title"],
	    		":slug" = $data["slug"],
	    		":email" = $data["email"],
	    		":password" = $data["password"]
	    	);

	    	$this->access->prepare($query);
	    	return $this->access->execute($to_execute);
	    }
	}
?>