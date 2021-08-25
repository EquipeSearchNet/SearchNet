<?php

session_start();

include ("ConecBanco.php");

if ($_POST){

    $token = $_SESSION["token"];
    $NewSenha = trim($_POST["senha"]);
    $NewSenha = md5($NewSenha);
}

if ($NewSenha != "")
{
    $sql = "UPDATE provedora SET senha = '$NewSenha', StatusProv = 'A' where TokenProv = '$token'";
}

if($conn->query($sql) === TRUE){

    $conn->close();
    echo "Senha atualizada!";
}
else
{
    $conn->close();
    echo "$conn->error";
}

?>