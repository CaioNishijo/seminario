<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/medicos.php';
    require_once '../funcoes/especialidades.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirMedico($id)){
                header('Location: medicos.php');
                exit();
            } else {
                $erro = "Erro ao excluir o médico!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $medico = retornarMedicoPorId($id);
            if ($medico == null){
                header('Location: medicos.php');
                exit();
            }
        } else {
            header('Location: medicos.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Médico</h2>

    <p>Tem certeza de que deseja excluir o médico abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $medico['nome'] ?></strong> </li>
        <li><strong>CRM: <?= $medico['crm'] ?></strong> </li>
        <li><strong>Especialidade: <?= $medico['especialidade'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $medico['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="medicos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>