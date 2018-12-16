<?php

namespace Source\Category;

class Category extends Model {

	public function register() {

		$sql = new \App\driver\Driver();

		$stmt = $sql->query("INSERT INTO `category`(`title`,`areas_id`) VALUES (:titulo,:AREA)",
		[
			":titulo" => $this->getTitle(),
			":AREA" => $this->getArea()
		]);

		if($stmt) {

			throw new \SuccesException('Falha no cadastro');
		} else {

			throw new \Exception('Cadastro concluido');
		}
	}
}