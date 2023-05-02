<?php

require_once('conexao.php');

// obtém o ID do produto a partir do parâmetro GET
$id = $_GET["id"];

// faz uma consulta SQL para obter os dados do produto correspondente
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conexao->query($sql);
$produto = $result->fetch_assoc();

// converte os dados do produto em um objeto JSON e envia como resposta
header("Content-type: application/json");
echo json_encode($produto);
?>

