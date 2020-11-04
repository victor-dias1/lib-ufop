<?php
session_start();
include_once("conexao.php");

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	'0' =>'ematricula', 
	'1' => 'ecodigoexemplar',
	'2' => 'dataemprestimo',
	'3' => 'dataentrega'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT ematricula, ecodigoexemplar, dataemprestimo, dataentrega FROM emprestimos";
$resultado_user = pg_query($conexao, $result_user);
$qnt_linhas = pg_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT ematricula, ecodigoexemplar, dataemprestimo, dataentrega FROM emprestimos WHERE 1=1";

$resultado_usuarios=pg_query($conexao, $result_usuarios);
$totalFiltered = pg_num_rows($resultado_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios = pg_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["ematricula"];
	$dado[] = $row_usuarios["ecodigoexemplar"];
	$dado[] = $row_usuarios["dataemprestimo"];	
	$dado[] = $row_usuarios["dataentrega"];
	$dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
