<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/pacientes.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de pacientes</h2>
    <a href="novo_paciente.php" class="btn btn-success mb-3">Novo paciente</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Médico</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $pacientes = retornarPacientes();
                foreach ($pacientes as $p):
            ?>

            <tr>
                <td><?= $p['id']?></td>
                <td><?= $p['nome']?></td>
                <td><?= $p['cpf']?></td>
                <td><?= $p['idade']?></td>
                <td>
                    <a href="excluir_paciente.php?id=<?= $p['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_paciente.php?id=<?= $p['id']?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>