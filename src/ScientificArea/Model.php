<?php

namespace Source\ScientificArea;

class Model {

    private $title;

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

}