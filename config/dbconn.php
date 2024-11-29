<?php
    $host = 'localhost';
    $db = 'projeto_consultas';
    $usuario = 'root';
    $port = 3306;
    $senha = '';

    try{
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $usuario, $senha);
        if($pdo){
            echo 'Conectado ao banco de dados';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>