<?php
session_start();
include_once("../conexao.php");

$id_exemplar = $_GET['id'];
$result_livro = "DELETE FROM emprestimos WHERE ecodigoexemplar = '$id_exemplar'";
$resultado_livro = pg_query($conexao, $result_livro);

if ($resultado_livro) {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Empréstimo deletado com Sucesso!\");
        </script>
        ";
} else {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL =
        https://lib-ufop.herokuapp.com/gerenciaEmprestimos.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao deletar Empréstimo!\");
        </script>
        ";
}
