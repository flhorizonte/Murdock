<?php

namespace Source\Category;

class Category extends \Model implements Source\Crud\Register\Register {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO category (title,areas_id) VALUES (:title,:area)",[":title" => $this->getModel(), ":area" => $this->getArea()]);

		if(count($stmt) > 0) {

			throw new Exception("Cadastro concluído");
		} else {

			throw new Exception("Falha no cadastro");
		}
	}
}