<?php

namespace App\Request;

require_once("../../config.php");

try {

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//add var filters to improve security
		$idPermission = $_POST["idPermission"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$country = $_POST["country"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$pass = $_POST["password"];

		$model = new UserModel();
		$model->setIdPermission($idPermission);
		$model->setCity($city);
		$model->setState($state);
		$model->setCountry($country);
		$model->setName($name);
		$model->setEmail($email);
		$model->setPass($pass);

		$register = new UserRegister();
		$register->register();

	} else {

		throw new \Exception("No post vars requested");
	}
	

} catch (\Exception $error) {

	echo json_encode([
		"Message" => $error->getMessage()
	]);
}