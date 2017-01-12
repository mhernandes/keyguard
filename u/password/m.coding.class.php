<?php
	namespace Key;

	/**
	 * summary
	 */
	class ManageCoding {
		public $coding;
	    /**
	     * summary
	     */
	    public function __construct() {
	        $this->coding = new Key\Coding();
	    }

	    public function set($pass) {
	    	$this->coding->set($pass);
	    }

	    public function get() {
	    	return $this->coding->get();
	    }

	    public function encode() {
	    	$this->coding->encode();
	    }
	}
?>