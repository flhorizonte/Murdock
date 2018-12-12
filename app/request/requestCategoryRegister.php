<?php

namespace App\Request;

require_once("../../config.php");

try {

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST["title"];
		$areas = $_POST["area"];

		$model = new CategoryModel();
		$model->setTitle($title);
		$model->setArea($title);

		$register = new Register(new Category);
		
	} else {

		throw new Exception("Error Processing Request");
		
	}

} catch (Exception $e) {

	echo json_encode([
		"Message" => $e->getMessage()
	]);
}
