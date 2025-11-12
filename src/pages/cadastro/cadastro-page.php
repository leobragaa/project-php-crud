<?php
    require_once'../../crud/config/configMysql.php';
    session_start();

    $erro = "";
    if(isset($_SESSION['user_id'])){
        header("Location: ../../pages/dashboard/dashboard-page.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];
        if(empty($nome) ||  empty($email) || empty($senha)){
            $erro = "Campos Obrigatorios";
        }
        else{
            $stmt = $pdo -> prepare("SELECT * FROM users WHERE email = ?");
            $stmt -> execute ([$email]);
            if($stmt -> rowCount() > 0){

                $erro = "Email já cadastrado";

            } else {
                
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                $insert = $pdo -> prepare("INSERT INTO users (nome,email,senha) values (?,?,?)");
                $insert -> execute ([$nome, $email, $senha_hash]);
                
                $_SESSION['user_id'] = $pdo->lastinsertId();
                $_SESSION['user_nome'] = $nome;

                header('Location: ../../pages/dashboard/dashboard-page.php');

                exit;
            }
        
        
        }
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="../../style.css">
    </head>

    <body>
        <div class="container">
            
            <h2>Cadastro</h2>
            
            <?php if(!empty($erro)) echo "<p class='erro'>$erro</p>";?>

            <form method="POST" action="cadastro-page.php">
                <div class="input-group">
                    <input type="text" name="nome" placeholder="Nome" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <button type="submit">Cadastrar</button>

                <div class="form-link">
                    <a href="../login/login-page.php"> Já possui Conta? Faça Login </a>
                </div>

            </form> 
        </div>
    </body>
</html>
    