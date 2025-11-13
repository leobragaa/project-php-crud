<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location:../../pages/login/login-page.php");
        exit;
    }

    require_once '../config/configMysql.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_POST['imagem'];
        $descricao = $_POST['descricao'];
        
        if(!$id){
            die("ID não foi Encontrado");
        }

        try{

            $sql = "UPDATE produtos SET nome = ?, preco = ?, quantidade = ?, imagem = ?, descricao = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt -> execute ([$nome, $preco, $quantidade, $imagem, $descricao, $id]);

            header("Location:../../pages/produtos/listar-produtos.php");

            exit;    
        }catch(PDOException $e){
            die("Erro ao Atualizar" . $e->getMessage());
        }
        
        
    }else{
        header("Location:../../pages/produtos/listar-produtos.php");
        exit;
    }
?>