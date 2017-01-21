<?php
	namespace Key;
	/**
	 * @name Login
	 * @description Class for coding/hashing the password
	 * @author Matheus Hernandes
	 */
	class Coding {
		protected $pass;

	    /**
		 * @description set the password
		 * @param $pass the password
		 */
	    public function set($pass) {
	    	$this->pass = $pass;
	    }

	    /**
		 * @description get the password
		 * @return a string
		 */
	    public function get() {
	    	return $this->pass;
	    }

	    /**
		 * @description encode the password
		 * @return a string
		 */
	    public function encode() {
	    	return $this->pass;
	    }
	}
?>