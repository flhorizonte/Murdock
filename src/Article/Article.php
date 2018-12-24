<?php

namespace Source\Article;

use \App\driver\Driver as Driver;

final class Article extends Model
{
	public function __construct(Driver $driver)
	{
		$this->instance = $driver;
	}

	final public function save()
	{
		$stmt = $this->getInstance()->query("INSERT INTO article(
			title,
			content,
			user_id,
			sub_category_id,
			sub_category_category_id,
			sub_category_category_areas_id
			) VALUES (
				:TITLE,
				:CONTENT,
				:USER,
				:SUB,
				:CATEGORY,
				:AREAS
				)", [
			":TITLE" => $this->getTitle(),
			":CONTENT" => $this->getContent(),
			":USER" => $this->getUser(),
			":SUB" => $this->getSubCategory(),
			":CATEGORY" => $this->getCategory(),
			":AREAS" => $this->getArea()
		]);

		if ($stmt) {
			throw new \Exception("Cadastro concluído");
		} else {
			throw new \Exception("Falha no cadastro");
		}
	}

	final public function get()
	{
		$stmt = $this->instance->select($this->getQuery(), $this->getParams());

		if (count($stmt) < 1) {
			throw new \Exception("Nenhum artigo encontrado");
		} else {
			return $stmt;
		}
	}
}