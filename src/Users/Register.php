<?php

namespace Source\Users;

class Register extends \Model {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO user (name,email,pass,permission_id,city_id,city_state_id,city_state_country_id) VALUES ({$this->getName()},{$this->getEmail()},{$this->getPass()},{$this->getIdpermission()},{$this->getCity()},{$this->getState()},{$this->getCountry()}	
		)");

		if(count($stmt) > 0) {

			throw new Exception("Cadastro concluido");
		} else {

			throw new Exception("Email e/ou senha incorretos.");
		}
	}
}