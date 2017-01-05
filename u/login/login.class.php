<?php
	namespace Login;
	
	/**
	 * summary
	 */
	class Login	{
		private $access;
	    /**
	     * summary
	     */

	    public function __construct() {
	        $this->access = new DAO\ManageAccess();
	    }
	}
?>