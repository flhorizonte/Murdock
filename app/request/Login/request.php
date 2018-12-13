<?php

namespace App\Request\Login;

require_once("../../../config.php");
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA EFETUAR O LOGIN DO USUARIO
 */
try {

	/**
	 * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
	 */
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

		throw new \Exception("TEM QUE MANDAR POST MANO");

	}

} catch (\Exception $error) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode([
		"ERROR" => $error->getMessage(),
	]);
}

