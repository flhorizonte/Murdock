<?php

namespace Source\Category;

use \App\driver\Driver as Driver;
final class Category extends Model
{
	//depedency injection :D
	public function __construct(Driver $driver)
	{
		$this->instance = $driver;
	}

	public function save()
	{
		$stmt = $this->instance->query("INSERT INTO `category`(
			`title`,
			`areas_id`
			) VALUES (
				:titulo,
				:AREA)", [
			":titulo" => $this->getTitle(),
			":AREA" => $this->getArea()
		]);

		if ($stmt) {
			throw new \Exception('Falha no cadastro');
		} else {
			throw new \Exception('Cadastro concluido');
		}
	}

	public function get()
	{
		$data = $this->instance->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {
			throw new \Exception("Nenhuma categoria encontrada no banco de dados");
		} else {
			return $data;
		}
	}
}