<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    $_SESSION['login_error'] = "Faça login para continuar!";
    header("Location: index.php");
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


include_once("../conexao.php");

$result_emprestimos = " SELECT pnome, unome, matricula, ecodigoexemplar, nome, edicao, autor, dataemprestimo, dataentrega 
                        FROM usuarios
                        INNER JOIN emprestimos ON ematricula = matricula
                        INNER JOIN exemplares ON codigoexemplar = ecodigoexemplar
                        INNER JOIN livros ON isbn = exisbn
                        WHERE devolvido = 0
                        GROUP BY matricula, ematricula, codigoexemplar, ecodigoexemplar, nome, edicao, pnome, unome, autor
                        ORDER BY pnome ";
$resultado_emprestimos = pg_query($conexao, $result_emprestimos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Empréstimos</title>

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

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            $('#listaEmprestimos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</head>

<body>

    <?php include_once('../includes/header.php'); ?>

    <main>
        <?php include_once('../includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="d-flex justify-content-center">
                <h1 class="display-3">Gerenciar Empréstimos</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="table-responsive" style="width: 90%">
                    <table id="listaEmprestimos" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Cód. Exemplar</th>
                                <th>Título</th>
                                <th>Edição</th>
                                <th>Autor</th>
                                <th>Data Empréstimo</th>
                                <th>Data Devolução</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_emprestimos = pg_fetch_assoc($resultado_emprestimos)) {
                            ?>
                                <tr>
                                    <td><?php echo $row_emprestimos['pnome']; ?> </br>
                                        <?php echo $row_emprestimos['unome']; ?></td>
                                    <td><?php echo $row_emprestimos['matricula']; ?></td>
                                    <td><?php echo $row_emprestimos['ecodigoexemplar']; ?></td>
                                    <td><?php echo $row_emprestimos['nome']; ?></td>
                                    <td><?php echo $row_emprestimos['edicao']; ?></td>
                                    <td><?php echo $row_emprestimos['autor']; ?></td>
                                    <td><?php echo $row_emprestimos['dataemprestimo']; ?></td>
                                    <td><?php echo $row_emprestimos['dataentrega']; ?></td>
                                    <td>
                                        <button type="button" class="bi bi-plus-circle" data-toggle="modal" data-target="#myModal<?php echo $row_emprestimos['ecodigoexemplar']; ?>"></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modalApagar<?php echo $row_emprestimos['ecodigoexemplar']; ?>">Apagar</button>
                                    </td>
                                </tr>
                                <!-- Inicio Modal Visualizar -->
                                <div class="modal fade" id="myModal<?php echo $row_emprestimos['ecodigoexemplar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Dados do Empréstimo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Matrícula:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_emprestimos['matricula']; ?></dd>

                                                    <dt class="col-sm-3">Código do Exemplar:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_emprestimos['ecodigoexemplar']; ?></dd>

                                                    <dt class="col-sm-3">Data do Empréstimo:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_emprestimos['dataemprestimo']; ?></dd>

                                                    <dt class="col-sm-3">Data de Devolução:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_emprestimos['dataentrega']; ?></dd>
                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-warning" role="button" data-dismiss="modal" data-toggle="modal" data-target="#modalRenovar<?php echo $row_emprestimos['ecodigoexemplar']; ?>" role="button">Renovar</a>
                                                <a class="btn btn-outline-danger" role="button" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal Visualizar -->

                                <!-- Inicio Modal Cadastrar Empréstimo -->
                                <div class="modal fade" id="modalCadastrarEmprestimo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Cadastrar Empréstimo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../processar/cadastrar/emprestimo.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="ematricula">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Código do Exemplar:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="ecodigoexemplar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Data de Empréstimo:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" name="dataemprestimo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Data de Devolução:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" name="dataentrega">
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
                                <!-- Fim Modal Cadastrar Empréstimo-->

                                <!-- Inicio Modal Devolver -->
                                <div class="modal fade" id="modalDevolverEmprestimo" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Devolução</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../processar/devolucao.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="ematricula">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Código do Exemplar:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="ecodigoexemplar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Data de Devolução:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" name="dataentrega">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-outline-success">Confirmar</button>
                                                            <button class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Fim Modal Devolver-->

                                <!-- Inicio Modal Renovar -->
                                <div class="modal fade" id="modalRenovar<?php echo $row_emprestimos['ecodigoexemplar']; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Renovação</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <dt class="col-sm-3">Matrícula:</dt>
                                                <dd class="col-sm-9"><?php echo $row_emprestimos['matricula']; ?></dd>

                                                <dt class="col-sm-3">Código do Exemplar:</dt>
                                                <dd class="col-sm-9"><?php echo $row_emprestimos['ecodigoexemplar']; ?></dd>

                                                <dt class="col-sm-3">Data do Empréstimo:</dt>
                                                <dd class="col-sm-9"><?php echo $row_emprestimos['dataemprestimo']; ?></dd>
                                                <form method="POST" action="../processar/renovacao.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nova Data:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" name="dataentrega">
                                                        </div>
                                                        <input type="hidden" name="matricula" value="<?php echo $row_emprestimos['matricula']; ?>">
                                                        <input type="hidden" name="codExemplar" value="<?php echo $row_emprestimos['ecodigoexemplar']; ?>">
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-outline-success">Confirmar</button>
                                                            <button class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Fim Modal Renovar-->

                                <!-- Inicio Modal Apagar-->
                                <div class="modal fade" id="modalApagar<?php echo $row_emprestimos['ecodigoexemplar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Deletar Empréstimo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <blockquote class="blockquote">
                                                    <p class="mb-0">Tem certeza que deseja excluir o empréstimo de '<?php echo $row_emprestimos['ecodigoexemplar']; ?>' do seu Banco de Dados?</p>
                                                </blockquote>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-danger" href='../processar/deletar/emprestimo.php?id=<?php echo $row_emprestimos['ecodigoexemplar']; ?>' role="button">Excluir</a>
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
            </div>
            <div class="d-flex justify-content-center">
                <a href="#">
                    <div class="p-2">
                        <button type="button" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#modalCadastrarEmprestimo"> Cadastrar </button>
                        <button type="button" class="btn btn-lg btn-outline-warning" data-toggle="modal" data-target="#modalDevolverEmprestimo"> Devolver </button>
                    </div>
                </a>
            </div>
        </div>
        </div>
        </div>
    </main>

    <!-- JS Template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>