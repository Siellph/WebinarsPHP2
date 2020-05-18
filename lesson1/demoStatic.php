<?php
//Статические свойства привязаны к имени класса, а не статические - к объекту класса
//Использование в статических свойствах this запрещено!
class demoStatic {
    static $x;

    static function f() {
        echo demoStatic::$x;
    }

    static function f2() {
        $obj = new demoStatic();
        $obj->usually();
    }

    function usually(){
        demoStatic::f();
    }
}

demoStatic::$x = 10;
demoStatic::f();

$obj = new demoStatic();
$obj->usually();
?>