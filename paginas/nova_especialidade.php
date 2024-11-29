<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/especialidades.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST['nome'];

            if (empty($nome)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarEspecialidade($nome)){
                    header('Location: especialidades.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o usuário!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Criar nova especialidade</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger"><?= $erro?></p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar especialidade</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>