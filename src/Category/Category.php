<?php

namespace Source\Category;

class Category extends Model {

	private $query;

	public function __construct() {

		$this->query = new \App\driver\Driver();
	}

	public function register() {

		$stmt = $this->query->query("INSERT INTO `category`(`title`,`areas_id`) VALUES (:titulo, :AREA)",[":titulo" => $this->getTitle(),":AREA" => $this->getArea()]);

		return $stmt;
	}
}