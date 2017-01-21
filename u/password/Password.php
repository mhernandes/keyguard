<?php
	namespace Key;
	use DAO\ManageAccess;
	use Key\ManageCoding;
	/**
	 * @name Login
	 * @description Class for passwords
	 * @author Matheus Hernandes
	 */
	class Password {
		private $access;
		private $coding;
		private $password_data;
		private $new_password_data;

	    /**
		 * @description Create an instance of ManageAccess and ManageCoding and store them in $access and $coding 
		 */
	    public function __construct() { 
	    	$this->access = new ManageAccess();
	    	$this->coding = new ManageCoding();
	    }

	    /**
		 * @description Set password data 
		 * @param $data is an array containing password data
		 */
	    public function setPasswordData($data = array()) {
	    	$this->password_data = $data;
		    if (array_key_exists("password", $data)) {
		    	$this->coding->set($data["password"]);
		    	$this->password_data["password"] = $this->coding->encode();
		    }
	    }

	    /**
		 * @description Set new password data 
		 * @param $data is an array containing new password data
		 */
	    public function setNewPasswordData($newData = array()) {
	    	$this->new_password_data = $newData;
		    if (array_key_exists("password", $newData)) {
		    	$this->coding->set($newData["password"]);
		    	$this->new_password_data["password"] = $this->coding->encode();
		    }
	    }

	    /**
		 * @description get password data setted in $password_data 
		 * @return an array containing password data 
		 */
	    public function getPasswordData() {
	    	return $this->password_data;
	    }

	    /**
		 * @description get new password data setted in $password_data 
		 * @return an array containing new password data 
		 */
	    public function getNewPasswordData() {
	    	return $this->new_password_data;
	    }

	    /**
		 * @description get all of the passwords stored in database 
		 * @return an array containing all of the passwords as objects
		 */
	    public function getAllPasswords($mk_user = false) {
	    	$query = "SELECT * FROM accounts WHERE mk_user = :mk_user";

	    	$to_execute = array(":mk_user" => $mk_user);

	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);
	    	return $this->access->fetchAll();
	    }

	    /**
		 * @description create a new password
		 */
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

	    /**
		 * @description get password data from database 
		 * @param $slug is the password slug 
		 * @return an array containing password data from database 
		 */
	    public function getPassword($slug) {
	    	$query = "SELECT * FROM accounts WHERE slug = :slug";
	    	$to_execute = array(":slug" => $slug);
	    	$this->access->prepare($query);
	    	$this->access->execute($to_execute);

	    	return $this->access->fetch();
	    }

	    /**
		 * @description get password marker 
		 * @return an integer containing the password marker/id 
		 */
	    public function getPasswordMk() {
	    	if (!array_key_exists("slug", $this->password_data)) {
	    		return false;
	    	}

	    	$slug = $this->password_data["slug"];
	    	$data = $this->getPassword($slug);
	    	return $data["mk"];
	    }

	    /**
		 * @description update the password using data setted in $new_password_data 
		 * @return an integer of how many rows were affected
		 */
	    public function updatePassword() {
	    	$to_update = "";
	    	$to_bind = array();

	    	foreach ($this->new_password_data as $key => $value) {
	    		$to_update .= $key." = :".$key.", ";
	    		$to_bind[":".$key] = "".$value;
	    	}

	    	$to_update = substr_replace($to_update, "", strrpos($to_update, ", "), strlen(", "));
    		$to_bind[":mk"] = $this->getPasswordMk();
	    	$query = "UPDATE accounts SET ".$to_update." WHERE mk = :mk";

	    	$this->access->prepare($query);
	    	$this->access->bind($to_bind);
        	$this->access->execute(false);
        	return $this->access->rowCount();
	    }

	    /**
		 * @description delete the password 
		 * @return an integer of how many rows were affected
		 */
	    public function deletePassword() {
	    	$query = "DELETE FROM accounts WHERE mk = :mk";
	    	$mk = $this->getPasswordMk();
	    	$bind = array(
	    		":mk" => $mk 
	    	);
	    	$this->access->prepare($query);
	    	$this->access->bind($bind);
        	$this->access->execute(false);
        	return $this->access->rowCount();	    	
	    }
	}
?>