<?php

$host = "localhost";
$port = "";
$dbname = "escola";
$username = "";
$password = "";
$conn = new ConexaoDB($host, $port, $dbname, $username, $password);
$aluno = new Aluno($conn);
$aluno->gerarRelatorio();

