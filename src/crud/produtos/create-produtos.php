<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location:../../pages/login/login-page.php");
        exit;
    }

    require_once '../config/configMysql.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = trim($_POST['nome']);
        $preco = trim($_POST['preco']);
        $quantidade = trim($_POST['quantidade']);
        $imagem = trim($_POST['imagem']);
        $descricao = trim($_POST['descricao']);

        $sql = "INSERT INTO produtos (nome, preco, quantidade, imagem, descricao) VALUES (?, ?, ?, ?, ?)";
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute ([$nome, $preco, $quantidade, $imagem, $descricao]);
            header("Location:../../pages/produtos/listar-produtos.php");
            exit;
        }catch(PDOException $e){
            die("Erro ao Cadastrar Produto" . $e -> getMessage());
        }
    }
?>