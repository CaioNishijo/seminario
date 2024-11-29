<?php 
require_once '../funcoes/pacientes.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID do paciente não fornecido.</div>";
    exit;
}

$id = intval($_GET['id']);
$paciente = retornarPacientePorId($id);

if (!$paciente) {
    echo "<div class='alert alert-danger'>Paciente não encontrado.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];

    if (atualizarPaciente($id, $nome, $cpf, $idade)) {
        echo "<div class='alert alert-success'>Paciente atualizado com sucesso!</div>";
        header("Location: pacientes.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar paciente.</div>";
    }
}

require_once 'cabecalho.php'; 
require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Editar Horário</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"  value="<?=$paciente["nome"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control"  value="<?=$paciente["cpf"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="text" name="idade" id="idade" class="form-control"  value="<?=$paciente["idade"]; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar paciente</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>