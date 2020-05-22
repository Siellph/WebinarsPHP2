<?php
class magic{
    private $test;

    public function __autoload($className){
        include $className.".php";
    }

    public function __get($name){
        die ("Вы обращаетесь к несуществующей переменной");
    }

    public function __set($name, $value){
        $this->test = $value;
    }

    public function __call($name, $arguments){
        $this->test($arguments);
    }

    function test($x=0){
        echo $this->test;
    }
}

$obj = new magic();
echo $obj->x;
$obj->a = 10;
$obj->unExist();

$obj2 = new car();