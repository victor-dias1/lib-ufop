<?php
    session_start();
    include_once("conexao.php");

    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $cod_exemplar = filter_input(INPUT_POST, 'cod_exemplar', FILTER_SANITIZE_NUMBER_INT);
    $date_emp = filter_input(INPUT_POST, 'date_emp', FILTER_SANITIZE_STRING);
    $date_dev = filter_input(INPUT_POST, 'date_dev', FILTER_SANITIZE_STRING);
    
    $result_user = "INSERT INTO emprestimos VALUES ('$matricula', '$cod_exemplar', '$date_emp', '$date_dev')";
    $result_query = pg_query($conexao, $result_user);
    
    if($result_query){
        $_SESSION['msg'] = "<p style='color:green;'>Empréstimo realizado com sucesso!</p>";
        header("Location: gerenciaEmprestimos.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar empréstimo!</p>";
        header("Location: gerenciaEmprestimos.php");
    }