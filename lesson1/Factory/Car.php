<?php

class Car {
    var $title;
    var $price;

    function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }
}
?>