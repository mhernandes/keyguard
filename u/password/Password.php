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
			"mk_user" => 0,
			"title" => "",
			"slug" => "",
			"username" => "",
			"email" => "",
			"password" => ""
		);

	    public function __construct() { 
	    	$this->access = new ManageAccess();
	    	$this->coding = new ManageCoding();
	    }

	    public function setPasswordData($data = array()) {
	    	$this->password_data["mk_user"] = $data["mk_user"];
	    	$this->password_data["title"] = $data["title"];
	    	$this->password_data["slug"] = $data["slug"];
	    	$this->password_data["username"] = $data["username"];
	    	$this->password_data["email"] = $data["email"];
	    	$this->password_data["password"] = $this->coding->encode($data["password"]);
	    }

	    public function getPasswordData() {
	    	return $this->password_data;
	    }

	    public function getAllPasswords($mk_user = false) {
	    	$query = "SELECT * FROM accounts WHERE mk_user = :mk_user";

	    	$to_execute = array(":mk_user" => $mk_user);

	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);
	    	return $this->access->fetchAll();
	    }

	    public function createPassword() {
	    	$query = "INSERT INTO accounts(mk_user, title, slug, username, email, password) VALUES(:mk_user, :title, :slug, :username, :email, :password)";

	    	$data = $this->getPasswordData();

	    	$to_execute = array(
	    		":mk_user" => $data["mk_user"],
	    		":title" => $data["title"],
	    		":slug" => $data["slug"],
	    		":username" => $data["username"],
	    		":email" => $data["email"],
	    		":password" => $data["password"]
	    	);

	    	$this->access->prepare($query);
	    	return $this->access->execute($to_execute);
	    }

	    public function getPassword($slug) {
	    	$query = "SELECT * FROM accounts WHERE slug = :slug";
	    	$to_execute = array(":slug" => $slug);
	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);

	    	return $this->access->fetch();
	    }

	    public function getPasswordMk() {
	    	$data = $this->getPassword($this->data["slug"]);
	    	return $data["mk"];
	    }

	    public function updatePassword() {
	    	$query = "UPDATE accounts SET title = :title, slug = :slug, username = :username, email = :email, password = :password WHERE mk = :mk";

	    	$data = $this->getPasswordData();

	    	$this->data["mk"] = $this->getPasswordMk();

	    	$to_execute = array(
	    		":mk" => $data["mk"],
	    		":title" => $data["title"],
	    		":slug" => $data["slug"],
	    		":username" => $data["username"],
	    		":email" => $data["email"],
	    		":password" => $data["password"]
	    	);

	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);

	    	return $this->access->rowCount();
	    }
	}
?>