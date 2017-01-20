<?php
	namespace Key;

	/**
	 * summary
	 */
	class Coding {
		protected $pass;
	    /**
	     * summary
	     */
	    public function __construct() {
	        
	    }

	    public function set($pass) {
	    	$this->pass = $pass;
	    }

	    public function get() {
	    	return $this->pass;
	    }

	    public function encode() {
	    	//$this->pass = base64_encode($this->pass);
	    	return $this->pass;
	    }
	}
?>