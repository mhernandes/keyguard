<?php
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
	    protected function prepare($value) {
	    	$this->connection->prepare($value);
	    }

	    // Bind a MySQL script parameters
	    protected function bind($parameters, $bindparam = false) {
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

	    // Execute a MySQL script
	    protected function execute($value) {
	    	try {
	    		$this->connection->execute();
	    	} catch (PDOException $e) {
	    		die($this->error_messages["execute"].$e->getMessagge());
	    	}
	    }

	    // Close connection
	    protected function close() {
	    	$this->connection = NULL;
	    }

	    // Close connection on destruct
	    public function __destruct() {
	    	$this->connection = NULL;
	    }
	}
?>