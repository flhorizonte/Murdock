<?php

namespace Source\ScientificArea;

class Model {

	private $title;

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
    public function setTitle($area) {

        $this->area = $area;
    }
}