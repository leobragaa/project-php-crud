<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: ../login/login-page.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../../style.css">
    </head>
    <body class="dashboard-page">
        <?php include '../layout/drawer.php'?>
        <div class="main-content">

            <h1>Gerenciamento de Produtos</h1>

            <div class="dashboard-cards">

                <a href="../produtos/listar-produtos.php" class="dashboard-card">
                    <div class="dashboard-card-icon">
                        <span>📄</span>
                    </div>
                    <h3>Listagem de Produtos</h3>
                    <span class="dashboard-card-btn">LISTAR</span>
                </a>

                <a href="../produtos/cadastrar-produtos.php" class="dashboard-card">
                    <div class="dashboard-card-icon">
                        <span>➕</span>
                    </div>
                    <h3>Cadastrar Novos Produtos</h3>
                    <span class="dashboard-card-btn">CADASTRAR</span>
                </a>
            </div>
        </div>
    </body>
</html>