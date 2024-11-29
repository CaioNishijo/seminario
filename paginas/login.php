<?php 
    session_start();
    require_once 'cabecalho.php';
    require_once '../funcoes/usuarios.php';

    criarAdmParaTeste();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            if($email != '' && $senha != ''){
                $usuario = login($email, $senha);
                var_dump($usuario);

                if($usuario){
                    $_SESSION["usuario"] = $usuario["nome"];
                    $_SESSION["nivel"] = $usuario["nivel"];
                    $_SESSION["acesso"] = true;
                    header("Location: dashboard.php");
                } else{
                    $erro = "Credenciais inválidas";
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
?>
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-sm col-md-5">
        <h2 class="text-center mb-4">Login</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <p><?php 
                if(isset($erro)){
                    echo $erro;
                }
                ?>
            </p>
        </div>
    </div>
<?php include_once 'rodape.php'?>