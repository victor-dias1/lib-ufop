<?php
session_start();
include_once("../../conexao.php");

$id_exemplar = $_GET['id'];
$result_livro = "DELETE FROM reservas WHERE rcodigoexemplar = '$id_exemplar'";
$resultado_livro = pg_query($conexao, $result_livro);

if ($resultado_livro) {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/reservas.php'>
        <script type=\"text/javascript\">
            alert(\"Reserva deletada com Sucesso!\");
        </script>
        ";
} else {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciar/reservas.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao deletar Reserva!\");
        </script>
        ";
}
