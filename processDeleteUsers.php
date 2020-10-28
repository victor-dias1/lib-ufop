<?php
    session_start();
    include_once("conexao.php");
    
    $id=1;
    $result_usuario = "DELETE FROM usuarios WHERE id = '$id'";
    $resultado_usuario = pg_query($conexao, $result_usuario);
?>