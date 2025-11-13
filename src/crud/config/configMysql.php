<?php

    $host = 'localhost';
    $user = 'root';
    $password = 'L1oN@rdoBr@gaLMZl79';
    $dbname = 'project_produtos';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("ERRO 503".$e->getMessage());
    }
    
?>