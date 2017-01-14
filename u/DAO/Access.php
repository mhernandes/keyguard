<?php
	namespace DAO;

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
	    public function prepare($value) {
	    	$this->connection->prepare($value);
	    }

	    // Set a SQL query
	    public function query($query) {
	    	return $this->connection->query($query);
	    }

	    // Execute a MySQL script
	    public function execute() {
	    	try {
	    		$this->connection->execute();
	    	} catch (PDOException $e) {
	    		die($this->error_messages["execute"].$e->getMessagge());
	    	}
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
	    public function fetch($kind = "all") {
	    	switch ($kind) {
	    		case "all":
	    			return $this->connection->fetchAll();
	    			break;

	    		case "object":
	    			return $this->connection->fetchObject();
	    			break;

	    		case "column":
	    			return $this->connection->fetchColumn();
	    			break;

	    		case "line":
	    			return $this->connection->fetch();
	    			break;
	    	}
	    }

	    // Do a simple select query into db and return them
	    public function select($selecting = array()) {
	    	$what = $selecting["what"];
	    	$from = $selecting["from"];
	    	$where = "";

	    	if (array_key_exists("where", $selecting)) {
	    		$where = " WHERE ".$selecting["where"];
	    	}

	    	$final_query = "SELECT ".$what." FROM ".$from.$where;

	    	$this->connection->prepare($final_query);
	    	return $this->connection->fetchAll();
	    }

	    // Counts the total rows of the current object.
	    public function rowCount() {
	    	return $this->connection->rowCount();
	    }

	    public static function getInstance() {
		    if (!isset(static::$instance)) {
		        static::$instance = new static;
		    }

		    return static::$instance;
		}

	    // Close connection
	    public function close() {
	    	$this->connection = NULL;
	    }

	    // Close connection on destruct
	    public function __destruct() {
	    	$this->connection = NULL;
	    }
	}
?>