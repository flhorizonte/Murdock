<?php

namespace App\request;

require_once("../../../config.php");

use Source\Article\Article as Article;

\App\request\Request::requestTreatment(function () {

	$title = $_POST["title"];	
	$content = $_POST["content"];
	$userid = $_POST["user"];
	$subCategory = $_POST["subCategory"];
	$category = $_POST["category"];
	$area = $_POST["area"];

	$article = new Article();
	$article->setTitle($title);
	$article->setContent($content);
	$article->setUserId($userid);
	$article->setSubCategory($subCategory);
	$article->setCategory($category);
	$article->setArea($area);
	$article->register();

});
