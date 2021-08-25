<?php 

include("ConecBanco.php");

$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => NomeUsu da coluna no banco de dados
$columns = array( 
	0 =>'NomeUsu', 
	1 => 'AvalUsu',
	2 => 'MsgUsu'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT NomeUsu, AvalUsu, MsgUsu FROM avaliacao";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_avaliacao = "SELECT NomeUsu, AvalUsu, MsgUsu FROM avaliacao WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_avaliacao.=" AND ( NomeUsu LIKE '".$requestData['search']['value']."%' ";    
	$result_avaliacao.=" OR AvalUsu LIKE '".$requestData['search']['value']."%' ";
	$result_avaliacao.=" OR MsgUsu LIKE '".$requestData['search']['value']."%' )";
}

$resultado_avaliacao=mysqli_query($conn, $result_avaliacao);
$totalFiltered = mysqli_num_rows($resultado_avaliacao);
//Ordenar o resultado
$result_avaliacao.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_avaliacao=mysqli_query($conn, $result_avaliacao);

// Ler e criar o array de dados
$dados = array();
while( $row_avaliacao =mysqli_fetch_array($resultado_avaliacao) ) {  
	$dado = array(); 
	$dado[] = $row_avaliacao["NomeUsu"];
	$dado[] = $row_avaliacao["AvalUsu"];
	$dado[] = $row_avaliacao["MsgUsu"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //QuantMsgUsu de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
