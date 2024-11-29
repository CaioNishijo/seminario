<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/horarios.php';
    require_once '../funcoes/medicos.php';
    require_once '../funcoes/pacientes.php';
    require_once '../funcoes/consultas.php';

    $id = intval($_GET['id']);
    $consulta = retornarConsultaPorId($id);   
    $pacientes = retornarPacientes();
    $horarios = retornarHorarios();
    $medicos = retornarMedicos();

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id_medico = $_POST["id_medico"];
            $id_paciente = $_POST["id_paciente"];
            $id_horario = $_POST["id_horario"];

            editarConsulta($id ,$id_medico, $id_paciente, $id_horario);
            header("Location: consultas.php");

        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Editar consulta</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger"><?= $erro?></p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="id_medico" class="form-label">Médicos</label>
            <select name="id_medico" id="id_medico" class="form-select" required>
                <?php foreach($medicos as $medico): ?>
                    <option value="<?= $medico["id"]; ?>" 
                        <?= $medico["id"] == $consulta["id_medico"] ? 'selected' : ''; ?>>
                        <?= $medico["nome"]; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_paciente" class="form-label">Pacientes</label>
            <select name="id_paciente" id="id_paciente" class="form-select" required>
                <?php foreach($pacientes as $paciente): ?>
                    <option value="<?= $paciente["id"]; ?>" 
                        <?= $paciente["id"] == $consulta["id_paciente"] ? 'selected' : ''; ?>>
                        <?= $paciente["nome"]; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_horario" class="form-label">Horários</label>
            <select name="id_horario" id="id_horario" class="form-select" required>
                <?php foreach($horarios as $horario): ?>
                    <option value="<?= $horario["id"]; ?>" 
                        <?= $horario["id"] == $consulta["data_consulta_id"] ? 'selected' : ''; ?>>
                        <?= $horario["horario"]; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Editar consulta</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>