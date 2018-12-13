<?php

namespace Source\Article;

class Model {

	private $title;
	private $content;
	private $userid;
	private $subCategory;
	private $category;
	private $area;

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getUserid() {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     *
     * @return self
     */
    public function setUserid($userid) {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getSubCategory() {
        return $this->subCategory;
    }

    /**
     * @param mixed $subCategory
     *
     * @return self
     */
    public function setSubCategory($subCategory) {
        $this->subCategory = $subCategory;
    }

    /**
     * @param mixed $subCategory
     *
     * @return self
     */
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
        $this->category = $category;

        return $this;
    }

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
        $this->area = $area;

        return $this;
    }
}