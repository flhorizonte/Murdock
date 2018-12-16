<?php

namespace Source\ScientificArea;

class ScientificArea extends Model{

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO `areas`(`title`) VALUES (:TITLE)",[":TITLE" => $title]);

		if($stmt) {

			throw new \SuccesException("Cadastro concluido");
		} else {

			throw new \Exception("Email e/ou senha incorretos.");
		}
	}

}