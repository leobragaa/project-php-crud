<?php
    session_start();
    require_once '../../crud/produtos/read-produtos.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listagem Produtos</title>
        <link rel="stylesheet" href="../../style.css?v=10">
    </head>
    <body class="dashboard-page">
        <?php include '../layout/drawer.php';?>

        <div class="main-content">
            <h1>
                Listagem de Produtos
            </h1>

            <a href="../produtos/cadastrar-produtos.php" class="btn-add-new"> 
                ➕ Adicione Novos Produtos
            </a>

            <div class="product-list-container">
                <?php if(empty($produtos)) : ?> 
                    <p> Cadastro Vazio ! Nenhum produto cadastrado. </p>
                <?php else: ?>
                    <?php foreach ($produtos as $produto) :?>
                        <div class="product-card">
                            <div class="product-card-image">
                               <img 
                                   src="<?php echo $produto['imagem'] ?? 'https://via.placeholder.com/100'; ?>"
                                   alt="Product Image"
                                   onerror="this.src='https://via.placeholder.com/100';"
                               >
                            </div>
                            <div class="product-card-info">
                                <p><strong>Nome:</strong> <?php echo $produto['nome']; ?> </p>
                                <p><strong>Preco:</strong> <?php echo number_format($produto['preco'],2,',','.'); ?>R$</p>
                                <p><strong>Quantidade:</strong> <?php echo $produto['quantidade']; ?> em estoque </p>
                                <p><strong>Descricao:</strong> <?php echo $produto['descricao']; ?></p>
                            </div>
                            <div class="product-card-actions">
                                <a href="editar-produtos.php?id=<?php echo $produto['id']; ?>" 
                                    class="btn edit"> 
                                    Editar 
                                </a>
                                <a href="../../crud/produtos/delete-produtos.php?id=<?php echo $produto['id']; ?>" 
                                    class="btn delete"
                                    onclick = "return confirm('Confirmar a Exlusão ?');">
                                    Deletar 
                                </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>    
            </div>
        </div>
    </body>
</html>