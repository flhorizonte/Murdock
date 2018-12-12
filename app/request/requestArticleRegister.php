<?php

namespace App\Request;

require_once("../../config.php");

try {

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

	}

} catch (Exception $error) {

	echo json_encode([
		"Message" => $error->getMessage()
	]);
}
