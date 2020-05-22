<?php
abstract class Product {

    const PERCENT = 10;

    abstract public function totalCost();

    abstract public function profitCalc();

}

class DigitalProduct extends Product {

    const PRICE = 100;
    private $amount;

    public function __construct($amount)
    {
        self::setAmount($amount);
    }

    public function getPrice() {
        return PRICE;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount=0)
    {
        $this->amount = $amount;
    }

    public function totalCost()
    {
        return self::PRICE * $this->amount;
    }

    public function profitCalc()
    {
        return self::PRICE * $this->amount / 100 * parent::PERCENT;
    }

}

class PhysProduct extends DigitalProduct {

    public function getPrice() {
        return parent::PRICE * 2;
    }

    public function totalCost()
    {
        return $this->getPrice() * parent::getAmount();
    }

    public function profitCalc()
    {
        return $this->getPrice() * parent::getAmount() / 100 * parent::PERCENT;
    }

}

class WeightProduct extends Product {

    private $price;
    private $wieght;

    public function __construct($price, $wieght)
    {
        self::setPrice($price);
        self::setWieght($wieght);
    }

    public function setPrice($price=0)
    {
        $this->price = $price;
    }

    public function setWieght($wieght=0)
    {
        $this->wieght = $wieght;
    }

    public function totalCost()
    {
        return $this->price * $this->wieght;
    }

    public function profitCalc()
    {
        return $this->price * $this->wieght / 100 * parent::PERCENT;
    }
}

$objDigital = new DigitalProduct(3);
echo $objDigital->profitCalc();

$objPhys = new PhysProduct(3);
echo $objPhys->profitCalc();

$objWeight = new WeightProduct(3, 300);
echo $objWeight->profitCalc();

