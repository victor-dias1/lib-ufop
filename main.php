<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Celke</title>
    <link rel="icon" href="imagem/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script defer src="js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reservas</title>

    <link rel="icon" href="imagem/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <script defer src="js/fontawesome-all.min.js"></script>

</head>

<body>
    <?php
    include_once('menu_admin.php');

    $link = $_GET["link"];

    $pages[1] = "bem_vindo.php";
    $pages[2] = "gerenciaUsuarios.php";

    if (!empty($link)) {
        if (file_exists($pages[$link])) {
            include $pages[$link];
        } else {
            include "bem_vindo.php";
        }
    } else {
        include "bem_vindo.php";
    }
    ?>
    <!-- <nav class="navbar navbar-expand navbar-dark bg-primary">
        <a class="sidebar-toggle text-light mr-3">
            <span class="navbar-toggler-icon"></span>
        </a>
        <a class="navbar-brand" href="main.php">Biblioteca</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <img class="rounded-circle" src="imagem/icon.png" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">Usuário</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Meu Perfil</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <nav class="sidebar">
            <ul class="list-unstyled">
                
                <li>
                    <a href="#submenu2" data-toggle="collapse"> Gerência</a>
                    <ul id="submenu2" class="list-unstyled collapse">
                        <li><a href="gerenciaUsuarios.php"><i class="fas fa-users"></i> Usuários</a></li>
                        <li><a href="gerenciaLivros.php"><i class="fab fa-book"></i> Livros</a></li>
                    </ul>

                </li>
                <li><a href="gerenciaEmprestimos.php"> Empréstimos</a></li>
                <li><a href="gerenciaReservas.php"> Reservas</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
        </nav>

        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Dashboard</h2>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Usuários</h6>
                                <h2 class="lead">147</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-file fa-3x"></i>
                                <h6 class="card-title">Artigos</h6>
                                <h2 class="lead">63</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <i class="fas fa-eye fa-3x"></i>
                                <h6 class="card-title">Visitas</h6>
                                <h2 class="lead">648</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <i class="fas fa-comments fa-3x"></i>
                                <h6 class="card-title">Comentários</h6>
                                <h2 class="lead">17</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
</body>

</html>