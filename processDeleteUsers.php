<?php
    session_start();
    include_once("conexao.php");

    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $result_usuario = "DELETE FROM usuarios WHERE matricula = '$matricula'";
    $resultado_usuario = pg_query($conexao, $result_usuario);

    if(pg_affected_rows($conexao)){
        $_SESSION['msg'] = "<p style='color:green;'> Usuário deletado com sucesso!</p>";
        header("Location: dataUsers.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Erro ao deletar usuário!</p>";
        header("Location: dataUsers.php");
    }