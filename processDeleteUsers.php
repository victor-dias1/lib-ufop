<?php
    session_start();
    include_once("conexao.php");

    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    //$matricula = $_POST['matricula'];
    echo $matricula;
    //$result_usuario = "DELETE FROM usuarios WHERE matricula = '$matricula'";
    //$resultado_usuario = pg_query($conexao, $result_usuario);
?>