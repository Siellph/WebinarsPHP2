<?php
class goods {
    protected $title;
    protected $price;
    protected $count;

    function __construct($title, $price, $count)
    {
        $this->title = $title;
        $this->price = $price;
        $this->count = $count;
    }

    function product() {
        echo $this->title. "<br> Цена ".$this->price."<br> Кол-во: ".$this->count;
    }
}

class display extends goods {
    private $inch;
    private $form;

    public function __construct($title, $price, $count, $inch, $form)
    {
        parent::__construct($title, $price, $count);
        $this->inch = $inch;
        $this->form = $form;
    }

    function productDisplay() {
        parent::product();
        echo "<br> Размер в дюймах: ".$this->inch."<br> Формактор: ".$this->form."<hr>";
    }
}

class phone extends goods {
    private $brand;
    private $os;

    public function __construct($title, $price, $count, $brand, $os)
    {
        parent::__construct($title, $price, $count);
        $this->brand = $brand;
        $this->os = $os;
    }

    function productPhone() {
        parent::product();
        echo "<br> Брэнд: ".$this->brand."<br> Операционная система: ".$this->os."<hr>";
    }
}
//$obj = new goods("test", 500, 4);
//$obj->product();

$objD = new display("Display", 300, 5, 28, "LCD");
$objD->productDisplay();

$objP = new phone("Phone", 600, 7, "Apple", "iOS");
$objP->productPhone();

//next unit (5)

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo();
//$a2->foo();
//$a1->foo();
//$a2->foo();
//
////1 2 3 4, потому что static сохраняет значение переменной класса.
//
////next unit (6)
//
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo();
//$b1->foo();
//$a1->foo();
//$b1->foo();
//
////1 1 2 2
////При выполнении функции первый раз a1 = 1, потому что a1 объект класса А.
////Переменная х, класса А имеет статическое свойство.
////К 0 прибавляем 1 и получаем 1.
////У класса В все еще 0, поэтому 0+1 = 1.
////Далее снова вызываем функцию у объкта а1.
////т.к. х уже равен 1, то получаем 2
////по той жепричине получается у объекта b1
//
////next unit (7)
//
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
////$a1->foo();
////$b1->foo();
////$a1->foo();
//////$b1->foo();
//
////1 1 2 2
////Схожа с пре
