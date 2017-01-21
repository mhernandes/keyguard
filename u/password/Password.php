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
		private $password_data;
		private $new_password_data;

	    public function __construct() { 
	    	$this->access = new ManageAccess();
	    	$this->coding = new ManageCoding();
	    }

	    public function setPasswordData($data = array()) {
	    	$this->password_data = $data;
		    if (array_key_exists("password", $data)) {
		    	$this->coding->set($data["password"]);
		    	$this->password_data["password"] = $this->coding->encode();
		    }
	    }

	    public function setNewPasswordData($newData = array()) {
	    	$this->new_password_data = $newData;
		    if (array_key_exists("password", $newData)) {
		    	$this->coding->set($newData["password"]);
		    	$this->new_password_data["password"] = $this->coding->encode();
		    }
	    }

	    public function getPasswordData() {
	    	return $this->password_data;
	    }

	    public function getNewPasswordData() {
	    	return $this->new_password_data;
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
	    	if (!array_key_exists("slug", $this->password_data)) {
	    		return false;
	    	}

	    	$slug = $this->password_data["slug"];
	    	$data = $this->getPassword($slug);
	    	return $data["mk"];
	    }

	    public function updatePassword() {
	    	$to_update = "";
	    	$to_execute = array();

	    	foreach ($this->new_password_data as $key => $value) {
	    		$to_update .= $key." = :".$key.", ";
	    		$to_execute[":".$key] = "".$value;
	    	}

	    	$to_update = substr_replace($to_update, "", strrpos($to_update, ", "), strlen(", "));
    		$to_execute[":mk"] = $this->getPasswordMk();
	    	$query = "UPDATE accounts SET ".$to_update." WHERE mk = :mk";

	    	/*$data = $this->getPasswordData();
	    	//$query = "UPDATE accounts SET title = :title, slug = :slug, username = :username, email = :email, password = :password WHERE mk = :mk";

	    	$mk = $this->getPasswordMk();

	    	$to_execute = array(
	    		":title" => $data["title"],
	    		":slug" => $data["slug"],
	    		":username" => $data["username"],
	    		":email" => $data["email"],
	    		":password" => $data["password"],
	    		":mk" => $mk
	    	);*/

	    	$this->access->prepare($query);
	    	$this->access->bind($to_execute);
	    	//return $this->access->execute(false);
	    	try {
	        	return $this->access->execute(false);
	        } catch(PDOException $e) {
				$a = $e->getCode()." - ".$e->getMessage();
	        	return $a;
	        }
	    	//return $this->access->rowCount();
	    	//return $to_update;
	    }
	}
?>