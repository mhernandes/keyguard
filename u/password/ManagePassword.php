<?php
	namespace Key;
	use Key\Password;
	/**
	 * @name Login
	 * @description Class for manage password class
	 * @author Matheus Hernandes
	 */
	class ManagePassword {
		private $password;

	    /**
		 * @description Create an instance of Password() and store in $password 
		 */
	    public function __construct() {
	        $this->password = new Password();
	    }

	    /**
		 * @description Set password data 
		 * @param $data is an array containing password data
		 */
	    public function setPasswordData($data = array()) {
	    	$this->password->setPasswordData($data);
	    }

	    /**
		 * @description Set new password data 
		 * @param $data is an array containing new password data
		 */
	    public function setNewPasswordData($data = array()) {
	    	$this->password->setNewPasswordData($data);
	    }

	    /**
		 * @description get password data setted in $password_data 
		 * @return an array containing password data 
		 */
	    public function getPasswordData() {
	    	return $this->password->getPasswordData();
	    }

	    /**
		 * @description get new password data setted in $password_data 
		 * @return an array containing new password data 
		 */
	    public function getNewPasswordData() {
	    	return $this->password->getNewPasswordData();
	    }

	    /**
		 * @description get all of the passwords stored in database 
		 * @return an array containing all of the passwords as objects
		 */
	    public function getAllPasswords($mk_user = false) {
	    	return $this->password->getAllPasswords($mk_user);
	    }

	    /**
		 * @description get password data from database 
		 * @param $slug is the password slug 
		 * @return an array containing password data from database 
		 */
	    public function getPassword($slug) {
	    	return $this->password->getPassword($slug);
	    }

	    /**
		 * @description get password marker 
		 * @return an integer containing the password marker/id 
		 */
	    public function getPasswordMk() {
	    	return $this->password->getPasswordMk();
	    }

	    /**
		 * @description create a new password
		 */
	    public function createPassword() {
	    	return $this->password->createPassword();
	    }

	    /**
		 * @description update the password using data setted in $new_password_data 
		 * @return an integer of how many rows were affected
		 */
	    public function updatePassword() {
	    	return $this->password->updatePassword();
	    }

	    /**
		 * @description delete the password 
		 * @return an integer of how many rows were affected
		 */
	    public function deletePassword() {
	    	return $this->password->deletePassword();
	    }
	}
?>