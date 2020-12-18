<?php
    session_start();
    include_once("../conexao.php");

    $ematricula = filter_input(INPUT_POST, 'ematricula', FILTER_SANITIZE_NUMBER_INT);
    $ecodigoexemplar = filter_input(INPUT_POST, 'ecodigoexemplar', FILTER_SANITIZE_STRING);
    $dataentrega = filter_input(INPUT_POST,'dataentrega');

    $result_emprestimos = "UPDATE emprestimos SET dataentrega= '$dataentrega', devolvido= 1 
                        WHERE ematricula= '$ematricula' AND ecodigoexemplar= '$ecodigoexemplar'";
    $result_query = pg_query($conexao, $result_emprestimos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<?php
    if($result_query){
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Livro devolvido com Sucesso!\");
        </script>
        ";
    }else{
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao devover livro!\");
        </script>
        ";
    }
?>
</body>
</html>
