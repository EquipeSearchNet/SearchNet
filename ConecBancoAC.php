<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'searchnet');
// conexão e seleção do banco de dados
// conexão e seleção do banco de dados
$conn = new PDO('mysql:host='. HOST . ';dbname=' . DBNAME  . ';', USER, PASS);