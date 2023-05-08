<?php

//$servername = "domingues.dev.br"; // nome do servidor de banco de dados
//$username = "domingue_gnsystem"; // nome de usuário do banco de dados
//$password = "cyILAKAGHyMmHKe3vb"; // senha do usuário do banco de dados
//$dbname = "domingue_gnsystem"; // nome do banco de dados

$servername = "localhost"; // nome do servidor de banco de dados
$username = "admin"; // nome de usuário do banco de dados
$password = "admin"; // senha do usuário do banco de dados
$dbname = "domingue_gnsystem"; // nome do banco de dados

// Cria a conexão com o banco de dados
$conexao = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

echo "Conexão bem-sucedida com o banco de dados!";
?>