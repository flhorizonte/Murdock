<?php

namespace App\request\Register;

require_once("../../../config.php");

use Source\Users\User as User;

\App\request\Request::requestTreatment(function () {

	//recebimento dos dados
	$idPermission = $_POST["idPermission"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$pass = $_POST["password"];

	$user = new User();
	$user->setIdPermission($idPermission);
	$user->setCity($city);
	$user->setState($state);
	$user->setCountry($country);
	$user->setName($name);
	$user->setEmail($email);
	$user->setPass($pass);
	$user->register();

});