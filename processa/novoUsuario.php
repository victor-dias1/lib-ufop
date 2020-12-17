<?php
    session_start();
    include_once("conexao.php");

    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo');
    $pnome = filter_input(INPUT_POST, 'pnome', FILTER_SANITIZE_STRING);
    $unome = filter_input(INPUT_POST, 'unome', FILTER_SANITIZE_STRING);
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


    $result_user = "INSERT INTO usuarios VALUES ('$cpf', '$tipo', '$pnome','$unome', '$matricula', '$email', '$senha')";
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
            https://lib-ufop.herokuapp.com/gerenciaUsuarios.php'>
            <script type=\"text/javascript\">
                alert(\"Usuário cadastrado com Sucesso!\");
            </script>
            ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
            https://lib-ufop.herokuapp.com/gerenciaUsuarios.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar usuário!\");
            </script>
            ";
    }
    ?>
</body>

</html>