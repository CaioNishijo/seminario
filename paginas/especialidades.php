<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/especialidades.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de especialidades</h2>
    <a href="nova_especialidade.php" class="btn btn-success mb-3">Nova especialidade</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $especialidades = retornarEspecialidades();
                foreach ($especialidades as $i):
            ?>

            <tr>
                <td><?= $i['id']?></td>
                <td><?= $i['nome']?></td>
                <td>
                    <a href="excluir_especialidade.php?id=<?= $i['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_especialidade.php?id=<?= $i['id']?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>