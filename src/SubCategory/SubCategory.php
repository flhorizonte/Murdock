<?php

namespace Source\SubCategory;

use \App\driver\Driver as Driver;

final class SubCategory extends Model
{

	public function __construct(Driver $driver)
	{
		$this->instance = $driver;
	}

	final public function save()
	{
		$stmt = $this->instance->query("INSERT INTO
			sub_category(
				title,
				category_id,
				category_areas_id
			) VALUES(
				:title,
				:category,
				:areas
			)", [
			$this->getTitle(),
			$this->getCategory(),
			$this->getArea()
		]);

		if ($stmt) {
			throw new \Exception("Cadastro concluido");
		} else {
			throw new \Exception("Falha no cadastro");
		}
	}

	final public function get()
	{
		$data = $this->instance->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {
			throw new \Exception("Nenhuma sub categoria encontrada");
		} else {
			return $data;
		}
	}
}