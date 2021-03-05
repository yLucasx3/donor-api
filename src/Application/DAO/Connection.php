<?php

namespace App\Application\DAO;
use \PDO;

class Connection {

    protected static $db;

    private function __construct() {

        $db_host = "localhost";
        $db_nome = "donor";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";

        try {
            
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome;charset=utf8", $db_usuario, $db_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
    
    public static function getConnection(){
        
        if (!self::$db){

            new Connection();
        }
        return self::$db;
    }
}