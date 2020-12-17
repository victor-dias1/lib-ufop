<?php
include_once("conexao.php");
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
    <link rel="icon" href="imagem/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- JS Template -->
    <script defer src="js/fontawesome-all.min.js"></script>

    <!-- CSS dataTables -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <!-- JS and JQuery dataTables -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            $('#listaUsuarios').DataTable();
        });
    </script>
</head>

<body>

    <?php include_once('includes/header.php'); ?>

    <main>
        <?php include_once('includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Gerenciar Usuários</h2>
                    </div>
                    <a href="#">
                        <div class="p-2">
                            <button class="btn btn-outline-success btn-sm">
                                Cadastrar
                            </button>
                        </div>
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="listaUsuarios" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_usuario = pg_fetch_assoc($row_usuario_usuario)) {
                            ?>
                                <tr>
                                    <th><?php echo $row_usuario['matricula']; ?></th>
                                    <td><?php echo $row_usuario['pnome']; ?></td>
                                    <td><?php echo $row_usuario['unome']; ?></td>
                                    <td><?php echo $row_usuario['email']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modalVisualizar<?php echo $row_usuario['matricula']; ?>">Visualizar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modalApagar<?php echo $row_usuario['matricula']; ?>">Apagar</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- JS Template -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>