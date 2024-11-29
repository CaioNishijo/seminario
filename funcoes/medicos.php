<?php
    include_once '../config/dbconn.php';

    function retornarMedicos(){
        global $pdo;

        $statement = $pdo->query("SELECT m.id, m.nome, m.crm, e.nome AS especialidade FROM medicos m JOIN especialidades e ON e.id = m.id_especialidade");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarMedico(string $nome, string $crm, int $idEspecialidade){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO medicos(nome, crm, id_especialidade) VALUES (?, ?, ?)");
        return $statement->execute([$nome, $crm, $idEspecialidade]);
    }

    function retornarMedicoPorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT m.id, m.nome, m.crm, e.nome, e.id as especialidade FROM medicos m JOIN especialidades e ON e.id = m.id_especialidade WHERE m.id = ?");
        $statement->execute([$id]);
        $medico = $statement->fetch(PDO::FETCH_ASSOC);
        return $medico ? $medico : null;
    }

    function excluirMedico(int $id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM medicos WHERE id = ?");
        return $statement->execute([$id]);
    }

    function atualizarMedico(int $id, string $nome, string $crm, int $idEspecialidade){
        global $pdo;

        $statement = $pdo->prepare("UPDATE medicos SET nome = ?, crm = ?, id_especialidade = ? WHERE id = ?");
        return $statement->execute([$nome, $crm, $idEspecialidade, $id]);
    }
?>  