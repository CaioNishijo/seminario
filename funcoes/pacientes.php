<?php
    include_once '../config/dbconn.php';

    function retornarPacientes(){
        global $pdo;

        $statement = $pdo->query("SELECT * FROM pacientes");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarPaciente(string $nome, string $cpf, int $idade){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO pacientes(nome, cpf, idade) VALUES (?, ?, ?)");
        return $statement->execute([$nome, $cpf, $idade]);
    }

    function retornarPacientePorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");
        $statement->execute([$id]);
        $paciente = $statement->fetch(PDO::FETCH_ASSOC);
        return $paciente ? $paciente : null;
    }

    function excluirPaciente(int $id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM pacientes WHERE id = ?");
        return $statement->execute([$id]);
    }

    function atualizarPaciente(int $id, string $nome, string $cpf, int $idade){
        global $pdo;

        $statement = $pdo->prepare("UPDATE pacientes SET nome = ?, cpf = ?, idade = ? WHERE id = ?");
        return $statement->execute([$nome, $cpf, $idade, $id]);
    }
?>  