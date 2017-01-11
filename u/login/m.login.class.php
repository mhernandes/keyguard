<?php
	namespace Login;

	/**
	 * summary
	 */
	class ManageLogin extends Login {
	    public $login;

	    public function __construct() {
	        return $this->login = Login::getInstance();
	    }
	}
?>