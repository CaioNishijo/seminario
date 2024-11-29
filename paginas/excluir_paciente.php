<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/pacientes.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirPaciente($id)){
                header('Location: pacientes.php');
                exit();
            } else {
                $erro = "Erro ao excluir o paciente!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $paciente = retornarPacientePorId($id);
            if ($paciente == null){
                header('Location: pacientes.php');
                exit();
            }
        } else {
            header('Location: pacientes.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Paciente</h2>

    <p>Tem certeza de que deseja excluir o paciente abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $paciente['nome'] ?></strong> </li>
        <li><strong>CPF: <?= $paciente['cpf'] ?></strong> </li>
        <li><strong>Idade: <?= $paciente['idade'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $paciente['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="pacientes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>