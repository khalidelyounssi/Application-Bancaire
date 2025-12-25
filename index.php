<?php


require_once "src/config/Database.php";


$pdo1 = Database::connect();
$pdo2 = Database::connect();

// if($pdo){
    
//     echo"succes";
// }

var_dump($pdo1 === $pdo2);