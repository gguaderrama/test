<?php

// namespace Conexion;
/*
* Mysql database class - only one connection alowed
*/
 class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "123456";
	private $_database = "test";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    

    public function getQuery($sql_query){
    	$ArrayFormat = array();
 	  	if ($result = $this->_connection->query($sql_query)) {
	         while ($obj = $result->fetch_object()) {
	         	$ArrayFormat[] = $obj;
	         }
	       return $ArrayFormat;
	    }
	    return false;
	}


	public function getQueryObject($sql_query){
 	  	if ($result = $this->_connection->query($sql_query)) {
	         while ($obj = $result->fetch_object()) {
	            return $obj;
	        }
	    }
	    return false;
	}

	public function __destruct() {
	    $this->_connection->close();
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}





}
?>