<?php
    session_start();
    include_once("conexao.php");

    $matricula = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_livro = "DELETE FROM livros WHERE id_livros = '$id'";
    $resultado_livro = pg_query($conexao, $result_livro);

    if($resultado_livro){
        $_SESSION['msg'] = "<p style='color:green;'> Livro deletado com sucesso!</p>";
        header("Location: dataBooks.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Erro ao deletar livro!</p>";
        header("Location: dataBooks.php");
    }