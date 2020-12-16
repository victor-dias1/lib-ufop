<?php
session_start();
include_once("conexao.php");

$usuario = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_STRING);

if ((!empty($usuario)) and (!empty($senha))) {
    //pesquisa usuário no BD
    $result_usuario = "SELECT * FROM usuarios WHERE email='$usuario'";
    $resultado_usuario = pg_query($conexao, $result_usuario);

    if ($resultado_usuario) {
        $row_usuario = pg_fetch_assoc($resultado_usuario);
        if ($senha == $row_usuario['senha']) {
            if ($row_usuario['tipo_usuario'] == 1) {
                $_SESSION['cpf'] = $row_usuario['cpf'];
                $_SESSION['pnome'] = $row_usuario['pnome'];
                $_SESSION['email'] = $row_usuario['email'];

                header("Location: main.php");
            } else {
                $_SESSION['cpf'] = $row_usuario['cpf'];
                $_SESSION['pnome'] = $row_usuario['pnome'];
                $_SESSION['email'] = $row_usuario['email'];

                header("Location: main.php");
            }
        } else {
            $_SESSION['msg'] = "Usuário ou Senha incorretos!";
            header("Location: index.php");
        }
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: index.php");
}
