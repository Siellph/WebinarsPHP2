<?php
class DB{
    static $db;
    static $connect;

    private function __construct()
    {
    }

    public static function getObject()
    {
        if (DB::$db==NULL){
            DB::$db = new DB;
        }
        return DB::$db;
    }

    function select(){

    }
    function delete(){

    }
    function insert(){

    }
    function update(){

    }
}

class test{
    private static $db;

    function __construct()
    {
        self::$db = DB::getObject();
    }

    function getGoods(){
        $goods = self::$db -> select();
    }
}