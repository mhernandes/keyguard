<?php
	namespace DAO;
	use \PDO;
	/**
	 * @name Access
	 * @description Class for accessing database and returning the connection of PDO
	 * @author Matheus Hernandes
	 */
	class Access {
		private $host = "localhost";
		private $user = "root";
		private $passwd = "devmath";
		private $database = "keyguard";
		private $error_messages = array(
			"connection" => "Connection failed due to: ",
			"execute" => "Failed to execute MySQL script due to: "
		);
		protected $instance;
		protected $statement;

		private $connection;

	    /**
		 * @description Create an PDO instance and store in $connection
		 */
	    public function __construct($exception = false) {
	        try {
	        	$this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->passwd);

	        	if ($exception) {
	        		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        	}
	        } catch (PDOException $e) {
	        	die($this->error_messages["connection"].$e->getMessagge());
	        }
	    }

	    /**
		 * @description Prepare an SQL script
		 * @param $query is an SQL query
		 * @param $driver_options is the driver' options
		 */
	    public function prepare($query, $driver_options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)) {
	    	$this->statement = $this->connection->prepare($query, $driver_options);
	    }

	    /**
		 * @description Execute an prepared SQL script
		 * @param $execute array to bind values, if is false you can use bindValue() a/o bindParam()
		 */
	    public function execute($execute) {
	    	try {
	    		if ($execute !== false) {
	    			$this->statement->execute($execute);
	    		} else {
	    			$this->statement->execute();
	    		}
	    	} catch (PDOException $e) {
	    		die($this->error_messages["execute"].$e->getMessagge());
	    	}
	    }

	    /**
		 * @description Bind values
		 * @param $paramenters is an array with value to bind
		 * @param $bindparam if is true this method will use bindParam() instead bindValue()
		 */
	    public function bind($parameters, $bindparam = false) {
	    	if (is_array($parameters)) {
	    		foreach ($parameters as $key => $value) {
	    			if (!$bindparam) {
	    				$this->statement->bindValue($key, $value);
	    			} else {
	    				$this->statement->bindParam($key, $value);
	    			}
	    		}
	    	} else {
	    		return false;
	    	}
	    }

	    /**
		 * @description bind a value
		 * @param $key is the query' key
		 * @param $value is the query' value
		 */
	    public function bindValue($key, $value) {
	    	$this->statement->bindValue($key, $value);
	    }

	    /**
		 * @description Fetch the next row
		 * @return an array with the next result
		 */
	    public function fetch() {
			return $this->statement->fetch();
	    }

	    /**
		 * @description Fetch all of the results
		 * @return an array with all of the results
		 */
	    public function fetchAll() {
	    	return $this->statement->fetchAll();
	    }

	    /**
		 * @description Count how many rows were affected by the last SQL query
		 * @return an integer
		 */
	    public function rowCount() {
	    	return $this->statement->rowCount();
	    }

	    /**
		 * @description Close the connection
		 */
	    public function __destruct() {
	    	$this->connection = NULL;
	    }
	}
?>