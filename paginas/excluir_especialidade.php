<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/especialidades.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirEspecialidade($id)){
                header('Location: especialidades.php');
                exit();
            } else {
                $erro = "Erro ao excluir o especialidade!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $especialidade = retornarEspecialidadePorId($id);
            if ($especialidade == null){
                header('Location: especialidade.php');
                exit();
            }
        } else {
            header('Location: especialidade.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Usuário</h2>

    <p>Tem certeza de que deseja excluir a especialidade abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $especialidade['nome'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $especialidade['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="especialidades.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>