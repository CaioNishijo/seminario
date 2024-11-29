<?php 
require_once '../funcoes/especialidades.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID da especialidade não fornecido.</div>";
    exit;
}

$id = intval($_GET['id']);
$especialidade = retornarEspecialidadePorId($id);
var_dump($especialidade);

if (!$especialidade) {
    echo "<div class='alert alert-danger'>Especialidade não encontrado.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    if (atualizarEspecialidade($id, $nome)) {
        echo "<div class='alert alert-success'>Especialidade atualizada com sucesso!</div>";
        header("Location: especialidades.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar produto.</div>";
    }
}

require_once 'cabecalho.php'; 
require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Editar Especialidade</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"  value="<?=$especialidade['nome']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Especialidade</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>