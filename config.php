<?php

session_start();

require_once("vendor/autoload.php");

//require_once('app/request/request.php');


//sessao array superglobal
$_SESSION['login'] = \App\config\Config::gen()['sessionUsers'];







