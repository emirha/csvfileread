<?php

class Article {

    /**
     * @return string
     */
    public function getDescription () {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @return double
     */
    public function getPrice () {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle () {
        return $this->title;
    }

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $price
     */
    function __construct($id, $title, $description, $price) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public $id;
    public $title;
    public $description;
    public $price;
}