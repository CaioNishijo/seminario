<?php 
require_once '../funcoes/medicos.php';
require_once '../funcoes/especialidades.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID do médico não fornecido.</div>";
    exit;
}

$especialidades = retornarEspecialidades();
$id = intval($_GET['id']);
$medico = retornarMedicoPorId($id);

if (!$medico) {
    echo "<div class='alert alert-danger'>Médico não encontrado.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $crm = $_POST["crm"];
    $id_especialidade = $_POST["id_especialidade"];

    if (atualizarMedico($id, $nome, $crm, $id_especialidade)) {
        echo "<div class='alert alert-success'>Médico atualizado com sucesso!</div>";
        header("Location: medicos.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar médico.</div>";
    }
}

require_once 'cabecalho.php'; 
require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Editar Médico</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"  value="<?=$medico["nome"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" name="crm" id="crm" class="form-control"  value="<?=$medico["crm"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_especialidade" class="form-label">Especialidade</label>
            <select name="id_especialidade" id="id_especialidade" class="form-select" required>
                <?php foreach($especialidades as $especialidade): ?>
                    <option value="<?= $especialidade["id"]; ?>" 
                        <?= $especialidade["id"] == $medico["especialidade"] ? 'selected' : ''; ?>>
                        <?= $especialidade["nome"]; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar paciente</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>