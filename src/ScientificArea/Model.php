<?php

namespace Source\ScientificArea;

use \App\filter\Filter as Filter;

abstract class Model extends Filter
{
	private $title;
	private $query;
	private $params = [];

	/**
	 * Get the value of title
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @return  self
	 */
	public function setTitle($title)
	{
		if(is_string($this->empty($title))) {
			$this->title = $this->spaces($title);
		} else {
			throw new \Exception("Campo titulo não pode estar vazio e/ou invalido");
		}
	}


	/**
	 * Get the value of params
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Set the value of params
	 *
	 * @return  self
	 */
	public function setParams($params)
	{
		if(is_array($params)) {
			$this->params = $params;
		} else {
			throw new \Exception("error, parameter must be array");
		}
	}

	/**
	 * Get the value of query
	 */
	public function getQuery()
	{
		return $this->query;
	}

	/**
	 * Set the value of query
	 *
	 * @return  self
	 */
	public function setQuery($query)
	{
		$this->query = $this->spaces($query);
	}
}