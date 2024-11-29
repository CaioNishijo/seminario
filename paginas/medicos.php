<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/medicos.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de médicos</h2>
    <a href="novo_medico.php" class="btn btn-success mb-3">Novo médico</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $medicos = retornarMedicos();
                foreach ($medicos as $m):
            ?>

            <tr>
                <td><?= $m['id']?></td>
                <td><?= $m['nome']?></td>   
                <td><?= $m['crm']?></td>
                <td><?= $m['especialidade']?></td>
                <td>
                    <a href="excluir_medico.php?id=<?= $m['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_medico.php?id=<?= $m['id']?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>