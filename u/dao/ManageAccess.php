<?php
	namespace DAO;
	use DAO\Access;

	/**
	 * summary
	 */
	class ManageAccess {
	    public $access;

	    public function __construct() {
	        return $this->access = new Access();
	    }

	    public function prepare($query) {
	    	return $this->access->prepare($query);
	    }

	    public function execute($execute) {
	    	return $this->access->execute($execute);
	    }

	    public function insert($value = array()) {
	    	return $this->access->insert($value);
	    }

	    public function bind($parameters, $bindparam = false) {
	    	return $this->access->bind($parameters, $bindparam);
	    }

	    public function fetch() {
	    	return $this->access->fetch();
	    }

	    public function fetchAll() {
	    	return $this->access->fetchAll();
	    }
	}
?>