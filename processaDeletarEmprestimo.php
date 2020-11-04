<?php
    session_start();
    include_once("conexao.php");

    $codExemplar = filter_input(INPUT_POST, 'codExemplar', FILTER_SANITIZE_NUMBER_INT);
    $result_livro = "DELETE FROM emprestimos WHERE ecodigoexemplar = '$codExemplar'";
    $resultado_livro = pg_query($conexao, $result_livro);

    if($resultado_livro){
        $_SESSION['msg'] = "<p style='color:green;'> Livro deletado com sucesso!</p>";
        header("Location: gerenciaEmprestimos.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Erro ao deletar livro!</p>";
        header("Location: gerenciaEmprestimos.php");
    }