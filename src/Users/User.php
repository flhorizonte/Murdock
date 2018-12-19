<?php

namespace Source\Users;

class User extends Model {

	public function register() {

		$sql = new \App\driver\Driver();

		$stmt = $sql->query("INSERT INTO user (
			name,
			email,
			pass,
			permission_id,
			city_id,
			city_state_id,
			city_state_country_id
			) VALUES (
				:name,
				:email,
				:pass,
				:idperm,
				:city,
				:state,
				:country
			)",
			[
				":name" => $this->getName(),
				":email" => $this->getEmail(),
				":pass" => $this->getPass(),
				":idperm" => $this->getIdpermission(),
				":city" => $this->getCity(),
				":state" => $this->getState(),
				":country" => $this->getCountry()
			]
		);

		if($stmt) {

			throw new \SuccesException("Cadastro concluido");
		} else {

			throw new \Exception("Email e/ou senha incorretos.");
		}
	}

	public function login() {

		$sql = new \App\driver\Driver();

		//replace for join as soon as possible
		$stmt = $this->select();
		//"SELECT * FROM user WHERE email = :email AND senha = :senha",[":email" => $this->getEmail(),":senha" => $this->getSenha()]

		if(count($stmt[0]) > 0) {

	   		self::efetuarLogin($data[0]);

		} else {

			throw new \Exception("Email e/ou senha incorretos.");
		}
    }

    private static function efetuarLogin($data = []){

        foreach($datas as $key => $value) {

			if(!isset($_SESSION["user"][$key])){

				$_SESSION["user"][$key] = $value;
			} else {

				throw new \Exception("Você ja está logado");
				break;
			}
        }
    }

    public function select() {

    	$sql = new \App\driver\Driver();

    	//implement a better query
    	$stmt = $sql->select($this->getQuery(), $this->getParams());

    	if(count($stmt) > 0) {

   			return $data;

    	} else {

    		throw new \Exception("Nenhum cliente encontrado");
    	}
    }
    
}
