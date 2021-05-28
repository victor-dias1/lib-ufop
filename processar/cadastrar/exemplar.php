<?php
session_start();
include_once("../conexao.php");

$cod_exemplar = filter_input(INPUT_POST, 'codigoexemplar', FILTER_SANITIZE_STRING);
$cod_local = filter_input(INPUT_POST, 'codlocalizacao', FILTER_SANITIZE_STRING);
$ex_isbn = filter_input(INPUT_POST, 'exisbn', FILTER_SANITIZE_STRING);
$ex_local = filter_input(INPUT_POST, 'exlocalizacao', FILTER_SANITIZE_STRING);


$result_user = "INSERT INTO exemplares VALUES ('$cod_exemplar', '$cod_local', '0', '0', '$ex_isbn', '$ex_local')";
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
    if ($result_query) {
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/livros.php'>
        <script type=\"text/javascript\">
            alert(\"Exemplar cadastrado com Sucesso!\");
        </script>
        ";
    } else {
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/livros.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar exemplar!\");
        </script>
        ";
    }
    ?>
</body>

</html>