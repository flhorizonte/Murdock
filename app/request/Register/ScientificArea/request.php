<?php

namespace App\Request\Register\ScientificArea;

require_once('../../../../config.php');

use Source\ScientificArea\ScientificArea as ScientificArea;
use Source\ScientificArea\Model as Model;
use App\driver\Driver as Driver;
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA CADASTRAR ARTIGOS
 */
try {
	/**
	 * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
	 */
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//add var filters to improve sec
		$title = $_POST["title"];

		$objeto = new ScientificArea();
		$objeto->setTitle($title);
		$objeto->setQuery("INSERT INTO `areas`(`title`) VALUES (:TITLE)");
		$objeto->setParams([":TITLE" => $title]);


		if($objeto->register(new Driver())) {

			throw new \Exception("Cadastro concluido");

		} else {

			throw new \Exception("Falha no cadastro");
		}
	} else {

		throw new \Exception("TEM QUE MANDAR POST MANO");
	}

} catch (\Exception $e) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode([$e->getMessage()]);
} finally {

}