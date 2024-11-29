<?php
    include_once '../config/dbconn.php';

    function retornarHorarios(){
        global $pdo;

        $statement = $pdo->query("SELECT * FROM horarios_consultas");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarHorario($horario){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO horarios_consultas(horario) VALUES (?)");
        return $statement->execute([$horario]);
    }

    function retornarHorarioPorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM horarios_consultas WHERE id = ?");
        $statement->execute([$id]);
        $horario = $statement->fetch(PDO::FETCH_ASSOC);
        return $horario ? $horario : null;
    }

    function excluirHorario(int $id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM horarios_consultas WHERE id = ?");
        return $statement->execute([$id]);
    }

    function atualizarHorario(int $id, string $horario){
        global $pdo;

        $statement = $pdo->prepare("UPDATE horarios_consultas SET horario = ? WHERE id = ?");
        return $statement->execute([$horario, $id]);
    }
?>  