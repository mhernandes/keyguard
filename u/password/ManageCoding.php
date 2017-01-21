<?php
	namespace Key;
	use Key\Coding;
	/**
	 * @name Login
	 * @description Class for manage the coding class
	 * @author Matheus Hernandes
	 */
	class ManageCoding {
		public $coding;

	    /**
		 * @description Create an instance of Coding() and store in $coding
		 */
	    public function __construct() {
	        $this->coding = new Coding();
	    }

	    /**
		 * @description set the password
		 * @param $pass the password
		 */
	    public function set($pass) {
	    	$this->coding->set($pass);
	    }

	    /**
		 * @description get the password
		 * @return a string
		 */
	    public function get() {
	    	return $this->coding->get();
	    }

	    /**
		 * @description encode the password
		 * @return a string
		 */
	    public function encode() {
	    	return $this->coding->encode();
	    }
	}
?>