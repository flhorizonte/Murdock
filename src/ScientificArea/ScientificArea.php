<?php

namespace Source\ScientificArea;

class ScientificArea extends Model
{

	public function register()
	{

		$sql = new \App\driver\Driver();

		$stmt = $sql->query("INSERT INTO `areas`(`title`) VALUES (:TITLE)", [":TITLE" => $title]);

		if ($stmt) {

			throw new \Exception("Cadastro concluido.");
		} else {

			throw new \Exception("Falha no cadastro, tente novamente.");
		}
	}


	public function select()
	{

		$sql = new \App\driver\Driver();

		$data = $sql->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {

			throw new \Exception("Nenhuma area de conhecimento encontrada no banco de dados");
		} else {

			return $data;
		}
	}

	public function getDivTitleAndData()
	{
		$this->setQuery("SELECT area.title, area.id  FROM areas area");
		$data = $this->select();

		\App\request\Request::genDivsTitle($data[0]['title'], $data, 'page=explore&category');
	}

}