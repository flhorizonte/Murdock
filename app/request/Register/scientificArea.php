<?php

namespace App\request;

require_once("../../../config.php");

use Source\ScientificArea\ScientificArea as ScientificArea;

\App\request\Request::requestTreatment(function () {

	$title = $_POST["title"];

	$area = new ScientificArea();
	$area->setTitle($title);
	$area->register();

});