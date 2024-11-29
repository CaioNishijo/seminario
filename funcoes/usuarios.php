<?php 
    declare(strict_types = 1);
    require_once '../config/dbconn.php';

    function criarAdmParaTeste(){
        global $pdo;

        $statement = $pdo->query("SELECT * FROM usuarios WHERE email = 'adm@adm.com'");
        $usuario = $statement->fetchAll(PDO::FETCH_ASSOC);
   
        if (!$usuario){
            $pdo->beginTransaction();
            $senha = password_hash('adm', PASSWORD_BCRYPT);
            $statement = 
                $pdo->prepare('INSERT INTO usuarios (nome,email,senha,nivel)  
                                VALUES (?, ?, ?, ?)');
            $statement->execute(['Administrador', 'adm@adm.com', $senha, 'adm']);
            $pdo->commit();
        }
    }

    function login(string $email, string $senha){
        global $pdo;
        
        $statement = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            
        $statement->execute([$email]);
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        var_dump($usuario);

        if($usuario && password_verify($senha, $usuario['senha'])){
            return $usuario;
        } else {
            return null;
        }
    }

    function retornarUsuarios(){
        global $pdo;

        $statement = $pdo->query(" SELECT * FROM usuarios WHERE nivel <> 'adm' ");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function novoUsuario(string $nome, string $email, string $senha, string $nivel):bool{
        global $pdo;
        $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);
        $stament = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, ?)");
        return $stament->execute([$nome, $email, $senha_criptografada, $nivel]);
    }

    function excluirUsuario(int $id):bool{
        global $pdo;
        $stament = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stament->execute([$id]);
    }

    function retornaUsuarioPorId(int $id): ?array{
        global $pdo;
        $stament = $pdo->prepare("SELECT * FROM usuarios WHERE id = ? AND nivel <> 'adm'");
        $stament->execute([$id]);
        $usuario = $stament->fetch(PDO::FETCH_ASSOC);
        return $usuario ? $usuario : null;
    }
?>

