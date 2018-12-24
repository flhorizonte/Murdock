<?php

namespace App\driver;

use \App\config\Config as Config;

abstract class Driver
{
	private $pdo;

	/**
	 * Istanciar a conexao com o banco de dados
	 * utilizando o construto da clase PDO
	 */
	public function __construct()
	{
		$this->pdo = new \PDO("
			mysql:host=".Config::gen()['database']['host'].";
			dbname=".Config::gen()['database']['dbname']."",
			Config::gen()['database']['user'],
			Config::gen()['database']['pass']
		);
	}

	/**
	 * Fazer consulta no banco de dados utilizando a instancia criada no construtor
	 *
	 *
	 * @param string $queryString
	 * @param array $params
	 * @return object
	 */
	public function query($queryString, $params = []) : object
	{

		$stmt = $this->pdo->prepare($queryString);

		self::defineBindParams($stmt, $params);

		$stmt->execute();

		return $stmt;
	}

	/**
	 * Percorrer e setar os params da variavel $value,
	 */
	private static function defineBindParams($stmt, $params = [])
	{

		foreach ($params as $key => $value) {

			$stmt->bindParam($key, $value);
		}
	}

	/**
	 * Função pronta para buscar algo no banfo
	 *
	 * @param string $query
	 * @param array $params
	 * @return array
	 */
	public function select($query, $params = null) : array
	{
		$stmt = $this->query($query, $params);

		$data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		return $data;
	}
}
