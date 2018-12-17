<?php

namespace Source\ScientificArea;

class Model {

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
		$this->title = $title;

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
		$this->params = $params;

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
		$this->query = $query;
	}
}