<?php
include_once("conexao.php");

$result_livro = "SELECT COUNT(exisbn), id_livros, nome, autor, edicao
                FROM exemplares
                INNER JOIN livros ON isbn = exisbn
                WHERE emprestado = 0
                GROUP BY exisbn, isbn, id_livros";

$resultado_livro = pg_query($conexao, $result_livro);
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
            $('#listaLivros').DataTable();
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
                        <h2 class="display-4 titulo">Gerenciar Livros</h2>
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
                    <table id="listaLivros" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Edição</th>
                                <th>Exemplares Disponíveis</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_livros = pg_fetch_assoc($resultado_livro)) {
                            ?>
                                <tr>
                                    <th><?php echo $row_livros['id_livros']; ?></th>
                                    <td><?php echo $row_livros['nome']; ?></td>
                                    <td><?php echo $row_livros['autor']; ?></td>
                                    <td><?php echo $row_livros['edicao']; ?></td>
                                    <td><?php echo $row_livros['count']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#myModal<?php echo $row_livros['id_livros']; ?>">Visualizar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Apagar</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>