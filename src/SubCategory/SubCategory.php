<?php

namespace Source\SubCategory;

class SubCategory extends Model {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO
			sub_category(
				title,
				category_id,
				category_areas_id
			) VALUES(
				:title,
				:category,
				:areas
			)",[
				$this->getTitle(),
				$this->getCategory(),
				$this->getArea()
			]
		);

		if($stmt) {

			throw new \SuccesException("Cadastro concluido");
		} else {

			throw new \Exception("Falha no cadastro");
		}
	}

	public function select() {

		$sql = new \App\driver\Driver();

		$data = $sql->select($this->getQuery(), $this->getParams());

		if(count($data) < 1) {

			throw new \Exception("Nenhuma sub categoria encontrada");
		} else {

			return $data;
		}

	}
}