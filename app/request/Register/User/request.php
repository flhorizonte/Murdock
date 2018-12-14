<?php

namespace App\Request\User;

require_once("../../../../config.php");
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA CADASTRAR ARTIGOS
 */
try {
	/**
	 * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
	 */
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

		$register = new Register(new User());

	} else {

		throw new \Exception("TEM QUE MANDAR POST MANO");
	}


} catch (\Exception $error) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode([
		"ERROR" => $error->getMessage()
	]);
}