<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/horarios.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $horario = $_POST['horario'];

            if (empty($horario)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarHorario($horario)){
                    header('Location: horarios.php');
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
    <h2>Criar novo horario</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger"><?= $erro?></p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Horário</label>
            <input type="time" name="horario" id="horario" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Horário</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>