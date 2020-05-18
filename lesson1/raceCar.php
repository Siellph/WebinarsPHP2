<?php

include "Car.class.php";

class raceCar extends Car {
    private $speed;

    function __construct($title, $price, $speed)
    {
        parent::__construct($title, $price);
        $this->speed = $speed;
    }
    function drive() {
        // $this->test();
        parent::drive();
        echo $this->title." может разогнаться до скорости ".$this->speed." км/ч";
    }
}

$obj = new raceCar("Ferrari", 5000, 500);
$obj->drive();