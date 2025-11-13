<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: ../login/login-page.php");
        exit;
    }

    require_once '../../crud/config/configMysql.php';

    $id = $_GET['id'] ?? null;
    if(!$id){
        die("ID não foi Encontrado !");
    }

    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt -> execute([$id]);
    $produto = $stmt -> fetch(PDO::FETCH_ASSOC);

    if(!$produto){
        die("Produto Não foi Encontrado !");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Produtos</title>
        <link rel="stylesheet" href="../../style.css?v=10">
    </head>
    <body class="dashboard-page"> 
    <?php include '../layout/drawer.php';?>
        <div class="main-content">
            <h1>Editar Produtos</h1>
            <div class="form-container">
                <form method="POST" action="../../crud/produtos/update-produtos.php" >
                    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                    
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome'];?>" required>
                    </div>
    
                    <div class="input-group">
                        <label for="preco">Preço (ex: 1.00)</label>
                        <input type="number" id="preco" step="0.01" name="preco" value="<?php echo $produto['preco'];?>" required>
                    </div>
    
                    <div class="input-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade'];?>" required>
                    </div>
    
                    <div class="input-group">
                        <label for="imagem">Url Imagem</label>
                        <input type="text" id="imagem" name="imagem" value="<?php echo $produto['imagem'];?>" required>
                    </div>
    
                    <div class="input-group">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
                    </div>
    
                    <div class="form-actions">
                        <button type="submit" class="btn-submit"> Salvar Alterações</button>
                        <a href="listar-produtos.php" class="btn-cancel"> Cancelar </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

