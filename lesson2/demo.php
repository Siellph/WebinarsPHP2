<?php
class Demo {
    function test(Main $obj){
        $obj->info();
    }
}
class Main{
    private $name = "Vlad";

    public function getName(){
        return $this->name;
    }

    public function info(){
        echo $this->name." - программист";
    }
}

$obj1 = new Demo;
$obj2 = new Main;

$obj1->test($obj2);
//1) 2,
//2) 1,
//3) 3,
//4) 1,
//5) 1,
//6) 3,
//7) 1,
//8) 4.