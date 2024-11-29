<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/consultas.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de consultas</h2>
    <a href="nova_consulta.php" class="btn btn-success mb-3">Nova consulta</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Horário</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $consultas = retornarConsultas();
                foreach ($consultas as $c):
            ?>

            <tr>
                <td><?= $c['id']?></td>
                <td><?= $c['nome_medico']?></td>
                <td><?= $c['nome_paciente']?></td>
                <td><?= $c['hora_consulta']?></td>
                <td>
                    <a href="excluir_consulta.php?id=<?= $c['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_consulta.php?id=<?= $c['id']?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>