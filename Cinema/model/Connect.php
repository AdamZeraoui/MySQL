<?php

namespace Model;

abstract class Connect {
    const HOST = "localhotst";
    const DB = "cinemaadam";
    const USER = "root";
    const PASS = "";

    public static function seConnecter(){
        try 
        {
            return new \PDO(
                "mysql:host".self::HOST.";dbname=".self::DB.";charste=utf8", self::USER, self::PASS);
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}