<?php
    declare(strict_types = 1);
    require_once '../config/dbconn.php';

    function retornarEspecialidades(){
        global $pdo;

        $statement = $pdo->query("SELECT * FROM especialidades");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarEspecialidade($nome){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO especialidades(nome) VALUES (?)");
        return $statement->execute([$nome]);
    }

    function retornarEspecialidadePorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM especialidades WHERE id = ?");
        $statement->execute([$id]);
        
        $especialidade = $statement->fetch(PDO::FETCH_ASSOC);

        return $especialidade ? $especialidade : null;

    }

    function atualizarEspecialidade(int $id, string $nome){
        global $pdo;

        $statement = $pdo->prepare("UPDATE especialidades SET nome = ? WHERE id = ?");
        return $statement->execute([$nome, $id]);
    }

    function excluirEspecialidade(int $id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM especialidades WHERE id = ?");
        return $statement->execute([$id]);
    }
?>