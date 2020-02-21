<?php
require_once ("config-pet.php");

class database {

	private $_dbh;

	function __construct() {
		try {
			//Create a new PDO connection
			$this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function getData() {
		//1. Define query
		$sql = "SELECT * FROM pets
				ORDER BY pet_id";
		//2. Prepare the statement
		$statement = $this->_dbh->prepare($sql);

		//3. Bind parameters

		//4. Execute statement
		$statement->execute();

		//5. Get result
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

}