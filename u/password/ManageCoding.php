<?php
	namespace Key;
	use Key\Coding;
	/**
	 * summary
	 */
	class ManageCoding {
		public $coding;
	    /**
	     * summary
	     */
	    public function __construct() {
	        $this->coding = new Coding();
	    }

	    public function set($pass) {
	    	$this->coding->set($pass);
	    }

	    public function get() {
	    	return $this->coding->get();
	    }

	    public function encode() {
	    	return $this->coding->encode();
	    }
	}
?>