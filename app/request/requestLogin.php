<?php

namespace App\Request;

require_once("../../config.php");

use Source\Users\Model() as Model;
use Source\Users\Login() as Login;

try {

	//add var filters to improve security
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$model = new Model();
	$model->setEmail($email);
	$model->setSenha($senha);

	$login = new Login();
	$login->login();

} catch (Exception $error) {

	echo json_encode([
		"Message" => $error->getMessage(),
	]);
}	

