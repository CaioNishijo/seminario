<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/pacientes.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $idade = $_POST["idade"];

            if (empty($nome) || empty($cpf) || empty($idade)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarPaciente($nome, $cpf, $idade)){
                    header('Location: pacientes.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o horario!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Criar novo paciente</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger"><?= $erro?></p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" name="idade" id="idade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Paciente</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>