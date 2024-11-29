<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/horarios.php';
    require_once '../funcoes/medicos.php';
    require_once '../funcoes/pacientes.php';
    require_once '../funcoes/consultas.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirConsulta($id)){
                header('Location: consultas.php');
                exit();
            } else {
                $erro = "Erro ao excluir a consulta!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $consulta = retornarConsultaPorId($id);
            $medico = retornarMedicoPorId($consulta["id_medico"]);
            $paciente = retornarPacientePorId($consulta["id_paciente"]);
            $horario = retornarHorarioPorId($consulta["data_consulta_id"]);
            if ($consulta == null){
                header('Location: consultas.php');
                exit();
            }
        } else {
            header('Location: consultas.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Médico</h2>

    <p>Tem certeza de que deseja excluir o médico abaixo?</p>

    <ul>
        <li><strong>Médico: <?= $medico['nome'] ?></strong> </li>
        <li><strong>Paciente: <?= $paciente['nome'] ?></strong> </li>
        <li><strong>Horário: <?= $horario['horario'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $consulta['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="consultas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>