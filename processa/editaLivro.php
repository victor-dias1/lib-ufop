<?php
    session_start();
    include_once("../conexao.php");

    $id_livros = filter_input(INPUT_POST, 'id_livros', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_STRING);

    $result_livro = "UPDATE livros SET nome= '$nome', isbn= '$isbn', autor= '$autor', 
                                      edicao= '$edicao', WHERE id_livros= '$id_livros'";
    $result_query = pg_query($conexao, $result_livro);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<?php
    if($result_query){
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-teste.herokuapp.com/admin.php?link=4'>
        <script type=\"text/javascript\">
            alert(\"Livro editado com Sucesso!\");
        </script>
        ";
    }else{
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-teste.herokuapp.com/admin.php?link=4'>
        <script type=\"text/javascript\">
            alert(\"Erro ao editar livro!\");
        </script>
        ";
    }
?>
</body>
</html>
