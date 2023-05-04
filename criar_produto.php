<?php
require_once('conexao.php');

$descricao = $_POST["descricao"];
$categoria = $_POST["categoria"];
$fabricante = $_POST["fabricante"];
$franquia = $_POST["franquia"];
$ean = $_POST["ean"];

$sql = "INSERT INTO products (description, id_categorie, manufacturer, franchise, ean)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssss", $descricao, $categoria, $fabricante, $franquia, $ean);

if ($stmt->execute()) {
    echo $conexao->insert_id; // Retorna o ID do último produto inserido
} else {
    echo "Erro ao inserir produto: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
