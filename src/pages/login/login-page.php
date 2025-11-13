<?php
    require_once '../../crud/config/configMysql.php';
    session_start();

    $erro = "";

    if(isset($_SESSION['user_id'])){
        header("Location: ../../pages/dashboard/dashboard-page.php");
        exit;
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim($_POST['email']);
        $senha_usuario = $_POST['senha'];

        if(empty($email) || empty($senha_usuario)){
            $erro = "Email e Senha Obrigatorios!";
        }else{
            $stmt = $pdo -> prepare("SELECT * FROM users WHERE email = ? ");
            $stmt -> execute ([$email]);
            $user = $stmt -> fetch(PDO::FETCH_ASSOC);
    
            if($user && password_verify($senha_usuario , $user['senha'])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nome'] = $user['nome'];
                header('Location: ../../pages/dashboard/dashboard-page.php');
                exit;
            }else{
                $erro = "Email ou Senha Incorretos!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../../style.css?v=10">
    </head>

    <body class="login-page">
        <div class="container">    

            <h2>Login</h2>

            <?php if(!empty($erro)) echo "<p class='erro'>$erro</p>";?>

            <form method="POST" action="login-page.php">
                <div class="input-group">

                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">

                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <button type="submit">ENTRAR</button>

                <div class="form-link">
                    <a href="../cadastro/cadastro-page.php">CRIAR CONTA </a> 
                </div>

            </form>  
        </div>
    </body>
</html>