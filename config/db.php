<?php
/* Aqui, os dados de registros para a conexão ao banco de dados foram atribuídos para variáveis. */
$dbName = "pawfolio";
$dbHost = "localhost";
$dbUser = "root";
$dbpass = "";

/* Conecta ao banco de dados */
$conn = new PDO("mysql:dbname=". $dbName .";host=". $dbHost, $dbUser, $dbpass);

// Mostra erros do PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);