<?php
    session_start();
    include_once("conexao.php");

    $id_livro = filter_input(INPUT_POST, 'id_livro', FILTER_SANITIZE_STRING);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_STRING);
    $sessao = filter_input(INPUT_POST, 'sessao', FILTER_SANITIZE_STRING);
    

    $result_books = "INSERT INTO livros VALUES ('$id_livro', '$titulo', '$isbn','$autor', '$edicao', '$sessao')";
    $result_query = pg_query($conexao, $result_books);
    
    # echo "$result_query";
    # echo "pg_last_error($result_query)";

    if($result_query){
        $_SESSION['msg'] = "<p style='color:green;'>Livro Cadastrado com sucesso!</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar Livro!</p>";
        header("Location: index.php");
    }