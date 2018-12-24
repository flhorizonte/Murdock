<?php

namespace Source\Client;

use \App\driver\Driver as Driver;
use \App\config\Config as Config;

final class Client extends Model
{
	public function __construct(Driver $driver)
	{
		$this->instance = $driver;
	}

	final public function save()
	{
		$stmt = $this->instance->query("INSERT INTO user (
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
				)", [
			":name" => $this->getName(),
			":email" => $this->getEmail(),
			":pass" => $this->getPass(),
			":idperm" => $this->getIdpermission(),
			":city" => $this->getCity(),
			":state" => $this->getState(),
			":country" => $this->getCountry()
		]);

		if ($stmt) {
			throw new \Exception("Cadastro concluido");
		} else {
			throw new \Exception("Email e/ou senha incorretos.");
		}
	}

	final public function login()
	{
		//replace for join as soon as possible
		//inner join
		$stmt = $this->select("SELECT id FROM user WHERE email = :email AND senha = :senha", array(":email" => $this->getEmail(), ":senha" => $this->getPass()));
		//"SELECT * FROM user WHERE email = :email AND senha = :senha",[":email" => $this->getEmail(),":senha" => $this->getSenha()]

		if (count($stmt) > 0) {
			if(isset($_SESSION)) {
				self::push($data);
			}
		} else {
			throw new \Exception("Email e/ou senha incorretos.");
		}
	}

	private static function pushIdToSession($data = [])
	{

		array_push($_SESSION["login"]["auth"]["client"]["id"], $data['id']);

		//sessao do usuario
		//array_push($_SESSION["auth"]["user"]["client"]["id"], $this->getId());

	}

	private static function logout()
	{
		unset($_SESSION["auth"]["user"]["client"]["id"][$this->getId()]);
	}

	final public function get()
	{
    	//implement a better query
		$stmt = $this->instance->select($this->getQuery(), $this->getParams());

		if (count($stmt) > 0) {
			return $stmt;
		} else {
			throw new \Exception("Nenhum cliente encontrado");
		}
	}
}
