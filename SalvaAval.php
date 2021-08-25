<?php
    include ('ConecBanco.php');

    $ProvCod = $_POST["provCod"];
    $Aval = $_POST["avaliacao"];
    $Msg = $_POST["MsgUsu"];
    $Nome = $_POST["NomeUsu"];

    $sql = "INSERT INTO avaliacao (CodProv, AvalUsu, NomeUsu, MsgUsu) VALUES ('$ProvCod', '$Aval', '$Nome', '$Msg')";
	if ($conn->query($sql) == TRUE)
    {
        echo "Dados inseridos.";
        
    } else
    {
            echo "Erro na inserção: " . $conn->error;
        }

?>