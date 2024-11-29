<?php 
require_once '../funcoes/horarios.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID do horario não fornecido.</div>";
    exit;
}

$id = intval($_GET['id']);
$horario = retornarHorarioPorId($id);

if (!$horario) {
    echo "<div class='alert alert-danger'>Especialidade não encontrado.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $horario = $_POST['horario'];

    if (atualizarHorario($id, $horario)) {
        echo "<div class='alert alert-success'>Horário atualizado com sucesso!</div>";
        header("Location: horarios.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar horario.</div>";
    }
}

require_once 'cabecalho.php'; 
require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Editar Horário</h2>

    <form method="post">
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="text" name="horario" id="horario" class="form-control"  value="<?=$horario['horario']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Horários</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>