<?php

namespace App\Request\Register\ScientificArea;

require_once("../../../../config.php");
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA CADASTRAR ARTIGOS
 */
try {

	/**
	 * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
	 */
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST["title"];

		$model = new ScientificAreaModel();

		$model->setTitle($title);

		$register = new Register(new ScientificArea());

	} else {

		throw new \Exception("TEM QUE MANDAR POST MANO");

	}

} catch (\Exception $e) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode([
		"ERROR" => $e->getMessage()
	]);
}