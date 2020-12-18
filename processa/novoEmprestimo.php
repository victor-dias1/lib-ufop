<?php
    session_start();
    include_once("../conexao.php");

    $ematricula = filter_input(INPUT_POST, 'ematricula', FILTER_SANITIZE_STRING);
    $ecodigoexemplar = filter_input(INPUT_POST, 'ecodigoexemplar', FILTER_SANITIZE_STRING);
    $dataemprestimo = filter_input(INPUT_POST,'dataemprestimo');
    $dataentrega = filter_input(INPUT_POST,'dataentrega');

    echo $ematricula;
    echo $ecodigoexemplar;
    echo $dataemprestimo;
    echo $dataentrega;

    $result_user = "INSERT INTO emprestimos VALUES ('$ematricula', '$ecodigoexemplar', '$dataemprestimo', '$dataentrega')";
    $result_query = pg_query($conexao, $result_user);

    echo pg_last_error($result_query);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<!-- ?php
    if($result_query){
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Empréstimo realizado com Sucesso!\");
        </script>
        ";
    }else{
        echo"
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao realizar empréstimo!\");
        </script>
        ";
    }
?> -->
</body>
</html>
