<?php

include "Factory.php";

$count = rand(5,20);
$factory = new Factory;

$carName = ["Audi", "Skoda", "VW"];
$cars = [];

for($i=0;$i<$count;$i++) {
    $n = $i +1;
    $cars[$i] = $factory->createCar($carName[rand(0,count($carName)-1)]);
    echo $n.") ".$cars[$i]->getTitle()." стоит ".$cars[$i]->getPrice()."<br>";
    $sum += $cars[$i]->getPrice();
}
echo "Сумма всех авто составляет $sum";