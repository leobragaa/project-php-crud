<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header("Location:../../pages/dashboard/dashboard-page.php");
    }else{
        header("Location:../../pages/login/login-page.php");
    }
    exit;
?>
