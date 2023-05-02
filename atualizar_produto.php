<?php

require_once('conexao.php');

// obtém os valores dos campos do formulário
$id = $_POST["id"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria"];
$fabricante = $_POST["fabricante"];
$franquia = $_POST["franquia"];
$ean = $_POST["ean"];

// faz uma consulta SQL para atualizar o produto no banco de dados
$sql = "UPDATE products SET description = '$descricao', category = '$categoria', manufacturer = '$fabricante', franchise = '$franquia', ean = '$ean' WHERE id = $id";
$conexao->query($sql);

// retorna uma resposta de sucesso
header("HTTP/1.1 200 OK");
?>

