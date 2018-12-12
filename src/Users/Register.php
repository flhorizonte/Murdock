<?php

namespace Source\Users;

class Register extends \UserModel {

	public function register() {

		$sql = new App\driver\Driver();

		$stmt = $sql->query("INSERT INTO user (name,email,pass,permission_id,city_id,city_state_id,city_state_country_id) VALUES (:name,:email,:pass,:idperm,:city,:state,:country)",
			[":name" => $this->getName(),":email" => $this->getEmail(),":pass" => $this->getPass(),":idperm" => $this->getIdpermission(),":city" => $this->getCity(),":state" => $this->getState(),":country" => $this->getCountry()]);

		if(count($stmt) > 0) {

			throw new Exception("Cadastro concluido");
		} else {

			throw new Exception("Email e/ou senha incorretos.");
		}
	}
}