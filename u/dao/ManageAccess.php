<?php
	namespace DAO;
	use DAO\Access;
	/**
	 * @name Login
	 * @description Class for manage access class
	 * @author Matheus Hernandes
	 */
	class ManageAccess {
	    public $access;

	    /**
		 * @description Create an Access instance and store in $access
		 */
	    public function __construct() {
	        return $this->access = new Access();
	    }

	    /**
		 * @description Prepare an SQL script
		 * @param $query is an SQL query
		 * @param $driver_options is the driver' options
		 */
	    public function prepare($query) {
	    	$this->access->prepare($query);
	    }

	    /**
		 * @description Execute an prepared SQL script
		 * @param $execute array to bind values, if is false you can use bindValue() a/o bindParam()
		 */
	    public function execute($execute) {
	    	return $this->access->execute($execute);
	    }

	    /**
		 * @description Bind values
		 * @param $paramenters is an array with value to bind
		 * @param $bindparam if is true this method will use bindParam() instead bindValue()
		 */
	    public function bind($parameters, $bindparam = false) {
	    	return $this->access->bind($parameters, $bindparam);
	    }

	    /**
		 * @description bind a value
		 * @param $key is the query' key
		 * @param $value is the query' value
		 */
	    public function bindValue($key, $value) {
	    	return $this->access->bindValue($key, $value);
	    }

	    /**
		 * @description Fetch the next row
		 * @return an array with the next result
		 */
	    public function fetch() {
	    	return $this->access->fetch();
	    }

	    /**
		 * @description Fetch all of the results
		 * @return an array with all of the results
		 */
	    public function fetchAll() {
	    	return $this->access->fetchAll();
	    }

	    /**
		 * @description Count how many rows were affected by the last SQL query
		 * @return an integer
		 */
	    public function rowCount() {
	    	return $this->access->rowCount();
	    }
	}
?>