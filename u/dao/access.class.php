<?php
	/**
	 * @name Access
	 * Class for accessing database and returning the connection of PDO
	 *
	 */
	class Access {
		private $host = "localhost";
		private $user = "root";
		private $passwd = "devmath";
		private $database = "keyguard";

		protected $connection;
		
	    // Start a connection
	    public function __construct() {
	        $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->passwd);
	    }

	    public function prepare($value) {
	    	return $this->connection->prepare($value);
	    }
	}
?>