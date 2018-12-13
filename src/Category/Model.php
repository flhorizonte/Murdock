<?php

namespace Source\Articles\Category;

class Model {

	private $title;
	private $area;

    /**
     * @return mixed
     */
    public function getTitle(){

        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title){

        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getArea(){

        return $this->area;
    }

    /**
     * @param mixed $area
     *
     * @return self
     */
    public function setArea($area){

        $this->area = $area;
    }
}