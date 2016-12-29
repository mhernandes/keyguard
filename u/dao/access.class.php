<?php
	/**
	 * summary
	 */
	class Access {
		private $host = "localhost";
		private $user = "devmath";
		private $passwd = "devmath";
		private $database = "keyguard";

		protected $connection;
		
	    // Start a connection
	    public function __construct() {
	        $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $user, $passwd);
	    }
	}
?>