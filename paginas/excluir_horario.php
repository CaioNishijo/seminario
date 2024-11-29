<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/horarios.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirHorario($id)){
                header('Location: horarios.php');
                exit();
            } else {
                $erro = "Erro ao excluir o horario!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $horario = retornarHorarioPorId($id);
            if ($horario == null){
                header('Location: horarios.php');
                exit();
            }
        } else {
            header('Location: horarios.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Horário</h2>

    <p>Tem certeza de que deseja excluir a especialidade abaixo?</p>

    <ul>
        <li><strong>Horário: <?= $horario['horario'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $horario['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="horarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>