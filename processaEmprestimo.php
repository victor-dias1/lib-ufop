<?php
    session_start();
    include_once("conexao.php");

    $matricula = filter_input(INPUT_POST, 'registerCPF', FILTER_SANITIZE_NUMBER_INT);
    $cod_exemplar = filter_input(INPUT_POST, 'registerType', FILTER_SANITIZE_NUMBER_INT);
    $date_emp = filter_input(INPUT_POST, 'registerPName', FILTER_SANITIZE_STRING);
    $date_dev = filter_input(INPUT_POST, 'registerUName', FILTER_SANITIZE_STRING);
    
    $result_user = "INSERT INTO emprestimos VALUES ('$matricula', '$cod_exemplar', '$date_emp', '$date_dev')";
    $result_query = pg_query($conexao, $result_user);
    
    if($result_query){
        $_SESSION['msg'] = "<p style='color:green;'>Empréstimo realizado com sucesso!</p>";
        header("Location: dataBooks.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar empréstimo!</p>";
        header("Location: dataBooks.php");
    }