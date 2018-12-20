<?php

namespace Source\Article;

class Article extends Model
{

	public function register()
	{

		$sql = new App\driver\Driver();

		$stmt = $sql->query(
			"INSERT INTO article(
			title,
		 	content,
		 	user_id,
		 	sub_category_id,
		 	sub_category_category_id,
		 	sub_category_category_areas_id
		 )
		 VALUES (
			 :TITLE,
			  :CONTENT,
			   :USER,
			    :SUB,
				 :CATEGORY,
				  :AREAS
				)",
			[
				":TITLE" => $this->getTitle(),
				":CONTENT" => $this->getContent(),
				":USER" => $this->getUser(),
				":SUB" => $this->getSubCategory(),
				":CATEGORY" => $this->getCategory(),
				":AREAS" => $this->getArea()
			]
		);

		if ($stmt) {

			throw new \SuccesException("Cadastro concluído");
		} else {

			throw new \Exception("Falha no cadastro");
		}
	}

	public function select()
	{

		$sql = new \App\driver\Driver();

		$stmt = $sql->select($this->getQuery(), $this->getParams());

		if (count($stmt) < 1) {

			throw new \Exception("Nenhum artigo encontrado");
		} else {

			return $stmt;
		}
	}

	public function getDivTitle()
	{
		$this->setQuery("SELECT s.title FROM sub_category s WHERE s.id = :ID");
        $this->setParams([":ID" => $this->getId()]);
		$data = $this->select();

		\App\request\Request::genDivsTitle($data[0]['title'], $this->getDivData(), 'page=explore&article');
	}

	public function getDivData()
	{
		$this->setQuery("SELECT a.id, a.title, a.content, a.user_id, a.sub_category_id FROM article a, sub_category s WHERE s.id = a.sub_category_id AND a.sub_category_id = :ID");
		$this->setParams([":ID" => $this->getId()]);
        $data = $this->select();

		return $data;
	}
}