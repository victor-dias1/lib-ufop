<?php
    session_start();
    include_once("../conexao.php");

    $id_livros = $_GET['id'];
    $result_livro = "DELETE FROM livros WHERE id_livros = '$id_livros'";
    $resultado_livro = pg_query($conexao, $result_livro);

    if($resultado_livro){
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/livros.php'>
        <script type=\"text/javascript\">
            alert(\"Livro deletado com Sucesso!\");
        </script>
        ";
    }else{
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/livros.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao deletar livro!\");
        </script>
        ";
    }
