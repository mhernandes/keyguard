<?php
	namespace DAO;

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

	    public function query($query) {
	    	return $this->access->query($query);
	    }

	    public function execute() {
	    	return $this->access->execute();
	    }

	    public function insert($value = array()) {
	    	return $this->access->insert($value);
	    }

	    public function bind($parameters, $bindparam = false) {
	    	return $this->access->bind($parameters, $bindparam);
	    }

	    public function fetch($kind = "all") {
	    	return $this->access->fetch($kind);
	    }

	    public function select($value = array()) {
	    	return $this->access->select($value);
	    }

	    public function rowCount() {
	    	return $this->access->rowCount();
	    }

	    public function close() {
	    	return $this->access->close();
	    }

	    public function __destruct() {
	    	return $this->access->close();
	    }
	}
?>