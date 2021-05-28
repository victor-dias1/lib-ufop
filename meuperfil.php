<?php
include_once("../conexao.php");
$result_usuario = "SELECT * FROM usuarios";
$row_usuario_usuario = pg_query($conexao, $result_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Usuários</title>

    <!-- CSS Template -->
    <link rel="icon" href="../imagem/favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <!-- JS Template -->
    <script defer src="../js/fontawesome-all.min.js"></script>

    <!-- CSS dataTables -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">

    <!-- JS and JQuery dataTables -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

    <?php include_once('../includes/header.php'); ?>

    <main>
        <?php include_once('../includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="d-flex justify-content-center">
                <h1 class="display-3">Meu Perfil</h1>
            </div>
    </main>

    <!-- JS Template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>