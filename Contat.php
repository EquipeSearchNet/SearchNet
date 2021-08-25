<?php 

    include("ConecBanco.php");

    $descrAssunto = "";
    if (isset($_POST["txtUsu"], $_POST["txtEmail"], $_POST["txtTel"], $_POST["selContat"], $_POST["txtMsg"]))
    {
    $nome       = $_POST["txtUsu"];
    $Email      = $_POST["txtEmail"];
    $Tel       = $_POST["txtTel"];
    $codAssunto = $_POST["selContat"];
    $message = $_POST["txtMsg"];

    if ($codAssunto = "1")
    {
        $descrAssunto = "Sugestão";
    }
    elseif ($codAssunto = "2")
    {
        $descrAssunto = "Reclamação";
    }
    elseif ($codAssunto = "3")
    {
        $descrAssunto = "Feedback";
    }

    $sql = "INSERT INTO mensagem (NomeUsu, EmailUsu, TelUsu, TipoMsg, MsgUsu) VALUES ('$nome', '$Email', '$Tel', '$descrAssunto', '$message')";
	if ($conn->query($sql) == TRUE)
    {
        echo "Dados inseridos.";
        
    } else
    {
            echo "Erro na inserção: " . $conn->error;
        }}
?>