<?php

namespace Source\ScientificArea;

use \App\driver\Driver as Driver;

final class ScientificArea extends Model
{
	public function __construct(Driver $driver)
	{
		$this->instance = $driver;
	}

	final public function save()
	{
		$stmt = $this->instance->query("INSERT INTO `areas`(`title`) VALUES (:TITLE)", [":TITLE" => $title]);

		if ($stmt) {
			throw new \Exception("Cadastro concluido.");
		} else {
			throw new \Exception("Falha no cadastro, tente novamente.");
		}
	}

	final public function get()
	{
		$data = $this->instance->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {
			throw new \Exception("Nenhuma Área encontrada no banco de dados");
		} else {
			return $data;
		}
	}
}