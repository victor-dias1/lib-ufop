<?php
session_start();
include_once("conexao.php");

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'pnome', 
	1 => 'unome',
	2=> 'matricula'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT * FROM usuarios";
$resultado_user = pg_query($conexao, $result_user);
$qnt_linhas = pg_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT pnome, unome, matricula FROM usuarios WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( pnome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR unome LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR matricula LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=pg_query($conexao, $result_usuarios);
$totalFiltered = pg_num_rows($resultado_usuarios);

//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=pg_query($conexao, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =pg_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["pnome"];
	$dado[] = $row_usuarios["unome"];
	$dado[] = $row_usuarios["matricula"];	
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
