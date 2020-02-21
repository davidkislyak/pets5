<?php

public class database {

	private $_dbh;

	function __construct() {
		try {
			//Create a new PDO connection
			$this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}