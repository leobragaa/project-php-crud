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
    <body>
        <?php include '../layout/drawer.php'?>
        <div>
            <h1>Gerenciamento de Produtos</h1>
            <p> Painel de controle </p>
            <div class="conatiner">
                <div>
                    <button>
                        <label for=""> listar </label>
                    </button>
                </div>
                <div>
                    <button>
                        <label for=""> cadastrar </label>
                    </button>
                </div>
                <div>
                    <button>
                        <label for=""> editar </label>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>