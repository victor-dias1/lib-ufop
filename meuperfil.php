<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['cpf'])) {
    $_SESSION['login_error'] = "Faça login para continuar!";
    header("Location: index.php");
}

include_once("conexao.php");
$cpf = $_SESSION['cpf'];
$result_usuario = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
$row_usuario = pg_query($conexao, $result_usuario);
?>


<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Biblioteca</title>
    <link rel="icon" href="imagem/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script defer src="js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Begin Inspectlet Asynchronous Code -->
    <script type="text/javascript">
        (function() {
            window.__insp = window.__insp || [];
            __insp.push(['wid', 266308637]);
            var ldinsp = function() {
                if (typeof window.__inspld != "undefined") return;
                window.__inspld = 1;
                var insp = document.createElement('script');
                insp.type = 'text/javascript';
                insp.async = true;
                insp.id = "inspsync";
                insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=266308637&r=' + Math.floor(new Date().getTime() / 3600000);
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(insp, x);
            };
            setTimeout(ldinsp, 0);
        })();
    </script>
    <!-- End Inspectlet Asynchronous Code -->
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <main>
        <?php include_once('includes/sidebar.php'); ?>
        <div class="content p-1">
            <div class="d-flex justify-content-center">
                <h1 class="display-3">Meu Perfil</h1>
            </div>
            <div class="d-flex justify-content-center">
                <?php
                $row_user = pg_fetch_assoc($row_usuario)
                ?>
                <form method="POST" action="processar/editar/usuario.php">
                    <input type="hidden" name="idUsuario" value="<?php echo $row_user['matricula']; ?>">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">CPF:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cpf" value="<?php echo $row_user['cpf'] ?>" pattern="[0-9]{11}" required maxlength="11" minlength="11">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pnome" value="<?php echo $row_user['pnome'] ?>" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sobrenome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="unome" value="<?php echo $row_user['unome'] ?>" pattern="[A-Za-zÀ-ú ']{3,}" required maxlength="30" minlength="3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Matrícula:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="matricula" value="<?php echo $row_user['matricula'] ?>" required maxlength="30">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?php echo $row_user['email'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Senha:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="senha" value="<?php echo $row_user['senha'] ?>" required maxlength="20" minlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tipo de Usuário:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo" required>
                                <option>Selecione</option>
                                <option value="1" <?php
                                                    if ($row_user['tipo_usuario'] == 1) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Administrador</option>
                                <option value="0" <?php
                                                    if ($row_user['tipo_usuario'] == 0) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Aluno</option>
                                <option value="2" <?php
                                                    if ($row_user['tipo_usuario'] == 2) {
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
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>