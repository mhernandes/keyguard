<?php
	namespace Key;
	use Key\Password;

	/**
	 * summary
	 */
	class ManagePassword {
		private $password;
	    /**
	     * summary
	     */
	    public function __construct() {
	        $this->password = new Password();
	    }

	    public function setPasswordData($data = array()) {
	    	$this->password->setPasswordData($data);
	    }

	    public function getPasswordData() {
	    	return $this->password->getPasswordData();
	    }

	    public function getAllPasswords($user_mk = false) {
	    	return $this->password->getAllPasswords($user_mk);
	    }

	    public function createPassword($user_mk = false) {
	    	return $this->password->createPassword($user_mk);
	    }
	}
?>