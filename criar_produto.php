<?php

require_once('conexao.php');

// Receba os dados do formulário
$descricao = isset($_POST["descricao"]) ? trim($_POST["descricao"]) : '';
$categoria = isset($_POST["categoria"]) ? trim($_POST["categoria"]) : '';
$fabricante = isset($_POST["fabricante"]) ? trim($_POST["fabricante"]) : '';
$franquia = isset($_POST["franquia"]) ? trim($_POST["franquia"]) : '';
$ean = isset($_POST["ean"]) ? trim($_POST["ean"]) : '';


// Insira o novo produto na tabela
$sql = "INSERT INTO products (description, id_category, manufacturer, franchise, ean) VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param("sissi", $descricao, $categoria, $fabricante, $franquia, $ean);


if ($stmt->execute()) {
  header('location: page-produtos.php');
} else {
  echo "Erro ao criar o produto: " . $stmt->error;
}

// Feche a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>


