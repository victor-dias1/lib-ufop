<?php
    session_start();
    unset($_SESSION['cpf'], $_SESSION['pnome'], $_SESSION['email']);
    
    $_SESSION['msg'] = "Deslogado com sucesso!";
    header("Location: index.php");
?>