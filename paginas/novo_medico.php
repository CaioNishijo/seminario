<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/medicos.php';
    require_once '../funcoes/especialidades.php';

    $especialidades = retornarEspecialidades();

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST["nome"];
            $crm = $_POST["crm"];
            $idEspecialidade = $_POST["id_especialidade"];

            if (empty($nome) || empty($crm) || empty($idEspecialidade)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarMedico($nome, $crm, $idEspecialidade)){
                    header('Location: medicos.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o medico!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Criar novo médico</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger"><?= $erro?></p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" name="crm" id="crm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_especialidade" class="form-label">Produto</label>
            <select name="id_especialidade" id="id_especialidade" class="form-select" required>
                <?php foreach($especialidades as $especialidade): ?>
                    <option value=<?= $especialidade["id"]; ?>><?= $especialidade["nome"]; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Médico</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>