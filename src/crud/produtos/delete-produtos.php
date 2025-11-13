<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location:../../pages/login/login-page.php");
        exit;
    }
    require_once '../config/configMysql.php';

    $id = $_GET['id'] ?? null;


    if($id){
        try{
            $stmt = $pdo -> prepare ("DELETE FROM produtos WHERE id = ?");
            $stmt -> execute ([$id]);
        }catch(PDOException $e){
            die("Erro ao Excluir Produto" . $e-> getMessage());
        }

    }

    header("Location:../../pages/produtos/listar-produtos.php");
    exit;
?>