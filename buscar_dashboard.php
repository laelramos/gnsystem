<?php
// Conexão com o banco de dados
require_once('conexao.php');

// Consulta SQL para obter a quantidade de produtos cadastrados
$sql = "SELECT COUNT(*) AS total_produtos FROM products";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
$total_produtos = $row["total_produtos"];

// Consulta SQL para obter a quantidade de usuários cadastrados
$sql2 = "SELECT COUNT(*) AS total_usuarios FROM users";
$result2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$total_usuarios = $row2["total_usuarios"];

?>