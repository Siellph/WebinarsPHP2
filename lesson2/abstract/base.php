<?php
abstract class Base{
    private $title;

    public function getTitle()
    {
        return $this->title;
    }

    function header(){
        echo "Шапка сайта";
    }
    function footer(){
        echo "Подвал сайта";
    }
    abstract function content();

    function render(){
        $this->header();
        $this->content();
        $this->footer();
    }
}