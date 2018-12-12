<?php

namespace App\Request;

require_once("../../config.php");

try {

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//add var filters to improve security
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		$model = new Model();
		$model->setEmail($email);
		$model->setSenha($senha);

		$login = new Login();
		$login->login();

	} else {

		throw new \Exception("No post vars requested");
		
	}
	
} catch (Exception $error) {

	echo json_encode([
		"Message" => $error->getMessage(),
	]);
}	

