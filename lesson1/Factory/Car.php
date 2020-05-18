<?php

class Car {
    private $title;
    private $price;

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }
}
?>