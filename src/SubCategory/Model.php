<?php

namespace Source\SubCategory;

use \App\filter\Filter as Filter;

abstract class Model extends Filter {

	private $area;
	private $title;
    private $category;
    private $id;

    private $query;
    private $params = [];

    /**
     * @return mixed
     */
    public function getArea()
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
        if(in_int($this->empty($area))){
            $this->area = $area;
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
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
        if($this->empty($title)) {
            $this->title = $title;
        } else {
            throw new \Exception("Titulo não pode estar vazio e/ou invalido");
        }
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     *
     * @return self
     */
    public function setCategory($category)
    {
        if(in_int($this->empty($category))) {
            $this->category = $category;
        } else {
            throw new \Exception("Categoria não pode estar vazia e/ou inválida");
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
        if(is_array($params)){
            $this->params = $params;
        } else {
            throw new \Exception("params must be array");
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
        if(is_string($this->empty($query))) {
            $this->query = $query;
        } else {
            throw new \Exception("Consulta não pode estar vazio e/ou inválida");
        }
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
        if(is_int($this->empty($id))) {
            $this->id = $id;
        } else {
            throw new \Exception("Id não pode estar vazio e/ou invalido");
        }
    }
}