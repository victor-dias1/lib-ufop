<?php
    session_start();
    include_once("../conexao.php");

    $id = filter_input(INPUT_POST, 'id_livro', FILTER_SANITIZE_STRING);
    $titulo = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_STRING);
    $sessao_id = filter_input(INPUT_POST, 'sessao_id', FILTER_SANITIZE_STRING);

    $result_user = "INSERT INTO livros VALUES ('$id', '$titulo', '$isbn','$autor', '$edicao', '$sessao_id')";
    $result_query = pg_query($conexao, $result_user);
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
        https://lib-ufop.herokuapp.com/gerenciaLivros.php'>
        <script type=\"text/javascript\">
            alert(\"Livro cadastrado com Sucesso!\");
        </script>
        ";
    }else{
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaLivros.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar livro!\");
        </script>
        ";
    }
?>
</body>
</html>
