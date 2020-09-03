<?php
    session_start();
    include_once("conexao.php");

    $nome = filter_input(INPUT_POST, 'registerUsername', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'registerEmail', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'registerPassword', FILTER_SANITIZE_STRING);
    

    $result_user = "INSERT INTO usuarios (pnome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $result_query = pg_query($conexao, $result_user);
    echo "$result_query";
    echo "pg_last_error($result_query)";

    if($result_query){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário Cadastrado com sucesso!</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar usuário!</p>";
        header("Location: index.php");
    }