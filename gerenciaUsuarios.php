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
            $('#listaUsuarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
    <script>
        $('#modalVisualizar').on('shown.bs.modal', function() {
            $('#meuInput').trigger('focus')
        })
    </script>
</head>

<body>

    <?php include_once('includes/header.php'); ?>

    <main>
        <?php include_once('includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="d-flex justify-content-center">
                <div class="title">
                    <h1>Gerenciar Usuários</h1>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="#">
                    <div class="p-2">
                        <button type="button" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#modalCadastrar"> Cadastrar </button>
                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="table-responsive" style="width:85%">
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
                                <!-- Inicio Modal Cadastrar-->
                                <div class="modal fade" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Cadastrar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="processa/novoUsuario.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">CPF:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="cpf" pattern="[0-9]{11}" required maxlength="11" minlength="11">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nome:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="pnome" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Sobrenome:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="unome" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="matricula" required maxlength="30">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">E-mail:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Senha:</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="senha" required maxlength="20" minlength="4">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label" required>Tipo de Usuário:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="tipo">
                                                                <option selected>Selecione</option>
                                                                <option value="1">Administrador</option>
                                                                <option value="2">Professor</option>
                                                                <option value="0">Aluno</option>
                                                            </select>
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
                                <!-- Fim Modal Cadastrar-->

                                <!-- Inicio Modal Visualizar-->
                                <div class="modal fade" id="modalVisualizar<?php echo $row_usuario['matricula']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Dados do Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Matrícula:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_usuario['matricula']; ?></dd>

                                                    <dt class="col-sm-3">Nome:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_usuario['pnome']; ?></dd>

                                                    <dt class="col-sm-3">Sobrenome:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_usuario['unome']; ?></dd>

                                                    <dt class="col-sm-3">E-mail:</dt>
                                                    <dd class="col-sm-9"><?php echo $row_usuario['email']; ?></dd>
                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-warning" role="button" data-dismiss="modal" data-toggle="modal" data-target="#modalEditar<?php echo $row_usuario['matricula']; ?>">Editar</a>
                                                <a class="btn btn-outline-danger" role="button" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal Visualizar-->

                                <!-- Inicio Modal Editar-->
                                <div class="modal fade" id="modalEditar<?php echo $row_usuario['matricula']; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="processa/editaUsuario.php">
                                                    <input type="hidden" name="idUsuario" value="<?php echo $row_usuario['matricula']; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">CPF:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="cpf" value="<?php echo $row_usuario['cpf'] ?>" pattern="[0-9]{11}" required maxlength="11" minlength="11">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nome:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="pnome" value="<?php echo $row_usuario['pnome'] ?>" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Sobrenome:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="unome" value="<?php echo $row_usuario['unome'] ?>" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="matricula" value="<?php echo $row_usuario['matricula'] ?>" required maxlength="30">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">E-mail:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email" value="<?php echo $row_usuario['email'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Senha:</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="senha" value="<?php echo $row_usuario['senha'] ?>" required maxlength="20" minlength="4">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Tipo de Usuário:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="tipo" required>
                                                                <option>Selecione</option>
                                                                <option value="1" <?php
                                                                                    if ($row_usuario['tipo_usuario'] == 1) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>>Administrador</option>
                                                                <option value="0" <?php
                                                                                    if ($row_usuario['tipo_usuario'] == 0) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>>Aluno</option>
                                                                <option value="2" <?php
                                                                                    if ($row_usuario['tipo_usuario'] == 2) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>>Professor</option>
                                                            </select>
                                                        </div>
                                                    </div>
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
                                <div class="modal fade" id="modalApagar<?php echo $row_usuario['matricula']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="myModalLabel">Deletar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <blockquote class="blockquote">
                                                    <p class="mb-0">Tem certeza que deseja excluir '<?php echo $row_usuario['pnome']; ?>' do seu Banco de Dados?</p>
                                                </blockquote>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-danger" href='processa/deletaUsuario.php?id=<?php echo $row_usuario['matricula']; ?>' role="button">Excluir</a>
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
        </div>
        </div>
    </main>

    <!-- JS Template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>