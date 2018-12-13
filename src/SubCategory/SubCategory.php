<?php

namespace Source\SubCategory;

class SubCategory extends \Model implements Source\Crud\Register\Register {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO sub_category(title,category_id,category_areas_id) VALUES(:title, :category, :areas)",[$this->getTitle(),$this->getCategory(),$this->getArea()]);

		if(count($stmt) > 0) {

			throw new Exception("Cadastro concluido");

		} else {

			throw new Exception("Falha no cadastro");
		}
	}
}