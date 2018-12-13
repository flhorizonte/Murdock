<?php

namespace App\Request\Register\Article;

require_once("../../../../config.php");
/**
 * ARQUIVO QUE IRÁ RECEBER AS REQUSIÇÕES EM JAVASCRIPT PARA CADASTRAR ARTIGOS
 */
try {

	/**
	 * Tu tem quer mandar requisições POST em, n manda GET que não vai funfar.
	 */
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST["title"];
		$content = $_POST["content"];
		$userid = $_POST["user"];
		$subCategory = $_POST["subCategory"];
		$category = $_POST["category"];
		$area = $_POST["area"];

		$model = new ArticleModel();
		$model->setTitle($title);
		$model->setContent($content);
		$model->setUserId($userid);
		$model->setSubCategory($subCategory);
		$model->setCategory($category);
		$model->setArea($area);

		$register = new Register(new Article());

	} else {

		throw new \Exception("TEM QUE MANDAR POST MANO");

	}

} catch (\Exception $error) {

	//SAIDA PARA O JAVASCRIPT EM JSON :)
	echo json_encode([
		"ERROR" => $error->getMessage()
	]);
}
