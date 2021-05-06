<?php
include_once("conexao.php");
$result_reservas = "SELECT * FROM reservas";
$resultado_reservas = pg_query($conexao, $result_reservas);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reservas</title>

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
            $('#listaReservas').DataTable({
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
                <h1 class="display-3">Gerenciar Reservas</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="table-responsive" style="width: 90%">
                    <table id="listaReservas" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Código do Exemplar</th>
                                <th>Data da Reserva</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_reservas = pg_fetch_assoc($resultado_reservas)) {
                            ?>
                                <tr>
                                    <th><?php echo $row_reservas['rmatricula']; ?></th>
                                    <td><?php echo $row_reservas['rcodigoexemplar']; ?></td>
                                    <td><?php echo $row_reservas['rdata']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#myModal<?php echo $row_reservas['rcodigoexemplar']; ?>">Visualizar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Apagar</button>
                                    </td>
                                </tr>
                                <!-- Inicio Modal Visualizar -->
                                <div class="modal fade" id="myModal<?php echo $row_reservas['rcodigoexemplar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Dados da Reserva</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Matrícula:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rmatricula']; ?></dd>

                                                    <dt class="col-sm-3">Código do Exemplar:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rcodigoexemplar']; ?></dd>

                                                    <dt class="col-sm-3">Data da Reserva:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rdata']; ?></dd>
                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-success" role="button" data-dismiss="modal" data-toggle="modal" data-target='#modalCadastrarEmprestimo<?php echo $row_reservas['rcodigoexemplar']; ?>'>Emprestar</a>
                                                <a class="btn btn-outline-danger" role="button" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal Visualizar -->

                                <!-- Inicio Modal Cadastrar Reserva -->
                                <div class="modal fade" id="modalCadastrarReserva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Cadastrar Reserva</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="processa/novoReserva.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="rmatricula">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Código do Exemplar:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputPassword3" name="rcodigoexemplar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Data da Reserva:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" name="rdata">
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
                                <!-- Fim Modal Cadastrar Reserva -->

                                <!-- Inicio Modal Cadastrar Empréstimo -->
                                <div class="modal fade" id="modalCadastrarEmprestimo<?php echo $row_reservas['rcodigoexemplar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Cadastrar Empréstimo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Matrícula:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rmatricula']; ?></dd>

                                                    <dt class="col-sm-3">Código do Exemplar:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rcodigoexemplar']; ?></dd>

                                                    <dt class="col-sm-3">Data da Reserva:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_reservas['rdata']; ?></dd>
                                                </dl>
                                                <form method="POST" action="processa/novoEmprestimo.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Data do Empréstimo:</label>
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
                                                    <input type="hidden" name="ematricula" value="<?php echo $row_reservas['rmatricula']; ?>">
                                                    <input type="hidden" name="ecodigoexemplar" value="<?php echo $row_reservas['rcodigoexemplar']; ?>">
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
                                <!-- Fim Modal Cadastrar Empréstimo-->
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
                        <button type="button" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#modalCadastrar"> Reservar </button>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- JS Template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>