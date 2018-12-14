<?php

namespace App\Request\Register\Category;

require_once("../../../../config.php");

use Source\Category\Category as Category;
use App\driver\Driver as Driver;
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA CADASTRAR ARTIGOS
 */
try {
	/**
	 * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
	 */
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST["title"];
		$areas = $_POST["area"];

		$category = new Category();
		$category->setTitle($title);
		$category->setArea($areas);

		if($category->register()) {
			//true
			throw new \Exception("Cadastro concluido");
		} else {
			//false
			throw new \Exception("Falha no cadastro");
		}
	} else {
		throw new \Exception("TEM QUE MANDAR POST MANO");
	}

} catch (\Exception $e) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode(array("Message" => $e->getMessage()));
} finally {

}
