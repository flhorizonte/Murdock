<?php

namespace Source\SubCategory;

class SubCategory extends Model
{

	public function register()
	{

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
			)", [
			$this->getTitle(),
			$this->getCategory(),
			$this->getArea()
		]);

		if ($stmt) {

			throw new \SuccesException("Cadastro concluido");
		} else {

			throw new \Exception("Falha no cadastro");
		}
	}

	public function select()
	{

		$sql = new \App\driver\Driver();

		$data = $sql->select($this->getQuery(), $this->getParams());

		if (count($data) < 1) {

			throw new \Exception("Nenhuma sub categoria encontrada");
		} else {

			return $data;
		}

	}

	public function getDivTitle()
	{
        $this->setQuery("SELECT c.title FROM sub_category s, category c WHERE c.id = s.category_id AND s.category_id = :ID");
        $this->setParams([":ID" => $this->getId()]);
		$data = $this->select();

		\App\request\Request::genDivsTitle($data[0]['title']);
	}

	public function getDivData()
	{
		$this->setQuery("SELECT s.id, s.title FROM sub_category s, category c WHERE c.id = s.category_id AND s.category_id = :ID");
		$this->setParams([":ID" => $this->getId()]);
        $data = $this->select();

        \App\request\Request::genDivsExplore($data, 'page=explore&article');
	}
}