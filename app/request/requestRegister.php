<?php

namespace App\Request;

require_once("../../config.php");


use Source\Users\Register() as Register;
use Source\Users\Model() as Model;

try {

	//add var filters to improve security
	$idPermission = $_POST["idPermission"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$pass = $_POST["password"];

	$model = new Model();
	$model->setIdPermission($idPermission);
	$model->setCity($city);
	$model->setState($state);
	$model->setCountry($country);
	$model->setName($name);
	$model->setEmail($email);
	$model->setPass($pass);

	$register = new Register();
	$register->register();

} catch (Exception $error) {

	echo json_encode([
		"Message" => $error->getMessage()
	]);
}