<?php
require_once('conexao.php');

$id = $_POST["id"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria"];
$fabricante = $_POST["fabricante"];
$franquia = $_POST["franquia"];
$ean = $_POST["ean"];

$sql = "UPDATE products SET description = ?, id_categorie = ?, manufacturer = ?, franchise = ?, ean = ? WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssssss", $descricao, $categoria, $fabricante, $franquia, $ean, $id);

if ($stmt->execute()) {
    echo $id;
} else {
    echo "Erro ao atualizar produto: " . $stmt->error;
}


$stmt->close();
$conexao->close();
?>
