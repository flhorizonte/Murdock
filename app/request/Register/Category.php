<?php

namespace App\request;

require_once("../../../config.php");

use Source\Category\Category as Category;

\App\request\Request::requestTreatment(function () {

	$title = $_POST["title"];
	$areas = $_POST["area"];

	$category = new Category();
	$category->setTitle($title);
	$category->setArea($areas);
	$category->register();

});
