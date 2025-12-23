<?php


require_once "src/config/Database.php";


$pdo = Database::connect();

if($pdo){
    
    echo"succes";
}