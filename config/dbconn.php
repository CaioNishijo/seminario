<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();

    $host = $_ENV["DB_HOST"];
    $db = $_ENV["DB_NAME"];
    $usuario = $_ENV["DB_USER"];
    $port = $_ENV["DB_PORT"];
    $senha = $_ENV["DB_PASSWD"];

    try{
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $usuario, $senha);
        if($pdo){
            echo 'Conectado ao banco de dados';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>