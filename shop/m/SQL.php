<?php

include_once 'config/db.php';

class SQL {

    private static $instance;
    private $db;

    public static function Instance() {

        if (self::$instance == null) {
            self::$instance = new SQL();
        }

        return self::$instance;
    }

    public function __construct() {

        setlocale(LC_ALL, 'ru_RU.UTF8');
        $this->db = new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD);
        $this->db->exec('SET NAMES UTF8');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function Select($table, $where_key = false, $where_value = false, $fetchAll = false) {

        if ($where_key AND $where_value AND !$join) {
            $query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = '" . $where_value . "'";
        } else {
            $query = "SELECT * FROM " . $table;
        }

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        if ($fetchAll) {
            return $q->fetchAll();
        } else if ($where_key AND $where_value) {
            return $q->fetch();
        } else {
            return $q->fetchAll();
        }
    }

    public function SelectJoin($table1, $table2, $t1key, $t2key, $par1 = false, $par2 = false) {

        $query = "SELECT * FROM " . $table1 . " AS T1 INNER JOIN " . $table2 . " AS T2 ON T1. " . $t1key . " = T2. " . $t2key . " WHERE T1. " . $par1 . " = " . $par2;

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        return $q->fetchAll();
    }
    //"SELECT order_id, product_id, count, title, price FROM basket AS T1 INNER JOIN products AS T2 ON T1.product_id = T2.id WHERE T1.user_id = " . $_SESSION["user_id"]

    public function Insert($table, $object) {

        $columns = array();

        foreach ($object as $key => $value) {

            $columns[] = $key;
            $masks[] = ":$key";

            if ($value === null) {
                $object[$key] = 'NULL';
            }
        }

        $columns_s = implode(',', $columns);
        $masks_s = implode(',', $masks);

        $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

        $q = $this->db->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $this->db->lastInsertId();
    }

    public function Update($table, $object, $where) {

        $sets = array();

        foreach ($object as $key => $value) {

            $sets[] = "$key=:$key";

            if ($value === NULL) {
                $object[$key]='NULL';
            }
        }

        $sets_s = implode(',',$sets);
        $query = "UPDATE $table SET $sets_s WHERE $where";

        $q = $this->db->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }


    public function Delete($table, $where) {

        $query = "DELETE FROM $table WHERE $where";
        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }

    public function Remove($table, $where) {

        $query = "DELETE FROM $table WHERE order_id = $where";
        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }

    public function Password ($name, $password) {

        return strrev(md5($name)) . md5($password);
    }
}