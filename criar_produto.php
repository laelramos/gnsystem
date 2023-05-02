<?php

require_once('conexao.php');

// Receba os dados do formulário
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria"];
$fabricante = $_POST["fabricante"];
$franquia = $_POST["franquia"];
$ean = $_POST["ean"];

// Valide os campos do formulário
if (empty($descricao) || empty($categoria) || empty($fabricante) || empty($franquia)){
  die("Por favor, preencha todos os campos do formulário.");
}

// Insira o novo produto na tabela
$sql = "INSERT INTO products (description, category, manufacturer, franchise, ean) VALUES ('$descricao', '$categoria', '$fabricante', '$franquia', '$ean')";

if ($conexao->query($sql) === TRUE) {
  header('location: page-produtos.php');
} else {
  echo "Erro ao criar o produto: " . $conexao->error;
}

// Feche a conexão com o banco de dados
$conexao->close();
?>

