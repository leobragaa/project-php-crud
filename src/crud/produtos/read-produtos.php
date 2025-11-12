<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location:../../pages/login/login-page.php");
        exit;
    }
    require_once '../../config/configMysql.php';

    try{
        $stmt = $pdo->query("SELECT * FROM produtos");
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        die("Erro ao Realizar Busca de Produtos" . $e->getMessage());
    }
?>