<?php

namespace App\Request;

require_once("../../config.php");

try {

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST["title"];

		$model = new ScientificAreaModel();
		$model->setTitle($title);

		$register = new Register(new ScientificArea())

	} else {

		throw new Exception("Error Processing Request");
		
	}

} catch (Exception $e) {

	echo json_encode([
		"Message" => $e->getMessage()
	]);
}