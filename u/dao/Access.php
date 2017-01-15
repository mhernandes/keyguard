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

	    // Start a connection
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

	    // Prepare a MySQL script
	    public function prepare($query, $driver_options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)) {
	    	$this->statement = $this->connection->prepare($query, $driver_options);
	    	return $this;
	    }

	    // Execute a MySQL script
	    public function execute($execute = array()) {
	    	try {
	    		$this->statement->execute($execute);
	    	} catch (PDOException $e) {
	    		die($this->error_messages["execute"].$e->getMessagge());
	    	}
	    	return $this;
	    }

	    // Inserting data
	    public function insert($insert = array()) {
	    	if (!$insert) { return false; }

	    	$query = $tables = $values = "";

	    	for ($i = 0; $i < count($insert); $i++) {
	    		$tables .= $insert[$i].", ";
	    	}


	    	for ($i = 0; $i < count($insert); $i++) {
	    		$values .= ":".$insert[$i].", ";
	    	}

	    	$tables = str_replace(", ", "", $tables, strrpos($tables, ", "));
	    	$values = str_replace(", ", "", $values, strrpos($values, ", "));
	    	$query = "INSERT INTO ".$table."(".$tables.") VALUES (".$values.")";

	    	$this->prepare($query);
	    }

	    // Bind a MySQL script parameters
	    public function bind($parameters, $bindparam = false) {
	    	if (is_array($parameters)) {
	    		foreach ($parameters as $key => $value) {
	    			if (!$bindparam) {
	    				$this->connection->bindValue($key, $value);
	    			} else {
	    				$this->connection->bindParam($key, $value);
	    			}
	    		}
	    	} else {
	    		return false;
	    	}
	    }

	    // Fetch data
	    public function fetch() {
			return $this->statement->fetch();
	    }

	    public function fetchAll() {
	    	return $this->statement->fetchAll();
	    }

	    // Close connection on destruct
	    public function __destruct() {
	    	$this->connection = NULL;
	    }
	}
?>