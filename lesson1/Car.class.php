<?php
include "Outer.php";
// Class Article {
//     public $id;
//     public $title;
//     public $content;

//     function __construct($id, $title, $content)
//     {
//         $this->id = $id;
//         $this->title = $title;
//         $this->content = $content;
//     }

//     function view() {
//         echo "<h1>$this->title</h1><p>$this->content</p>";
//     }
// }

// // $a = new Article();
// // $a->id = 1;
// // $a->title = 'Новая статья';
// // $a->content = 'Какой-то текст!';
// // $a->view();

// $a = new Article(1, "Новая статья", "Какой-то текст!");
// $a->view();

class Car {
    var $title;
    var $price;

    function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
        // $this->drive();
        // $this->setter($title, $price);
    }

    // function setter($title, $price){
    //     $this->title = $title;
    //     $this->price = $price;
    // }

    function drive() {
        $obj = new Outer;
        $obj->test();
        echo "Автомобиль ".$this->title." стоит ".$this->price."<br>"; 
    }
}

$car = new Car("Audi", 1000);
// $car->setter("Audi", 1000);
// $car->title = "Audi";
// $car->price = 1000;
// $car->drive();

$car2 = new Car("BMW", 1100);
$car3 = new Car("VW", 900);
$mas = [$car, $car2, $car3];

foreach ($mas as $value) {
    $value->drive();
}
// $car->setter("BMW", 1100);
// $car2->drive();


?>