<?php 
    include_once '../config/dbconn.php';

    function retornarConsultas(){
        global $pdo;

        $statement = $pdo->query("SELECT c.id, m.nome as nome_medico, p.nome as nome_paciente, h.horario as hora_consulta FROM consultas c JOIN medicos m ON m.id = c.id_medico JOIN pacientes p ON p.id = c.id_paciente JOIN horarios_consultas h ON h.id = c.data_consulta_id");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarConsulta(int $medico_id, int $paciente_id, int $horario_id){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO consultas(id_medico, id_paciente, data_consulta_id) VALUES (?, ?, ?)");
        return $statement->execute([$medico_id, $paciente_id, $horario_id]);
    }

    function retornarConsultaPorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM consultas WHERE id = ?");
        $statement->execute([$id]);
        $consulta = $statement->fetch(PDO::FETCH_ASSOC);
        return $consulta ? $consulta : null;
    }

    function editarConsulta(int $id, int $medico_id, int $paciente_id, int $horario_id){
        global $pdo;

        $statement = $pdo->prepare("UPDATE consultas SET id_medico = ?, id_paciente = ?, data_consulta_id = ? WHERE id = ?");
        $statement->execute([$medico_id, $paciente_id, $horario_id, $id]);
    }

    function excluirConsulta($id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM consultas WHERE id = ?");
        return $statement->execute([$id]);
    }
?>