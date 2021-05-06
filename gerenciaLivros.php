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

    <title>Livros</title>

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
            $('#listaLivros').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <main>
        <?php include_once('includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="d-flex justify-content-center">
                <h1 class="display-3">Gerenciar Livros</h1>
            </div>
            <div class="table-responsive" style="width: 90%">
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
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modalApagar<?php echo $row_livros['id_livros']; ?>">Apagar</button>
                                </td>
                            </tr>
                            <!-- Inicio Modal Visualizar -->
                            <div class="modal fade" id="myModal<?php echo $row_livros['id_livros']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="myModalLabel">Dados do Livro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <dl class="row">
                                                <dt class="col-sm-3">ID:</dt>
                                                <dd class="col-sm-9"><?php echo $row_livros['id_livros']; ?></dd>

                                                <dt class="col-sm-3">Nome:</dt>
                                                <dd class="col-sm-9"><?php echo $row_livros['nome']; ?></dd>

                                                <dt class="col-sm-3">Autor:</dt>
                                                <dd class="col-sm-9"><?php echo $row_livros['autor']; ?></dd>

                                                <dt class="col-sm-3">Edicao:</dt>
                                                <dd class="col-sm-9"><?php echo $row_livros['edicao']; ?></dd>
                                            </dl>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-outline-success" role="button" data-dismiss="modal" data-toggle="modal" data-target="#modalCadastrarExemplar">Cadastrar Exemplar</a>
                                            <a class="btn btn-outline-info" role="button" data-dismiss="modal" data-toggle="modal" data-target="#modalEditar<?php echo $row_livros['id_livros']; ?>">Editar</a>
                                            <a class="btn btn-outline-danger" role="button" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal Visualizar-->

                            <!-- Inicio Modal Cadastrar Livro-->
                            <div class="modal fade" id="modalCadastrarLivro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="myModalLabel">Cadastrar Livro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="processa/novoLivro.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">ID:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="id_livro" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Título:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nome" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">ISBN:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="isbn" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Autor:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="autor" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Edição:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="edicao" required maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Sessão:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="sessao_id" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                                                        <button class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal Cadastrar Livro -->

                            <!-- Inicio Modal Editar-->
                            <div class="modal fade" id="modalEditar<?php echo $row_livros['id_livros']; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar livro</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="processa/editaLivro.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Título:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nome" value="<?php echo $row_livros['nome'] ?>" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">ISBN:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="isbn" value="<?php echo $row_livros['isbn'] ?>" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Autor:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="autor" value="<?php echo $row_livros['autor'] ?>" required maxlength="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Edição:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="edicao" value="<?php echo $row_livros['edicao'] ?>" required maxlength="30">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_livros" value="<?php echo $row_livros['id_livros']; ?>">
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                                                        <button class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Fim Modal Editar-->

                            <!-- Inicio Modal Apagar-->
                            <div class="modal fade" id="modalApagar<?php echo $row_livros['id_livros']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="myModalLabel">Deletar Livro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <blockquote class="blockquote">
                                                <p class="mb-0">Tem certeza que deseja excluir o livro '<?php echo $row_livros['nome']; ?>' do seu Banco de Dados?</p>
                                            </blockquote>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-outline-danger" href='processa/deletaLivro.php?id=<?php echo $row_livros['id_livros']; ?>' role="button">Excluir</a>
                                            <a class="btn btn-outline-primary" role="button" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal Apagar-->
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#">
                    <div class="p-2">
                        <button type="button" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#modalCadastrarLivro"> Cadastrar </button>
                    </div>
                </a>
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