<?php

class DataBase{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'tienda_freelancer');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}


