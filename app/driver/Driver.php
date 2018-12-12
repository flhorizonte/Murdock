<?php

namespace App\Driver;

class Driver {

	public $pdo;

	public function __construct() {

		$this->pdo = new \PDO("mysql:host=localhost;dbname=murdock","root","151280");
	}

	public function query($queryString, $params = []) {

		$stmt = $this->pdo->prepare($queryString);

		self::defineBindParams($stmt, $params);	

		$stmt->execute();

		return $stmt;
	} 

	private static function defineBindParams($stmt, $params = []) {

		foreach ($params as $key => $value) {
			
			$stmt->bindParams($key, $value);
		}
	}
}