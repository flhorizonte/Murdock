<?php

namespace Source\ScientificArea;

class ScientificArea extends \Model implements Source\Crud\Register\Register {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO areas(title) VALUES(:title)",[":title" => $this->getTitle()]);

		if(count($stmt) > 0) {

			throw new Exception("Cadastro concluído");

		} else {

			throw new Exception("Falha no cadastro");
		}
	}
}