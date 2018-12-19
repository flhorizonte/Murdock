<?php

namespace Source\Category;

class Category extends Model
{

	public function register()
	{

		$sql = new \App\driver\Driver();

		$stmt = $sql->query(
			"INSERT INTO `category`(`title`,`areas_id`) VALUES (:titulo,:AREA)",
			[
				":titulo" => $this->getTitle(),
				":AREA" => $this->getArea()
			]
		);

		if ($stmt) {

			throw new \Exception('Falha no cadastro');
		} else {

			throw new \Exception('Cadastro concluido');
		}
	}

	public function select()
	{

		$sql = new \App\driver\Driver();

		$data = $sql->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {

			throw new \Exception("Nenhuma categoria encontrada no banco de dados");
		} else {

			return $data;
		}
	}

	public function getDivTitle()
	{

		$this->setQuery("SELECT a.title FROM areas a WHERE a.id = :ID");
		$this->setParams([":ID" => $this->getId()]);
		$data = $this->select();

		\App\request\Request::genDivsTitle($data[0]['title']);
	}

	public function getDivData()
	{

		$this->setQuery("SELECT c.id, c.title FROM category c, areas a WHERE a.id = c.areas_id AND c.areas_id = :ID");
		$this->setParams([":ID" => $this->getId()]);
		$data = $this->select();

		\App\request\Request::genDivsExplore($data, 'page=explore&sub');

	}
}