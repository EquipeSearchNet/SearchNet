<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'searchnet';
// conexão e seleção do banco de dados
// conexão e seleção do banco de dados
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
/* change character set to utf8 */
if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

?>
