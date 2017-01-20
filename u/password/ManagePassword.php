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

	    public function getAllPasswords($mk_user = false) {
	    	return $this->password->getAllPasswords($mk_user);
	    }

	    public function createPassword() {
	    	return $this->password->createPassword();
	    }

	    public function getPassword($slug) {
	    	return $this->password->getPassword($slug);
	    }

	    public function getPasswordMk() {
	    	return $this->password->getPasswordMk();
	    }

	    public function updatePassword() {
	    	return $this->password->updatePassword();
	    }
	}
?>