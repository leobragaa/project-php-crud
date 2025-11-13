<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: ../login/login-page.php");
        exit;
    }
    require_once '../../crud/config/configMysql.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Produtos</title>
        <link rel="stylesheet" href="../../style.css?v=10">
    </head>

    <body class="dashboard-page">
        <?php include '../layout/drawer.php';?>

        <div class="main-content">

            <h1> Cadastrar </h1>

            <div class="form-container">
                <form action="../../crud/produtos/create-produtos.php" method="POST">
                   
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div class="input-group">
                        <label for="preco">Preço (1.00)</label>
                        <input type="number" id="preco" step="0.01" name="preco" required>
                    </div>

                    <div class="input-group">
                        <label for="quantidade">Quantidade </label>
                        <input type="number" id="quantidade" name="quantidade" required>
                    </div>

                    <div class="input-group">
                        <label for="image">Url Imagem</label>
                        <input type="text" id="imagem" name="imagem" required>
                    </div>

                    <div class="input-group">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao">
            
                        </textarea>                  
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn-submit"> Salvar Produtos</button>
                        <a href="listar-produtos.php" class="btn-cancel"> Cancelar </a>
                    </div>

                </form>
            </div>
        </div>
    </body>
</html>