<?php


class Database {
    private static $host = 'localhost';
    private static $db_name = 'banque_db';
    private static $usernme = 'root';
    private static $password = '';

    public static function connect() {
         try {
            $conn = new PDO("mysql:host". self::$host . ",dbname".self::$db_name, self::$usernme, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        
        } catch (PDOException $e) {
            echo "erreur de connexion" .$e->getMessage();
            exit();
        }
    }



}