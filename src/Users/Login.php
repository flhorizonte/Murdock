<?php

namespace Source\Users; 

class Login extends \Model {

	public function login() {

		$sql = new App\driver\Driver();
		//replace for join as soon as possible
		$stmt = $sql->query("SELECT * FROM user WHERE email = :email AND senha = :senha",[$this->getEmail(),$this->getSenha()]); 
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(count($data[0]) > 0) {

		} else {
			throw new Exception("Email e/ou senha incorretos.");
		}

	}
}