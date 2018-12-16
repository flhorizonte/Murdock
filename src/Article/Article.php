<?php

namespace Source\Article;

class Article extends Model {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO article(
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
		 ]);

    	if($stmt) {

			throw new \SuccesException("Cadastro concluído");
		} else {

			throw new \Exception("Falha no cadastro");
		}
 	}
}