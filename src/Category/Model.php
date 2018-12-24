<?php

namespace Source\Category;

use \App\filter\Filter as Filter;
abstract class Model extends Filter
{

    private $id;
    private $title;
    private $area;

    private $query;
    private $params = [];

    /**
     * @return mixed
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        if(is_string($title)) {
            $this->title = $this->trim($title);
        } else {
			throw new \Exception("Campo titulo não pode estar vazio e/ou invalido");
		}
    }

    /**
     * @return mixed
     */
    public function getArea() : int
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     *
     * @return self
     */
    public function setArea($area)
    {
        if(is_int($area)) {
            $this->area = $area;
        } else {
			throw new \Exception("Campo Área não pode estar vazio e/ou invalido");
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

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}