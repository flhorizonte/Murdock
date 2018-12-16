<?php

namespace App\request;

require_once("../../../config.php");

use \Source\User\User as Login;

\App\request\request::requestTreatment(function () {

	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$login = new Login();
	$login->setEmail($email);
	$login->setSenha($senha);
	$login->login();

});


