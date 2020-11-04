<?php
    session_start();
    include_once("conexao.php");

    $cpf = filter_input(INPUT_POST, 'registerCPF', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'registerType', FILTER_SANITIZE_EMAIL);
    $pnome = filter_input(INPUT_POST, 'registerPName', FILTER_SANITIZE_STRING);
    $unome = filter_input(INPUT_POST, 'registerUName', FILTER_SANITIZE_STRING);
    $matricula = filter_input(INPUT_POST, 'registerMatricula', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'registerEmail', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'registerPassword', FILTER_SANITIZE_STRING);
    

    $result_user = "INSERT INTO usuarios VALUES ('$cpf', '$tipo', '$pnome','$unome', '$matricula', '$email', '$senha')";
    $result_query = pg_query($conexao, $result_user);
    
    # echo "$result_query";
    # echo "pg_last_error($result_query)";

    if($result_query){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário Cadastrado com sucesso!</p>";
        header("Location: gerenciaUsuarios.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar usuário!</p>";
        header("Location: gerenciaUsuarios.php");
    }