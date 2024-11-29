<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/horarios.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de especialidades</h2>
    <a href="novo_horario.php" class="btn btn-success mb-3">Novo horário</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Horário</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $horarios = retornarHorarios();
                foreach ($horarios as $h):
            ?>

            <tr>
                <td><?= $h['id']?></td>
                <td><?= $h['horario']?></td>
                <td>
                    <a href="excluir_horario.php?id=<?= $h['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_horario.php?id=<?= $h['id']?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>