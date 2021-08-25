<?php

include_once './ConecBancoAC.php';

$busca = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL selecionando provedoras
$sql = "SELECT * FROM provedora where MuniProv LIKE '%".$busca."%' ORDER BY MuniProv ASC LIMIT 7";

//Selecionando provedoras
$result = $conn->prepare($sql);
$result->execute();

while($row = $result->fetch(PDO::FETCH_ASSOC)){

    $data[] = $row['busca']; 
}

echo json_encode($data);
