<?php

namespace Source\ScientificArea;

class ScientificArea extends Model{

	public function register($banco) {

		$stmt = $banco->query($this->getQuery(),$this->getParams());

		return $stmt;
	}

}