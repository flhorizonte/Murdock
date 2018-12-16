<?php

namespace App\request;

require_once("../../../config.php");

use Source\SubCategory\SubCategory as SubCategory;

\App\request\Request::requestTreatment(function () {

    $title = $_POST["title"];
    $category= $_POST["category"];
    $area = $_POST["area"];

    $subCategory = new SubCategory();
    $subCategory->setTitle($title);
    $subCategory->setCategory($category);
    $subCategory->setArea($area);
    $subCategory->register();

});

